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
            'visi_deskripsi' => 'Visi yayasan Mentari Sehat Indonesia adalah penggerak  terwujudnya infrastruktur kesehatan non pemerintah dan dinamika kelompok sosial yang mampu secara mandiri menanggulangi masalah kesehatan, sosial, dan pendidikan di masyarakat.',
            'visi_gambar' => 'visi_16383.jpg',
            'misi_deskripsi' => '<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-5afef36" data-id="5afef36" data-element_type="column">
<div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-ca40c23 elementor-widget elementor-widget-heading" data-id="ca40c23" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<ul>
<li><strong>Bidang Kesehatan</strong></li>
</ul>
<p style="padding-left: 40px;">Menggerakkan masyarakat untuk mewujudkan kemandirian dalam mengatasi dan menanggulangi masalah penyakit menular langsung dan mampu menjadi penggerak perubahan perilaku hidup bersih dan sehat di masyarakat.</p>
<ul>
<li style="font-weight: bold;"><strong>Bidang Sosial</strong></li>
</ul>
<p style="padding-left: 40px;">Menggerakkan seluruh komponen untuk mendorong perubahan dan perbaikan kehidupan sosial masyarakat.</p>
<ul>
<li style="font-weight: bold;"><strong>Bidang Pendidikan</strong></li>
</ul>
<p style="padding-left: 40px;">Membantu pemerintah untuk ikut serta mencerdaskan kehidupan bangsa, mendorong masyarakat untuk memperoleh hak pendidikan secara merata dan berkeadilan.</p>
</div>
</div>
</div>
</div>',
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
