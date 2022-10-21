<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         Post::factory(50)->create();
    }
}
