<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Book extends Model
{
    //
    use HasFactory;

    // 1対多
    // 1の方　hasMany
    // 多の方　belongsTo
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // 多対多
    // 多の方　belongsTo
    public function authors(): BelongsToMany
    {
        // 書籍1件に,複数の著者が紐付くことを定義する
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

}
