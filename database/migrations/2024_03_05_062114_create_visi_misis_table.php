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
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id();
            $table->text('visi_deskripsi');
            $table->string('visi_gambar');
            $table->text('misi_deskripsi');
            $table->string('misi_gambar');
            $table->timestamps();
        });

        // Insert some data
        DB::table('visi_misis')->insert([
            'visi_deskripsi' => 'Menjadi organisasi yang berperan aktif dalam pembangunan bangsa dan negara',
            'visi_gambar' => 'visi_16383.jpg',
            'misi_deskripsi' => 'Membangun karakter dan kepribadian yang kuat dan berakhlak mulia',
            'misi_gambar' => 'misi_16383.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_misis');
    }
};
