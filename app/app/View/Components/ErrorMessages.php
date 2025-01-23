<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\ViewErrorBag;

class ErrorMessages extends Component
{
    /**
     * Create a new component instance.
     */
//    public function __construct()
//    public function __construct(ViewErrorBag $errors)
//    {
//        // 定義したメンバ変数はビューから参照可能(publicである必要がある)
//        // public ViewErrorBag $errors;
//
//        // メンバ変数の値はコンストラクタ引数で外から受け取る
//        $this->errors = $errors;
//    }
    public function __construct(
        public ViewErrorBag $errors
    ){}

    /*
     * エラーが2件以上あるかどうかを返す
     */
    public function has2MoreErrors(): bool
    {
        return $this->errors->count() >= 2;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.error-messages');
    }
}
