<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    //
    use HasFactory;

    // 多対多
    // 多の方　belongsTo
    public function books(): BelongsToMany
    {
        // 著者1人に、複数の書籍が紐付くことを定義する
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

    public static function factory(int $int)
    {
    }
}
