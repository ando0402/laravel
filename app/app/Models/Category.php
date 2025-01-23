<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
    use HasFactory;
    // タイトル列の登録を許可する(ホワイトリスト)
    protected $fillable = ['title'];

    public static function create(array $category)
    {
    }

    // 1対多
    // 1の方　hasMany
    // 多の方　belongsTo

    // 1の方　hasMany
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

}
