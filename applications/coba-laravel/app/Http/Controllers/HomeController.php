<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Utilities;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        return view('home', [
            "title" => "Home",
            "tanggal" => Utilities::getTanggal()
        ]);
    }
}
