<?php

namespace App\Http\Controllers;

class BerandaController extends Controller
{
    public function admin()
    {
        return view('admin.beranda', [
            'title' => 'Beranda'
        ]);
    }
}
