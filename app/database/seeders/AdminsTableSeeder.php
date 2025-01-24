<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::factory()->create([
            'name' => 'ando',
            'login_id' => 'ando_id',
            'password' => Hash::make('password'),
        ]);

        Admin::factory()->create([
            'name' => 'sato',
            'login_id' => 'sato_id',
            'password' => Hash::make('fugafuga'),
        ]);
    }
}
