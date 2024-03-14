<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/pengaturan-akun/index', [
            'title' => 'Pengaturan Akun'
        ]);
    }
}
