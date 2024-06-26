<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\RiwayatAktivitas;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kontak.index', [
            'title' => 'Kontak'
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
        // validasi data
        try {
            $request->validate([
                'email' => 'required|email',
                'ig' => 'required',
                'wa' => 'required',
                'alamat_kantor' => 'required',
                'google_maps' => 'required'
            ], [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'ig.required' => 'Instagram harus diisi',
                'wa.required' => 'Whatsapp harus diisi',
                'alamat_kantor.required' => 'Alamat kantor harus diisi',
                'google_maps.required' => 'Google Maps harus diisi'
            ]);

            // Define the regular expression pattern
            $pattern = '/<iframe[^>]*src="([^"]*)"/i';

            // Execute the regular expression
            if (preg_match($pattern, $request->google_maps, $matches)) {
                // The captured group 1 contains the src value
                $google_maps = $matches[1];
            } else {
                $google_maps = $request->google_maps;
            }

            // jika data map tidak valid
            // karena tidak memiliki https://www.google.com/maps/embed?pb=
            if (!str_contains($google_maps, 'https://www.google.com/maps/embed?pb=')) {
                return redirect()->back()->with('error', 'Google Maps tidak valid!')->withInput();
            }

            // data
            $data = [
                'email' => $request->email,
                'ig' => $request->ig,
                'wa' => $request->wa,
                'alamat_kantor' => $request->alamat_kantor,
                'google_maps' => $google_maps
            ];

            // update data first
            Kontak::first()->update($data);

            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Kontak',
                'aktivitas' => 'Mengubah kontak',
                'data' => json_encode([
                    'sebelum' => Kontak::first()->toArray(),
                    'sesudah' => $data
                ])
            ]);

            return redirect()->back()->with('success', 'Kontak berhasil diupdate!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Kontak gagal diupdate!')->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        //
    }
}
