<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAktivitas;

class BerandaController extends Controller
{
    public function admin()
    {
        return view('admin.beranda', [
            'title' => 'Beranda'
        ]);
    }

    public function riwayatAktivitas($id)
    {
        return RiwayatAktivitas::find($id);
    }
}
