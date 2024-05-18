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
