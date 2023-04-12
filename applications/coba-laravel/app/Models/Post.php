<?php

namespace App\Models;



class Post {
    private static $blog_posts = [
        [
            "judul" => "Judul Pertama",
            "slug" => "judul-pertama",
            "isi" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, molestiae nemo ipsum illo temporibus, ex corporis, neque voluptatem quasi esse ipsam fugiat laboriosam dolorem consectetur quos tenetur. Quidem perspiciatis totam eum deserunt suscipit tempore modi sed delectus iste dolores nihil ipsa unde cumque magni doloribus omnis consectetur quam, fuga corporis veniam laudantium optio voluptate cupiditate! Rem saepe adipisci maiores deserunt veritatis officia, est molestiae aut animi debitis! Sed aliquid autem, quaerat fugit necessitatibus, enim, ipsa pariatur hic nobis earum commodi!"
        ],
        [
            "judul" => "Judul Kedua",
            "slug" => "judul-kedua",
            "isi" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, molestiae nemo ipsum illo temporibus, ex corporis, neque voluptatem quasi esse ipsam fugiat laboriosam dolorem consectetur quos tenetur. Quidem perspiciatis totam eum deserunt suscipit tempore modi sed delectus iste dolores nihil ipsa unde cumque magni doloribus omnis consectetur quam, fuga corporis veniam laudantium"
        ],
        [
            "judul" => "Judul Ketiga",
            "slug" => "judul-ketiga",
            "isi" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, molestiae nemo ipsum illo temporibus, ex corporis, neque voluptatem quasi esse ipsam fugiat laboriosam dolorem consectetur quos tenetur. Quidem perspiciatis totam eum deserunt suscipit tempore modi sed delectus iste dolores nihil ipsa unde cumque magni doloribus omnis consectetur quam, fuga corporis veniam laudantium optio voluptate cupiditate! Rem saepe adipisci maiores deserunt veritatis officia, est molestiae aut animi debitis! Sed aliquid autem, quaerat fugit necessitatibus, enim, ipsa pariatur hic nobis earum commodi! optio voluptate cupiditate! Rem saepe adipisci maiores deserunt veritatis officia, est molestiae aut animi debitis! Sed aliquid autem, quaerat fugit necessitatibus"
        ]
    ];

    public static function all() {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
