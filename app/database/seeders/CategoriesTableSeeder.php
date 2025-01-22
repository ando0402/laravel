<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 登録するレコードの準備
        $categories = [
            ['title' => 'PHP'],
            ['title' => 'Laravel'],
            ['title' => 'Vue.js'],
            ['title' => 'JavaScript'],
            ['title' => 'Ruby'],
            ['title' => 'Ruby on Rails'],
        ];

        // 登録処理
        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
