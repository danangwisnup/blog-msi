<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('foto_sampul')->nullable();
            $table->text('foto_tentang')->nullable();
            $table->string('nama_blog');
            $table->string('judul_header');
            $table->string('judul_subheader');
            $table->text('deskripsi');
            $table->timestamps();
        });

        DB::table('profils')->insert([
            'logo' => 'msi.png',
            'foto_sampul' => 'sampul.jpg',
            'foto_tentang' => 'tentang.jpg',
            'nama_blog' => 'Mentari Sehat Indonesia Kab. Kudus',
            'judul_header' => 'Mentari Sehat Indonesia',
            'judul_subheader' => 'Kab. Kudus',
            'deskripsi' => '<p>Yayasan Mentari Sehat Indonesia berdiri pada tanggal 22 Juli 2020 di Kota Semarang. Pendirian yayasan ini diprakarsai oleh Prof. Dr. Masrukhi, M.Pd, Supriyanto, M.Pd., Hj. Siti Taqiyah, BA., Noor Diansyah, SKM., dan Chairul Basar, SE. Yayasan ini berdiri sebagai bentuk partisipasi masyarakat di bidang kesehatan, sosial dan pendidikan di Indonesia.</p>
<p>Di bidang kesehatan Yayasan Mentari Sehat berperan untuk menggerakkan masyarakat dalam upaya mewujudkan kemandirian dalam mengatasi dan menanggulangi masalah-masalah penyakit menular di masyarakat seperti; TBC, HIVAIDS, Malaria dan lain-lain. Dalam bidang sosial Yayasan Mentari Sehat berperan untuk menggerakkan seluruh komponen masyarakat dalam upaya mendorong perubahan dan perbaikan kehidupan sosial budaya masyarakat. Selanjutnya di dalam bidang pendidikan yayasan ini berperan untuk membantu pemerintah untuk ikut serta mencerdaskan kehidupan bangsa, mendorong masyarakat untuk memperoleh hak pendidikan secara merata dan berkeadilan.</p>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
