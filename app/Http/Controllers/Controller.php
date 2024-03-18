<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $beritaArtikel = \App\Models\BeritaArtikel::all();
        $kontak = \App\Models\Kontak::first();
        $strukturOrganisasi = \App\Models\StrukturOrganisasi::all();
        $profil = \App\Models\Profil::first();
        $programKerja = \App\Models\ProgramKerja::all();
        $user = \App\Models\User::all();
        $visiMisi = \App\Models\VisiMisi::first();
        $riwayatAktivitas = \App\Models\RiwayatAktivitas::all();

        view()->share('ct_beritaArtikel', $beritaArtikel);
        view()->share('ct_kontak', $kontak);
        view()->share('ct_strukturOrganisasi', $strukturOrganisasi);
        view()->share('ct_profil', $profil);
        view()->share('ct_programKerja', $programKerja);
        view()->share('ct_user', $user);
        view()->share('ct_visiMisi', $visiMisi);
        view()->share('ct_riwayatAktivitas', $riwayatAktivitas);
    }
}
