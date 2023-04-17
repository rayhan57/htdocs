<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('1234')
        ]);

        User::create([
            'name' => 'Aho',
            'slug' => 'aho',
            'email' => 'aho17@gmail.com',
            'password' => bcrypt('4321')
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'lorem ipsum dolor sit amet eget port ex eu commod consequat in rep Temple dolor sit amet eget port ex eu commod consequat',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ab illum fugiat doloribus maxime provident adipisci quos itaque consectetur dicta quae libero maiores optio corporis saepe ipsum dignissimos, sunt fugit repellat! Sit ullam aspernatur voluptatibus saepe voluptas. Porro dolorem cupiditate, minima sit fugiat repudiandae expedita optio ut quos totam dolorum cum maxime quia voluptatum odio quis eos sequi.</p><p>Consequatur natus unde aspernatur praesentium iusto vel nisi fuga recusandae? Cumque aspernatur enim explicabo numquam labore facere repudiandae esse autem ut, tenetur voluptatibus totam perspiciatis beatae libero blanditiis, consequuntur officiis dolorem doloribus reprehenderit? Blanditiis esse, cumque corporis obcaecati unde explicabo quam quas.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'lorem ipsum dolor sit amet eget port ex eu commod consequat in rep Temple dolor sit amet eget port ex eu commod consequat',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ab illum fugiat doloribus maxime provident adipisci quos itaque consectetur dicta quae libero maiores optio corporis saepe ipsum dignissimos, sunt fugit repellat! Sit ullam aspernatur voluptatibus saepe voluptas. Porro dolorem cupiditate, minima sit fugiat repudiandae expedita optio ut quos totam dolorum cum maxime quia voluptatum odio quis eos sequi.</p><p>Consequatur natus unde aspernatur praesentium iusto vel nisi fuga recusandae? Cumque aspernatur enim explicabo numquam labore facere repudiandae esse autem ut, tenetur voluptatibus totam perspiciatis beatae libero blanditiis, consequuntur officiis dolorem doloribus reprehenderit? Blanditiis esse, cumque corporis obcaecati unde explicabo quam quas.</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'lorem ipsum dolor sit amet eget port ex eu commod consequat in rep Temple dolor sit amet eget port ex eu commod consequat',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ab illum fugiat doloribus maxime provident adipisci quos itaque consectetur dicta quae libero maiores optio corporis saepe ipsum dignissimos, sunt fugit repellat! Sit ullam aspernatur voluptatibus saepe voluptas. Porro dolorem cupiditate, minima sit fugiat repudiandae expedita optio ut quos totam dolorum cum maxime quia voluptatum odio quis eos sequi.</p><p>Consequatur natus unde aspernatur praesentium iusto vel nisi fuga recusandae? Cumque aspernatur enim explicabo numquam labore facere repudiandae esse autem ut, tenetur voluptatibus totam perspiciatis beatae libero blanditiis, consequuntur officiis dolorem doloribus reprehenderit? Blanditiis esse, cumque corporis obcaecati unde explicabo quam quas.</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}
