<?php

namespace App\Http\Controllers;

use App\Models\BeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BeritaArtikelController extends Controller
{
    /**
     * Menampilkan daftar Berita / Artikel.
     */
    public function index()
    {
        return view('admin.berita-artikel.index', [
            'title' => 'Berita / Artikel'
        ]);
    }

    /**
     * Menampilkan form untuk membuat Berita / Artikel baru.
     */
    public function create()
    {
        return view('admin.berita-artikel.create', [
            'title' => 'Tambah Berita / Artikel'
        ]);
    }

    /**
     * Menyimpan Berita / Artikel baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'tagar' => 'required',
                'judul' => 'required|unique:berita_artikels,judul,' . $request->id,
                'isi' => 'required'
            ], [
                'tagar.required' => 'Tagar harus diisi',
                'judul.required' => 'Judul harus diisi',
                'judul.unique' => 'Judul sudah ada',
                'isi.required' => 'Isi harus diisi',
            ]);

            $tagar = json_decode($request->tagar);
            $tagar = implode(', ', array_map(function ($item) {
                return $item->value;
            }, $tagar));

            BeritaArtikel::create([
                'tagar' => $tagar,
                'judul' => $request->judul,
                'isi' => $request->isi
            ]);

            return redirect()->back()->with('success', 'Berita / Artikel berhasil disimpan!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Berita / Artikel gagal disimpan!')->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Menampilkan detail Berita / Artikel.
     */
    public function show(BeritaArtikel $beritaArtikel)
    {
        return view('admin.berita-artikel.create', [
            'title' => 'Detail Berita / Artikel',
            'beritaArtikel' => $beritaArtikel
        ]);
    }

    /**
     * Menampilkan form untuk mengedit Berita / Artikel.
     */
    public function edit(BeritaArtikel $beritaArtikel)
    {
        //
    }

    /**
     * Memperbarui Berita / Artikel yang ada di penyimpanan.
     */
    public function update(Request $request, BeritaArtikel $beritaArtikel)
    {
        //
    }

    /**
     * Menghapus Berita / Artikel dari penyimpanan.
     */
    public function destroy(BeritaArtikel $beritaArtikel)
    {
        // jika data kosong mengembalikan pesan error
        if ($beritaArtikel->count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            $beritaArtikel->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }

    /**
     * Menghapus semua Berita / Artikel dari penyimpanan.
     */
    public function destroyAll()
    {
        // jika data kosong mengembalikan pesan error
        if (BeritaArtikel::count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            BeritaArtikel::truncate();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
}
