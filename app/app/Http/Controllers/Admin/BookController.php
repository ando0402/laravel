<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\BookPostRequest;
use \Illuminate\Http\Response;
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

        // 保存
        $book->save();

        // 保存した書籍情報をレスポンスとして返す
        // return $book;
        // 登録完了後book.indexにリダレクトする
        return redirect(route('book.index'))
            ->with('message', $book->title . 'を追加しました');
    }

}
