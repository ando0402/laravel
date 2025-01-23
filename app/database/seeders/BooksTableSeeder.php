<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\BookFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // BookFactory::new()->count(3)->create();

        // ファクトリで生成されるタイトルを上書きする
        $categories = [
            Category::factory()->create(['title' => 'programming']),
            Category::factory()->create(['title' => 'design']),
            Category::factory()->create(['title' => 'management']),
        ];

        // カテゴリ1件につき、2件の書籍を登録する
        // ファクトリで生成されるカテゴリIDを上書きする
        foreach ($categories as $category){
            BookFactory::new()->count(2)
                ->create(['category_id' => $category->id]);
        }

    }
}
