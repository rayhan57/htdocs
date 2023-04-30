<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller {
    public function index() {
        return view('about', [
            "title" => "About",
            "nama" => "Rayhan Lingga B",
            "email" => "rayhanb18@gmail.com"
        ]);
    }
}
