<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAktivitas;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tentang.visi-misi.index', [
            'title' => 'Visi Misi'
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
                'visi_deskripsi' => 'required',
                'visi_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'misi_deskripsi' => 'required',
                'misi_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ], [
                'visi_deskripsi.required' => 'Deskripsi visi wajib diisi',
                'visi_gambar.image' => 'Gambar visi harus berupa gambar',
                'visi_gambar.mimes' => 'Gambar visi harus berformat jpeg, png, jpg, gif, atau svg',
                'visi_gambar.max' => 'Ukuran gambar visi maksimal 5MB',
                'misi_deskripsi.required' => 'Deskripsi misi wajib diisi',
                'misi_gambar.image' => 'Gambar misi harus berupa gambar',
                'misi_gambar.mimes' => 'Gambar misi harus berformat jpeg, png, jpg, gif, atau svg',
                'misi_gambar.max' => 'Ukuran gambar misi maksimal 5MB',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Visi Misi gagal disimpan!')->withErrors($e->validator->errors())->withInput();
        }

        // upload gambar visi
        if ($request->hasFile('visi_gambar')) {
            $file = $request->file('visi_gambar');
            $nama_gambar_visi = 'visi_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('img/', $nama_gambar_visi);

            // hapus gambar visi lama
            if (VisiMisi::first()->visi_gambar != 'null') {
                $file_path = 'img/' . VisiMisi::first()->visi_gambar;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        } else {
            $nama_gambar_visi = VisiMisi::first()->visi_gambar;
        }

        // upload gambar misi
        if ($request->hasFile('misi_gambar')) {
            $file = $request->file('misi_gambar');
            $nama_gambar_misi = 'misi_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('img/', $nama_gambar_misi);

            // hapus gambar misi lama
            if (VisiMisi::first()->misi_gambar != 'null') {
                $file_path = 'img/' . VisiMisi::first()->misi_gambar;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        } else {
            $nama_gambar_misi = VisiMisi::first()->misi_gambar;
        }

        // data
        $data = [
            'visi_deskripsi' => $request->visi_deskripsi,
            'visi_gambar' => $nama_gambar_visi,
            'misi_deskripsi' => $request->misi_deskripsi,
            'misi_gambar' => $nama_gambar_misi,
        ];

        // simpan data
        VisiMisi::first()->update($data);

        // simpan riwayat aktivitas
        RiwayatAktivitas::create([
            'user_id' => auth()->id(),
            'modul' => 'Tentang/Visi Misi',
            'aktivitas' => 'Mengubah tentang/visi misi',
            'data' => json_encode([
                'sebelum' => $request->id ? VisiMisi::find($request->id)->toArray() : null,
                'sesudah' => $data
            ])
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Visi Misi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        //
    }
}
