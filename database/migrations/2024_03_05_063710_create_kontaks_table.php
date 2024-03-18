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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('ig');
            $table->string('wa');
            $table->string('alamat_kantor');
            $table->timestamps();
        });

        DB::table('kontaks')->insert([
            'email' => 'ssrmsi.kabkudus@gmail.com',
            'ig' => 'msi_kab.kudus',
            'wa' => '089514772615',
            'alamat_kantor' => 'Mlati Norowito Gang 8 No. 52 RT 03/ RW 07 Kec. Kota Kudus',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
