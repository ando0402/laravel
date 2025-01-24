<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    // エラーメッセージを設定
    'exists' => '正しい :attribute を選択して下さい',
    'max' => [
        'numeric' => ':attribute は :max 以下を入力して下さい',
        'string' => ':attribute は :max 文字以内で入力して下さい',
        ],
    'min' => [
        'numeric' => ':attribute は :min 以上を入力して下さい',
        'string' => ':attribute は :min 文字以上で入力して下さい',
    ],
    'numeric' => ':attribute は数値で入力して下さい',
    'required' => ':attribute は必須入力です',
    'unique' => ':attribute は既に登録されています',

    // キー名も日本語に変更
    'attributes' =>[
        'category_id' => 'カテゴリ',
        'title' => 'タイトル',
        'price' => '価格',
        'author_ids' => '著者',
        'author_ids.*' => '著者',
    ],

];
