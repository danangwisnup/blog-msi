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
            $table->string('nama_blog');
            $table->string('judul_header');
            $table->string('judul_subheader');
            $table->text('deskripsi');
            $table->timestamps();
        });

        DB::table('profils')->insert([
            'logo' => 'msi.png',
            'nama_blog' => 'Blog Saya',
            'judul_header' => 'Selamat Datang di Blog Saya',
            'judul_subheader' => 'Blog ini berisi tentang...',
            'deskripsi' => 'Blog ini berisi tentang...',
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
