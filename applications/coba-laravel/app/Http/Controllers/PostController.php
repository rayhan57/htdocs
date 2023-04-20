<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('user')) {
            $user = User::firstWhere('slug', request('user'));
            $title = ' by ' . $user->name;
        }

        return view('blog', [
            "title" => "All Posts" . $title,
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
