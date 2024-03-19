<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAktivitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class PengaturanAkunController extends Controller
{

    // protected ke model User
    protected $user;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pengaturan-akun.index', [
            'title' => 'Pengaturan Akun'
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validasi data
        try {
            Validator::extend('password_old_match', function ($attribute, $value, $parameters, $validator) {
                return password_verify($value, auth()->user()->password);
            });

            $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'password_old' => 'required|password_old_match',
                'password' => 'required_with:password_confirmation',
                'password_confirmation' => 'required_with:password|same:password'
            ], [
                'nama.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password harus diisi',
                'password_confirmation.required' => 'Konfirmasi password harus diisi',
                'password_confirmation.same' => 'Konfirmasi password tidak sama',
                'password_old.required' => 'Password lama harus diisi',
                'password_old_match' => 'Password lama tidak sesuai'
            ]);

            // data yang akan diupdate
            $data = [
                'name' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ];

            // jika password kosong
            if ($request->password == null) {
                unset($data['password']);
            }

            // update data pada id user
            User::find($id)->update($data);

            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Pengaturan Akun',
                'aktivitas' => 'Mengubah Data Akun'
            ]);

            return redirect()->back()->with('success', 'Akun berhasil diupdate!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Akun gagal diupdate!')->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
