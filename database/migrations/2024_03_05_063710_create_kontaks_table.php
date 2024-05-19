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
            $table->text('google_maps')->nullable();
            $table->timestamps();
        });

        DB::table('kontaks')->insert([
            'email' => 'danangwisnu9502@gmail.com',
            'ig' => 'msi_kab.kudus',
            'wa' => '089514772615',
            'alamat_kantor' => 'Mlati Norowito Gang 8 No. 52 RT 03/ RW 07 Kec. Kota Kudus',
            'google_maps' => ' https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.6641571315276!2d110.85499687483444!3d-6.810642693186935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c52e32971c13%3A0xf419b5d16b1fc8af!2sSSR%20MENTARI%20SEHAT%20INDONESIA%20KUDUS!5e0!3m2!1sid!2sid!4v1715926009626!5m2!1sid!2sid',
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
