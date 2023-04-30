<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('dashboard.posts.index', [
            'title' => 'Dashboard Post',
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('dashboard.posts.create', [
            'title' => 'Dashboard Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        Post::create([
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => Str::limit(strip_tags($request->body), 200),
            'image' => $request->file('image')->store('post-image'),
            'body' => $request->body
        ]);
        return redirect('/dashboard/posts')->with('success', 'Your post has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('dashboard.posts.show', [
            'title' => 'Dashboard Post',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        return view('dashboard.posts.edit', [
            'title' => 'Dashboard Post',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        if ($request->oldImage) { //Jika ada gambar lama di storage maka hapus dan pakai yg baru.
            Storage::delete($request->oldImage);
            $imagePath = $request->file('image')->store('post-image');
        } else { //jika tidak maka pakai gambar lamanya.
            $imagePath = $post->image;
        }

        Post::where('id', $post->id)->update([
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => Str::limit(strip_tags($request->body), 200),
            'image' => $imagePath,
            'body' => $request->body
        ]);
        return redirect('/dashboard/posts')->with('success', 'Your post has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Your post has been successfully deleted');
    }
}
