<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\RiwayatAktivitas;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.galeri.foto.index', [
            'title' => 'Foto'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.foto.create', [
            'title' => 'Tambah Foto'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        try {
            $request->validate([
                'nama' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg|max:10048',
                'deskripsi' => 'required'
            ], [
                'nama.required' => 'Nama wajib diisi',
                'foto.image' => 'Foto harus berupa gambar',
                'foto.mimes' => 'Foto harus berformat jpeg, png, jpg',
                'foto.max' => 'Ukuran foto maksimal 10MB',
                'deskripsi.required' => 'Deskripsi wajib diisi'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Foto gagal disimpan!')->withErrors($e->validator->errors())->withInput();
        }

        // upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = 'foto_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/'), $nama_foto);
        }

        // unlink foto lama
        if (isset($request->id)) {
            $fotoLama = Foto::find($request->id)->foto;
            if (file_exists(public_path('img/' . $fotoLama))) {
                unlink(public_path('img/' . $fotoLama));
            }
        }

        $data = [
            'nama' => $request->nama,
            'foto' => $request->hasFile('foto') ? $nama_foto : Foto::find($request->id)->foto ?? 'default.jpg',
            'deskripsi' => $request->deskripsi
        ];

        // simpan data
        if ($request->id) {
            Foto::find($request->id)->update($data);
        } else {
            Foto::create($data);
        }

        // simpan riwayat aktivitas
        RiwayatAktivitas::create([
            'user_id' => auth()->id(),
            'modul' => 'Foto',
            'aktivitas' => 'Menyimpan foto ' . $data['nama'],
            'data' => json_encode([
                'sebelum' => $request->id ? Foto::find($request->id)->toArray() : null,
                'sesudah' => $data
            ])
        ]);

        return redirect()->route('foto.index')->with('success', 'Foto berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        return view('admin.galeri.foto.create', [
            'title' => 'Detail Foto',
            'foto' => $foto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        // jika data kosong mengembalikan pesan error
        if (!$foto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            // jika ada foto maka unlink foto
            if (file_exists(public_path('img/' . $foto->foto))) {
                unlink(public_path('img/' . $foto->foto));
            }

            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Foto',
                'aktivitas' => 'Menghapus foto ' . $foto->nama,
                'data' => json_encode([
                    'sebelum' => $foto->toArray(),
                    'sesudah' => null
                ])
            ]);

            // hapus data
            $foto->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }

    /**
     * Remove all specified resource from storage.
     */
    public function destroyAll()
    {
        // jika data kosong mengembalikan pesan error
        if (Foto::count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            foreach (Foto::all() as $foto) {
                // unlink semua foto
                if (file_exists(public_path('img/' . $foto->foto))) {
                    unlink(public_path('img/' . $foto->foto));
                }

                // simpan riwayat aktivitas
                RiwayatAktivitas::create([
                    'user_id' => auth()->id(),
                    'modul' => 'Foto',
                    'aktivitas' => 'Menghapus foto ' . $foto->nama,
                    'data' => json_encode([
                        'sebelum' => $foto->toArray(),
                        'sesudah' => null
                    ])
                ]);
            }

            // hapus semua data
            Foto::truncate();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
}
