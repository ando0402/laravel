<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    //
    public function index(): Collection
    {
        // 書籍一覧を取得
        $books = Book::all();

        // 書籍一覧をレスポンスとして返す
        return $books;
    }

    public function show(string $id): Book
    {
        // 書籍を一件取得
        $book = Book::findOrFail($id);

        // 書籍を一件取得
        return $book;
    }

    // 登録用画面
    public function create(): View
    {
        // ビューにカテゴリー一覧を表示するために全件取得
        $categories = Category::all();

        // ビューオブジェクトを返す
        return view('admin/book/create', [
            'categories' => $categories
        ]);
    }

    // 保存処理
    public function store(Request $request): Book
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
        return $book;
    }

}
