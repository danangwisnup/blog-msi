<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function admin()
    {
        return view('admin/beranda', [
            'title' => 'Beranda'
        ]);
    }
}
