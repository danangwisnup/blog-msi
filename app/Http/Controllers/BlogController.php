<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function beranda()
    {
        return view('blog.beranda', [
            'title' => 'Beranda'
        ]);
    }

    public function profil()
    {
        return view('blog.tentang.profil', [
            'title' => 'Profil'
        ]);
    }

    public function visiMisi()
    {
        return view('blog.tentang.visi-misi', [
            'title' => 'Visi Misi'
        ]);
    }

    public function strukturOrganisasi()
    {
        return view('blog.tentang.struktur-organisasi', [
            'title' => 'Struktur Organisasi'
        ]);
    }

    public function programKerja()
    {
        return view('blog.program-kerja', [
            'title' => 'Program Kerja'
        ]);
    }

    public function galeriFoto()
    {
        $foto = \App\Models\Foto::orderByDesc('updated_at')->paginate(5);

        return view('blog.galeri.foto', [
            'title' => 'Galeri Foto'
        ], compact('foto'));
    }

    public function galeriVideo()
    {
        $video = \App\Models\Video::orderByDesc('updated_at')->paginate(5);

        return view('blog.galeri.video', [
            'title' => 'Galeri Video'
        ], compact('video'));
    }

    public function beritaArtikel(Request $request, $id = null)
    {
        if ($id) {
            // import model
            $beritaArtikel = \App\Models\BeritaArtikel::where('slug', $id)->first();

            return view('blog.berita-artikel', [
                'title' => 'Berita & Artikel',
                'id' => $id,
                'detail' => true,
                'beritaArtikel' => $beritaArtikel,
            ]);
        }

        // Search
        $search = $request->query('search');

        if ($search) {
            $beritaArtikel = \App\Models\BeritaArtikel::orderByDesc('updated_at')->where('judul', 'like', '%' . $search . '%')->paginate(5);

            if ($beritaArtikel->isEmpty()) {
                return view('blog.berita-artikel', [
                    'title' => 'Berita & Artikel',
                    'search' => false,
                    'detail' => false
                ], compact('beritaArtikel'));
            }

            return view('blog.berita-artikel', [
                'title' => 'Berita & Artikel',
                'detail' => false
            ], compact('beritaArtikel'));
        }

        // Tags
        $tag = $request->query('tag');

        if ($tag) {
            $beritaArtikel = \App\Models\BeritaArtikel::orderByDesc('updated_at')->where('tagar', 'like', '%' . $tag . '%')->paginate(5);

            return view('blog.berita-artikel', [
                'title' => 'Berita & Artikel',
                'detail' => false
            ], compact('beritaArtikel'));
        }

        $beritaArtikel = \App\Models\BeritaArtikel::orderByDesc('updated_at')->paginate(5);

        return view('blog.berita-artikel', [
            'title' => 'Berita & Artikel',
            'detail' => false
        ], compact('beritaArtikel'));
    }

    public function kontak()
    {
        return view('blog.kontak', [
            'title' => 'Kontak'
        ]);
    }
}
