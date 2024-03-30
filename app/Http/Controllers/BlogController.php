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

    public function tentang_profil() {
        return view('blog.tentang.profil', [
            'title' => 'Profil'
        ]);
    }
    public function tentang_pengurus() {
        return view('blog.tentang.pengurus', [
            'title' => 'Pengurus'
        ]);
    }
    public function programKerja() {
        return view('blog.program-kerja', [
            'title' => 'Program Kerja'
        ]);
    }
    public function beritaArtikel() {
        return view('blog.berita-artikel', [
            'title' => 'Berita / Artikel'
        ]);
    }
    public function beritaArtikel1() {
        return view('blog.berita-artikel.berita-artikel-1', [
            'title' => 'Berita / Artikel / 1'
        ]);
    }
}
