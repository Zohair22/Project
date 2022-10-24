<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Zohair Osama',
             'email' => 'zohairosama@example.com',
         ]);
         Admin::factory()->create([
             'name' => 'Zohair Admin',
             'email' => 'zohairosama@Admin.com',
         ]);
         Post::factory(50)->create();
    }
}
