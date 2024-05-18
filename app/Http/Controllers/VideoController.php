<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAktivitas;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.galeri.video.index', [
            'title' => 'Video'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.video.create', [
            'title' => 'Tambah Video'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        try {
            $request->validate([
                'nama' => 'required',
                'video' => 'required',
                'deskripsi' => 'required'
            ], [
                'nama.required' => 'Nama wajib diisi',
                'video.required' => 'Video wajib diisi',
                'deskripsi.required' => 'Deskripsi wajib diisi'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Video gagal disimpan!')->withErrors($e->validator->errors())->withInput();
        }

        // Pattern to match iframe with src attribute
        $iframePattern = '/<iframe[^>]*src="([^"]*)"/i';

        if (preg_match($iframePattern, $request->video, $matches)) {
            // Extract the src attribute value from the iframe
            $video = $matches[1];
        } elseif (strpos($request->video, 'watch?v=') !== false) {
            // Extract the video ID from the standard YouTube URL
            $urlParts = parse_url($request->video);
            parse_str($urlParts['query'], $queryParams);
            $videoId = $queryParams['v'];
            $video = 'https://www.youtube.com/embed/' . $videoId;
        } elseif (strpos($request->video, 'youtu.be/') !== false) {
            // Convert shortened YouTube URL to embed URL
            $videoId = explode('youtu.be/', $request->video)[1];
            $video = 'https://www.youtube.com/embed/' . $videoId;
        } else {
            // If it's already an embed URL or not a recognized YouTube URL, keep it as is
            $video = $request->video;
        }

        // jika video tidak dari youtube
        if (strpos($video, 'youtube') === false) {
            return redirect()->back()->with('error', 'Video harus berasal dari YouTube!')->withInput();
        }

        $data = [
            'nama' => $request->nama,
            'video' => $video,
            'deskripsi' => $request->deskripsi
        ];

        // simpan data
        if ($request->id) {
            Video::find($request->id)->update($data);
        } else {
            Video::create($data);
        }

        // simpan riwayat aktivitas
        RiwayatAktivitas::create([
            'user_id' => auth()->id(),
            'modul' => 'Foto',
            'aktivitas' => 'Menyimpan video ' . $data['nama'],
            'data' => json_encode([
                'sebelum' => $request->id ? Video::find($request->id)->toArray() : null,
                'sesudah' => $data
            ])
        ]);

        return redirect()->route('video.index')->with('success', 'Video berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('admin.galeri.video.create', [
            'title' => 'Detail Video',
            'video' => $video
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        // jika data kosong mengembalikan pesan error
        if (!$video) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            // simpan riwayat aktivitas
            RiwayatAktivitas::create([
                'user_id' => auth()->id(),
                'modul' => 'Video',
                'aktivitas' => 'Menghapus video ' . $video->nama,
                'data' => json_encode([
                    'sebelum' => $video->toArray(),
                    'sesudah' => null
                ])
            ]);

            // hapus data
            $video->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }

    /**
     * Menghapus semua data.
     */
    public function destroyAll()
    {
        // jika data kosong mengembalikan pesan error
        if (Video::count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada data yang dihapus!'
            ]);
        } else {
            foreach (Video::all() as $video) {
                // simpan riwayat aktivitas
                RiwayatAktivitas::create([
                    'user_id' => auth()->id(),
                    'modul' => 'Video',
                    'aktivitas' => 'Menghapus video ' . $video->nama,
                    'data' => json_encode([
                        'sebelum' => $video->toArray(),
                        'sesudah' => null
                    ])
                ]);
            }

            // hapus semua data
            Video::truncate();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        }
    }
}
