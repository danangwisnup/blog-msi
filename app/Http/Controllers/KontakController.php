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
                'alamat_kantor' => 'required'
            ], [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'ig.required' => 'Instagram harus diisi',
                'wa.required' => 'Whatsapp harus diisi',
                'alamat_kantor.required' => 'Alamat kantor harus diisi'
            ]);

            // data
            $data = [
                'email' => $request->email,
                'ig' => $request->ig,
                'wa' => $request->wa,
                'alamat_kantor' => $request->alamat_kantor
            ];

            // sebelumnya
            $sebelumnya = Kontak::first()->select('email', 'ig', 'wa', 'alamat_kantor')->first();

            // update data first
            Kontak::first()->update($data);

            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Kontak',
                'aktivitas' => 'Mengubah kontak',
                'data' => json_encode([
                    'sebelum' => $sebelumnya,
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
