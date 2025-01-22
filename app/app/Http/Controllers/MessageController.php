<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Message;



class MessageController extends Controller
{

    public function index(): view
    {
        // メッセージテーブルのレコードを全件取得
        $messages = Message::all();
        // messagesというキーで、ビューへ渡す
        return view('message/index', ['messages' => $messages]);
    }

    /*
     * 登録処理
     */
    public function store(Request $request): RedirectResponse
    {
        // リクエストからボディを取得し、保存
        $message = new Message();
        $message->body = $request->input('body');;
        $message->save();

        // 処理後、リダイレクト
        return redirect('/messages');
    }

}
