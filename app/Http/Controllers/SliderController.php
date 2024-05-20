<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAktivitas;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index', [
            'title' => 'Slider'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create', [
            'title' => 'Tambah Slider'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'urutan' => 'required|integer'
            ], [
                'judul.required' => 'Judul harus diisi.',
                'deskripsi.required' => 'Deskripsi harus diisi.',
                'foto.image' => 'Foto harus berupa gambar.',
                'foto.mimes' => 'Foto harus berformat jpeg, png, jpg, gif, atau svg.',
                'foto.max' => 'Ukuran foto maksimal 5MB.',
                'urutan.required' => 'Urutan harus diisi.',
            ]);
        } catch (ValidationException $e) {
            return back()->withInput()->withErrors($e->validator->errors())->with('error', 'Data gagal ditambahkan.');
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi = 'img/slider';
            $foto->move($lokasi, $nama_foto);
        } else {
            $nama_foto = Slider::find($request->id)->foto ?? null;
        }

        // cek urutan
        $cek_urutan = Slider::where('urutan', $request->urutan)->first();
        if ($cek_urutan && !$request->id) {
            return back()->withInput()->with('error', 'Urutan sudah digunakan.');
        } else if ($cek_urutan) {
            $old = Slider::find($request->id);
            $cek_urutan->where('id', $cek_urutan->id)->update(['urutan' => $old->urutan]);
        }

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $nama_foto,
            'urutan' => $request->urutan
        ];

        // jika ada id update
        if ($request->id) {
            $slider = Slider::find($request->id);
            if ($slider && $slider->foto != $nama_foto) {
                $lokasi_foto = 'img/slider/' . $slider->foto;
                if (file_exists($lokasi_foto)) {
                    unlink($lokasi_foto);
                }

                $slider->update($data);
            }
        } else {
            Slider::create($data);
        }

        return redirect()->route('slider.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.create', [
            'title' => 'Detail Slider',
            'slider' => $slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // jika data kosong mengembalikan pesan error
        if ($slider->count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Slider',
                'aktivitas' => 'Menghapus slider ' . $slider->judul,
                'data' => json_encode([
                    'sebelum' => $slider->toArray(),
                    'sesudah' => null
                ])
            ]);

            // unlink foto
            $lokasi_foto = 'img/slider/' . $slider->foto;
            if (file_exists($lokasi_foto)) {
                unlink($lokasi_foto);
            }

            // hapus data
            $slider->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAll()
    {
        // jika data kosong mengembalikan pesan error
        if (Slider::count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            foreach (Slider::all() as $slider) {
                // simpan riwayat aktivitas
                RiwayatAktivitas::create([
                    'user_id' => auth()->id(),
                    'modul' => 'Slider',
                    'aktivitas' => 'Menghapus slider ' . $slider->judul,
                    'data' => json_encode([
                        'sebelum' => $slider->toArray(),
                        'sesudah' => null
                    ])
                ]);

                // unlink foto
                $lokasi_foto = 'img/slider/' . $slider->foto;
                if (file_exists($lokasi_foto)) {
                    unlink($lokasi_foto);
                }

                // hapus data
                $slider->delete();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
}
