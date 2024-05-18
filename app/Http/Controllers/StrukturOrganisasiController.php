<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAktivitas;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tentang.struktur-organisasi.index', [
            'title' => 'Struktur Organisasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tentang.struktur-organisasi.create', [
            'title' => 'Tambah Struktur Organisasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'foto' => 'required_if:id,null|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'nama' => 'required',
                'jabatan' => 'required'
            ], [
                'foto.required_if' => 'Foto harus diunggah jika ID kosong.',
                'foto.image' => 'Foto harus berupa gambar.',
                'foto.mimes' => 'Foto harus berformat jpeg, png, jpg, gif, atau svg.',
                'foto.max' => 'Ukuran foto maksimal 5MB.',
                'nama.required' => 'Nama harus diisi.',
                'jabatan.required' => 'Jabatan harus diisi.'
            ]);
        } catch (ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors())->with('error', 'Data gagal ditambahkan.');
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi = public_path('img/struktur-organisasi');
            $foto->move($lokasi, $nama_foto);

            if ($request->id) {
                $struktur_organisasi = StrukturOrganisasi::find($request->id);
                if ($struktur_organisasi && $struktur_organisasi->foto) {
                    $lokasi_foto = public_path('img/struktur-organisasi/' . $struktur_organisasi->foto);
                    if (file_exists($lokasi_foto)) {
                        unlink($lokasi_foto);
                    }
                }
            }
        }

        // data
        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan
        ];

        if (isset($nama_foto)) {
            $data['foto'] = $nama_foto;
        }

        StrukturOrganisasi::updateOrCreate(['id' => $request->id], $data);

        // simpan riwayat aktivitas
        RiwayatAktivitas::create([
            'user_id' => auth()->id(),
            'modul' => 'Tentang/Struktur Organisasi',
            'aktivitas' => $request->id ? 'Mengubah data struktur organisasi ' . $data['nama'] : 'Menambah data struktur organisasi ' . $data['nama'],
            'data' => json_encode([
                'sebelum' => $request->id ? StrukturOrganisasi::find($request->id)->toArray() : null,
                'sesudah' => $data
            ])
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('admin.tentang.struktur-organisasi.create', [
            'title' => 'Detail Struktur Organisasi',
            'strukturOrganisasi' => $strukturOrganisasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        // jika data kosong mengembalikan pesan error
        if ($strukturOrganisasi->count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Tentang/Struktur Organisasi',
                'aktivitas' => 'Menghapus data struktur organisasi ' . $strukturOrganisasi->nama,
                'data' => json_encode([
                    'sebelum' => $strukturOrganisasi->toArray(),
                    'sesudah' => null
                ])
            ]);

            // hapus data
            $strukturOrganisasi->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
    /**
     * Menghapus semua program kerja dari penyimpanan.
     */
    public function destroyAll()
    {
        // jika data kosong mengembalikan pesan error
        if (StrukturOrganisasi::count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            foreach (StrukturOrganisasi::all() as $strukturOrganisasi) {
                // simpan riwayat aktivitas
                RiwayatAktivitas::create([
                    'user_id' => auth()->id(),
                    'modul' => 'Tentang/Struktur Organisasi',
                    'aktivitas' => 'Menghapus data struktur organisasi ' . $strukturOrganisasi->nama,
                    'data' => json_encode([
                        'sebelum' => $strukturOrganisasi->toArray(),
                        'sesudah' => null
                    ])
                ]);
            }

            // hapus semua data
            StrukturOrganisasi::truncate();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
}
