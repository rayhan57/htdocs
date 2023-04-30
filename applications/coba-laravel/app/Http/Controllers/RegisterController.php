<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller {
    public function index() {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'slug' => Str::slug($request->name, '-'),
            'password' => Hash::make($request->password)
        ]);
        return redirect('/login')->with('success', 'Your account has been registered');
    }
}
