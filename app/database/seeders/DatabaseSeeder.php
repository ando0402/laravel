<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // CategoriesTableSeederファイルをシーディングの対象にする
        $this->call([CategoriesTableSeeder::class]);

        // AuthorsTableSeederファイルをシーディングの対象にする
        $this->call([AuthorsTableSeeder::class]);

        $this->call([
           AuthorsTableSeeder::class,
           BooksTableSeeder::class,
           AuthorBookTablesSeeder::class,
        ]);

//        初期であるファイル
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
