<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookPostRequest;
use App\Http\Requests\BookPutRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    //

    public function index(): Response
    {
        // 書籍一覧を取得
//        $books = Book::all();
        $books = Book::with('category')
            ->orderby('category_id')
            ->orderby('title')
            ->get();

        // 書籍一覧をレスポンスとして返す
//        return $books;
//        return view('admin/book/index', ['books' => $books]);
        return response()
            ->view('admin/book/index', ['books' => $books])
            ->header('Content-Type', 'text/html')
            ->header('Content-Encoding', 'utf-8');
    }

//    public function show(string $id): Book
//    public function show(int $id): View
    public function show(Book $book): View
    {
        // 書籍を一件取得
        //$book = Book::findOrFail($id);

        // 取得した書籍をレスポンスとして返す
        // return $book;
        return view('admin/book/show', compact('book'));
    }

    // 登録用画面
    public function create(): View
    {
        // ビューにカテゴリー一覧を表示するために全件取得
        $categories = Category::all();

        // 著者一覧を表示するために全件取得
        $authors = Author::all();

        // ビューオブジェクトを返す
//        return view('admin/book/create', [
//            'categories' => $categories
//        ]);
        return view('admin/book/create',
            compact('categories', 'authors'));
    }

    /*
     * 保存処理
     * バリデーション処理
     */

    public function store(BookPostRequest $request): RedirectResponse
    {

        // 書籍データ登録用のオブジェクトを作成する
        $book = new Book();

        // リクエストオブジェクトからパラメータを取得
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->price = $request->price;

        dump($book->category_id);

        DB::transaction(function () use ($book, $request) {

            // 保存
            $book->save();

            // 著者書籍テーブルを登録
            $book->authors()->attach($request->author_ids);

        });


        // 保存した書籍情報をレスポンスとして返す
        // return $book;

        // 登録完了後book.indexにリダレクトする
        return redirect(route('book.index'))
            ->with('message', $book->title . 'を追加しました');
    }

    /*
     * 書籍編集画面
     */
    public function edit(Book $book): View
    {
        // カテゴリ一覧を表示するために全件取得
        $categories = Category::all();

        // 著者一覧を表示するために全件取得
        $authors = Author::all();

        // 書籍に紐付く著者IDの一覧を取得
        $authorIds = $book->authors()->pluck('id')->all();

        return view('admin/book/edit',
        compact('book', 'categories', 'authors', 'authorIds'));

    }

    /*
     * 書籍更新処理
     */
    public function update(BookPutRequest $request, Book $book): RedirectResponse
    {
        // リクエストオブジェクトからパラメータを取得する
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->price = $request->price;

        DB::transaction(function () use ($book, $request) {

            // 更新
            $book->update();

            // 書籍と著者の関連付けを更新する
            $book->authors()->sync($request->author_ids);
        });

        return redirect(route('book.index'))
            ->with('message', $book->title . 'を変更しました');
    }
}
