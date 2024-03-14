<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/program-kerja/index', [
            'title' => 'Program Kerja'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/program-kerja/create', [
            'title' => 'Tambah Program Kerja'
        ]);
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
    public function show(ProgramKerja $programKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramKerja $programKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramKerja $programKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKerja $programKerja)
    {
        // Hapus data dari database
        //$programKerja->delete();

        return response()->json(['status' => 'success', 'message' => 'Program Kerja berhasil dihapus']);
    }


    /**
     * Remove all resource from storage.
     */
    public function destroyAll()
    {
        // Hapus semua data dari database
        //ProgramKerja::truncate();

        return response()->json(['status' => 'success', 'message' => 'Program Kerja berhasil dihapus']);
    }
}
