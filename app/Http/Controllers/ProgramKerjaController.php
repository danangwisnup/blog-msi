<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProgramKerjaController extends Controller
{
    /**
     * Menampilkan daftar program kerja.
     */
    public function index()
    {
        return view('admin.program-kerja.index', [
            'title' => 'Program Kerja'
        ]);
    }

    /**
     * Menampilkan form untuk membuat program kerja baru.
     */
    public function create()
    {
        return view('admin.program-kerja.create', [
            'title' => 'Tambah Program Kerja'
        ]);
    }

    /**
     * Menyimpan program kerja baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_program' => 'required|unique:program_kerjas,nama_program,' . $request->id,
                'deskripsi' => 'required'
            ], [
                'nama_program.required' => 'Nama Program harus diisi',
                'nama_program.unique' => 'Nama Program sudah ada',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]);

            ProgramKerja::updateOrCreate([
                'id' => $request->id
            ], [
                'nama_program' => $request->nama_program,
                'deskripsi' => $request->deskripsi
            ]);

            return redirect()->back()->with('success', 'Program Kerja berhasil disimpan!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Program Kerja gagal disimpan!')->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Menampilkan detail program kerja.
     */
    public function show(ProgramKerja $programKerja)
    {
        return view('admin.program-kerja.create', [
            'title' => 'Detail Program Kerja',
            'programKerja' => $programKerja
        ]);
    }

    /**
     * Menampilkan form untuk mengedit program kerja.
     */
    public function edit(ProgramKerja $programKerja)
    {
        return view('admin.program-kerja.edit', [
            'title' => 'Edit Program Kerja',
            'programKerja' => $programKerja
        ]);
    }

    /**
     * Memperbarui program kerja yang ada di penyimpanan.
     */
    public function update(Request $request, ProgramKerja $programKerja)
    {
        try {
            $request->validate([
                'nama_program' => 'required|unique:program_kerjas,nama_program,' . $programKerja->id,
                'deskripsi' => 'required'
            ], [
                'nama_program.required' => 'Nama Program harus diisi',
                'nama_program.unique' => 'Nama Program sudah ada',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ]);

            $programKerja->update([
                'nama_program' => $request->nama_program,
                'deskripsi' => $request->deskripsi
            ]);

            return redirect()->route('program-kerja.index')->with('success', 'Program Kerja berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Program Kerja gagal diperbarui!')->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Menghapus program kerja dari penyimpanan.
     */
    public function destroy(ProgramKerja $programKerja)
    {
        // jika data kosong mengembalikan pesan error
        if ($programKerja->count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            // hapus data
            $programKerja->delete();
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
        if (ProgramKerja::count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            // hapus semua data
            ProgramKerja::truncate();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
}
