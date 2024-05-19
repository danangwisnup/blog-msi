<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function beranda()
    {
        return view('blog.beranda', [
            'title' => 'Beranda'
        ]);
    }

    public function profil()
    {
        return view('blog.tentang.profil', [
            'title' => 'Profil'
        ]);
    }

    public function visiMisi()
    {
        return view('blog.tentang.visi-misi', [
            'title' => 'Visi Misi'
        ]);
    }

    public function strukturOrganisasi()
    {
        return view('blog.tentang.struktur-organisasi', [
            'title' => 'Struktur Organisasi'
        ]);
    }

    public function programKerja()
    {
        return view('blog.program-kerja', [
            'title' => 'Program Kerja'
        ]);
    }

    public function galeriFoto()
    {
        $foto = \App\Models\Foto::orderByDesc('updated_at')->paginate(5);

        return view('blog.galeri.foto', [
            'title' => 'Galeri Foto'
        ], compact('foto'));
    }

    public function galeriVideo()
    {
        $video = \App\Models\Video::orderByDesc('updated_at')->paginate(5);

        return view('blog.galeri.video', [
            'title' => 'Galeri Video'
        ], compact('video'));
    }

    public function beritaArtikel(Request $request, $id = null)
    {
        if ($id) {
            // import model
            $beritaArtikel = \App\Models\BeritaArtikel::where('slug', $id)->first();

            return view('blog.berita-artikel', [
                'title' => 'Berita & Artikel',
                'id' => $id,
                'detail' => true,
                'beritaArtikel' => $beritaArtikel,
            ]);
        }

        // Search
        $search = $request->query('search');

        if ($search) {
            $beritaArtikel = \App\Models\BeritaArtikel::orderByDesc('updated_at')->where('judul', 'like', '%' . $search . '%')->paginate(5);

            if ($beritaArtikel->isEmpty()) {
                return view('blog.berita-artikel', [
                    'title' => 'Berita & Artikel',
                    'search' => false,
                    'detail' => false
                ], compact('beritaArtikel'));
            }

            return view('blog.berita-artikel', [
                'title' => 'Berita & Artikel',
                'detail' => false
            ], compact('beritaArtikel'));
        }

        // Tags
        $tag = $request->query('tag');

        if ($tag) {
            $beritaArtikel = \App\Models\BeritaArtikel::orderByDesc('updated_at')->where('tagar', 'like', '%' . $tag . '%')->paginate(5);

            return view('blog.berita-artikel', [
                'title' => 'Berita & Artikel',
                'detail' => false
            ], compact('beritaArtikel'));
        }

        $beritaArtikel = \App\Models\BeritaArtikel::orderByDesc('updated_at')->paginate(5);

        return view('blog.berita-artikel', [
            'title' => 'Berita & Artikel',
            'detail' => false
        ], compact('beritaArtikel'));
    }

    public function kontak()
    {
        return view('blog.kontak', [
            'title' => 'Kontak'
        ]);
    }

    public function sendEmail(Request $request)
    {
        $name = $request->input('nama');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('pesan');

        $receiving_email_address = Kontak::first()->email;

        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8\r\n";

        $email_body = "
            <html>
            <head>
                <title>Pesan Baru dari Form Kontak</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        background-color: #f4f4f4;
                        padding: 20px;
                    }
                    .container {
                        max-width: 600px;
                        margin: auto;
                        background: #ffffff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    }
                    h2 {
                        color: #333333;
                        border-bottom: 1px solid #cccccc;
                        padding-bottom: 10px;
                    }
                    p {
                        margin: 10px 0;
                    }
                    .footer {
                        margin-top: 20px;
                        text-align: center;
                        color: #666666;
                        font-size: 14px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>New Message from Contact Form</h2>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Subject:</strong> $subject</p>
                    <p><strong>Message:</strong></p>
                    <p>$message</p>
                </div>
                <div class='footer'>
                    <p>Pesan ini dikirim melalui formulir kontak di situs web Anda.</p>
                </div>
            </body>
            </html>
        ";

        //$mail_sent = mail($receiving_email_address, $subject, $email_body, $headers);

        // if ($mail_sent) {
        //     return "Pesan berhasil dikirim.";
        // } else {
        //     return "Pesan gagal dikirim.";
        // }

        return "Layanan kontak (E-mail) sedang dinonaktifkan.";
    }
}
