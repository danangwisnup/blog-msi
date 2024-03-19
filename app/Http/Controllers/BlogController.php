<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function beranda() {
        return view('blog.beranda', [
            'title' => 'Beranda'
        ]);
    }
}
