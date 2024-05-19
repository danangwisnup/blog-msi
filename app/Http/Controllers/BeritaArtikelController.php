<?php

namespace App\Http\Controllers;

use App\Models\BeritaArtikel;
use App\Models\Foto;
use App\Models\RiwayatAktivitas;
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
                'isi' => 'required',
                'foto_upload' => 'image|mimes:jpg,jpeg,png|max:10240',
                'tanggal' => 'required|date'
            ], [
                'tagar.required' => 'Tagar harus diisi',
                'judul.required' => 'Judul harus diisi',
                'judul.unique' => 'Judul sudah ada',
                'isi.required' => 'Isi harus diisi',
                'foto_upload.image' => 'Foto harus berupa gambar',
                'foto_upload.mimes' => 'Foto harus berformat jpg, jpeg, png',
                'foto_upload.max' => 'Foto maksimal berukuran 10MB',
                'tanggal.required' => 'Tanggal harus diisi',
                'tanggal.date' => 'Tanggal harus berformat tanggal'
            ]);

            $tagar = json_decode($request->tagar);
            $tagar = implode(', ', array_map(function ($item) {
                return $item->value;
            }, $tagar));

            // jika ada file foto
            if ($request->hasFile('foto_upload')) {
                // simpan foto dengan nama acak
                $file = $request->file('foto_upload');
                $nama_foto = 'foto_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('img/', $nama_foto);

                // insert ke foto database
                Foto::create([
                    'nama' => $request->judul,
                    'foto' => $nama_foto,
                    'deskripsi' => $request->judul,
                ]);
            }

            // jika tidak ada file foto
            if ($request->foto_pilih == null && $request->foto_upload == null) {
                // jika id ada maka foto tetap
                if ($request->id) {
                    $nama_foto = BeritaArtikel::find($request->id)->foto;
                } else {
                    $nama_foto = 'default.jpg';
                }
            } else {
                // jika ada foto_pilih gunakan, tetapi jika tidak ada gunakan foto_upload
                $nama_foto = $request->foto_pilih ?? $nama_foto;
            }

            // hilangkan spasi
            $tagar = str_replace(',  ', ', ', $tagar);

            // data
            $data = [
                'foto' => $nama_foto,
                'tagar' => strtolower($tagar),
                'judul' => $request->judul,
                'slug' => strtolower(str_replace(' ', '-', $request->judul)),
                'isi' => $request->isi,
                'updated_at' => $request->tanggal ? $request->tanggal . ' ' . now()->format('H:i:s') : now()
            ];

            // validasi isi jika terdapat gambar yang berukuran lebih dari maximal 10 mb
            if (strlen($data['isi']) > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Isi berita / artikel terlalu besar!')->withInput();
            }

            // simpan data
            if ($request->id) {
                BeritaArtikel::find($request->id)->update($data);
            } else {
                BeritaArtikel::create($data);
            }

            // Jika ada id maka simpan perubahan data, jika tidak ada id maka simpan data baru
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Berita / Artikel',
                'aktivitas' => $request->id ? 'Mengubah berita / artikel ' . $data['judul'] : 'Menyimpan berita / artikel ' . $data['judul'],
                'data' => json_encode([
                    'sebelum' => $request->id ? BeritaArtikel::find($request->id)->toArray() : null,
                    'sesudah' => $data
                ])
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
            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Berita / Artikel',
                'aktivitas' => 'Menghapus berita / artikel ' . $beritaArtikel->judul,
                'data' => json_encode([
                    'sebelum' => $beritaArtikel->toArray(),
                    'sesudah' => null
                ])
            ]);

            // hapus data
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
            foreach (BeritaArtikel::all() as $beritaArtikel) {
                // simpan riwayat aktivitas
                RiwayatAktivitas::create([
                    'user_id' => auth()->id(),
                    'modul' => 'Berita / Artikel',
                    'aktivitas' => 'Menghapus berita / artikel ' . $beritaArtikel->judul,
                    'data' => json_encode([
                        'sebelum' => $beritaArtikel->toArray(),
                        'sesudah' => null
                    ])
                ]);
            }

            // hapus semua data
            BeritaArtikel::truncate();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
}
