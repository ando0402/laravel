<?php

namespace Database\Seeders;

use Database\Factories\AuthorDetailFactory;
use Database\Factories\AuthorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ファクトリによって5件の著作情報を作成
        AuthorFactory::new()->count(5)->create();
        // ファクトリによって5件の著作詳細情報を作成
        // 合わせて著者情報も5件作成される
        AuthordetailFactory::new()->count(5)->create();
//        Author::factory(5)->create();
    }
}



