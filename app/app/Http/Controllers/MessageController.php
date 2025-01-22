<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function index(): view
    {
        // メッセージテーブルのレコードを全件取得
        $messages = Message::all();
        // messagesというキーで、ビューへ渡す
        return view('message/index', ['messages' => $messages]);
    }
}
