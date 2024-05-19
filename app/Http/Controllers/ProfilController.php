<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\RiwayatAktivitas;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tentang.profil.index', [
            'title' => 'Profil'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        try {
            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
                'foto_tentang' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
                'nama_blog' => 'required',
                'judul_header' => 'required',
                'judul_subheader' => 'required',
                'deskripsi' => 'required'
            ], [
                'logo.image' => 'Logo harus berupa gambar',
                'logo.mimes' => 'Logo harus berformat jpeg, png, jpg, gif, atau svg',
                'logo.max' => 'Ukuran logo maksimal 5MB',
                'foto_sampul.image' => 'Foto sampul harus berupa gambar',
                'foto_sampul.mimes' => 'Foto sampul harus berformat jpeg, png, jpg, gif, atau svg',
                'foto_sampul.max' => 'Ukuran foto sampul maksimal 10MB',
                'foto_tentang.image' => 'Foto tentang harus berupa gambar',
                'foto_tentang.mimes' => 'Foto tentang harus berformat jpeg, png, jpg, gif, atau svg',
                'foto_tentang.max' => 'Ukuran foto tentang maksimal 10MB',
                'nama_blog.required' => 'Nama blog wajib diisi',
                'judul_header.required' => 'Judul header wajib diisi',
                'judul_subheader.required' => 'Judul subheader wajib diisi',
                'deskripsi.required' => 'Deskripsi wajib diisi'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Profil gagal disimpan!')->withErrors($e->validator->errors())->withInput();
        }

        // upload logo jika ada
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $nama_logo = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('img/', $nama_logo);

            // hapus logo lama
            if (Profil::first()->logo != 'null') {
                $file_path = 'img/' . Profil::first()->logo;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        } else {
            $nama_logo = Profil::first()->logo;
        }

        // upload foto sampul jika ada
        if ($request->hasFile('foto_sampul')) {
            $file = $request->file('foto_sampul');
            $nama_foto_sampul = 'foto_sampul_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('img/', $nama_foto_sampul);

            // hapus foto sampul lama jika ada di direktori
            if (Profil::first()->foto_sampul != 'null') {
                $file_path = 'img/' . Profil::first()->foto_sampul;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        } else {
            $nama_foto_sampul = Profil::first()->foto_sampul;
        }

        // upload foto tentang jika ada
        if ($request->hasFile('foto_tentang')) {
            $file = $request->file('foto_tentang');
            $nama_foto_tentang = 'foto_tentang_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('img/', $nama_foto_tentang);

            // hapus foto tentang lama jika ada di direktori
            if (Profil::first()->foto_tentang != 'null') {
                $file_path = 'img/' . Profil::first()->foto_tentang;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        } else {
            $nama_foto_tentang = Profil::first()->foto_tentang;
        }

        // data
        $data = [
            'logo' => $nama_logo,
            'foto_sampul' => $nama_foto_sampul,
            'foto_tentang' => $nama_foto_tentang,
            'nama_blog' => $request->nama_blog,
            'judul_header' => $request->judul_header,
            'judul_subheader' => $request->judul_subheader,
            'deskripsi' => $request->deskripsi
        ];

        // simpan data
        Profil::first()->update($data);

        // simpan riwayat aktivitas
        RiwayatAktivitas::create([
            'user_id' => auth()->id(),
            'modul' => 'Tentang/Profil',
            'aktivitas' => 'Mengubah tentang/profil',
            'data' => json_encode([
                'sebelum' => $request->id ? Profil::first()->toArray() : null,
                'sesudah' => $data
            ])
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
