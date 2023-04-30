<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Post::factory(20)->create();

        User::create([
            'name' => 'Rayhan',
            'slug' => 'rayhan',
            'email' => 'rayhanb18@gmail.com',
            'password' => Hash::make(123456)
        ]);

        User::create([
            'name' => 'Aho',
            'slug' => 'aho',
            'email' => 'aho17@gmail.com',
            'password' => Hash::make(654321)
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
    }
}
