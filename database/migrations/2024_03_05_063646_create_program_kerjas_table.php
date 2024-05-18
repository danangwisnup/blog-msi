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
        Schema::create('program_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->text('deskripsi');
            $table->timestamps();
        });

        DB::table('program_kerjas')->insert(
            [
                [
                    'nama_program' => 'Investigasi Kontak',
                    'deskripsi' => '<ul>
<li><strong>Definisi</strong>: Investigasi kontak adalah proses identifikasi dan evaluasi orang-orang yang telah berhubungan dekat dengan seseorang yang telah terdiagnosis TBC aktif.</li>
<li><strong>Tujuan</strong>: Tujuannya adalah untuk menemukan kasus TBC baru atau laten di antara kontak erat untuk mencegah penyebaran lebih lanjut.</li>
<li><strong>Langkah-langkah</strong>: Meliputi wawancara dengan pasien untuk mengidentifikasi kontak, melakukan pemeriksaan medis dan tes diagnostik (seperti tes Mantoux atau IGRA) terhadap kontak tersebut, dan memberikan perawatan atau terapi pencegahan jika diperlukan.</li>
</ul>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_program' => 'Penyuluhan',
                    'deskripsi' => '<ul>
<li><strong>Definisi</strong>: Penyuluhan adalah kegiatan edukasi yang bertujuan untuk meningkatkan pengetahuan masyarakat tentang TBC, cara penularannya, gejala-gejalanya, serta pentingnya diagnosis dini dan kepatuhan terhadap pengobatan.</li>
<li><strong>Tujuan</strong>: Meningkatkan kesadaran masyarakat mengenai TBC agar dapat mencegah penularan, mengurangi stigma, dan mendorong penderita untuk segera mencari pengobatan.</li>
<li><strong>Metode</strong>: Penyuluhan dapat dilakukan melalui berbagai media seperti ceramah, brosur, kampanye kesehatan, media sosial, dan penyuluhan tatap muka.</li>
</ul>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_program' => 'TPT (Terapi Pencegahan Tuberkulosis)',
                    'deskripsi' => '<ul>
<li><strong>Definisi</strong>: TPT adalah pemberian obat-obatan untuk mencegah perkembangan TBC aktif pada individu yang memiliki infeksi TBC laten.</li>
<li><strong>Tujuan</strong>: Mencegah individu yang terinfeksi TBC laten (positif pada tes tuberkulin atau IGRA, tetapi tidak menunjukkan gejala TBC aktif) dari berkembang menjadi TBC aktif.</li>
<li><strong>Regimen</strong>: Regimen TPT biasanya melibatkan pemberian isoniazid selama 6-9 bulan, rifampisin selama 4 bulan, atau kombinasi isoniazid dan rifapentin selama 3 bulan.</li>
</ul>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_program' => 'CNR (Case Notification Rate)',
                    'deskripsi' => '<ul>
<li><strong>Definisi</strong>: CNR adalah angka yang menunjukkan jumlah kasus TBC baru dan kambuhan yang dilaporkan per 100,000 penduduk dalam setahun.</li>
<li><strong>Tujuan</strong>: Mengukur tingkat deteksi dan pelaporan kasus TBC di suatu wilayah, yang penting untuk pemantauan epidemiologi dan evaluasi program pengendalian TBC.</li>
<li><strong>Penggunaan</strong>: CNR digunakan oleh otoritas kesehatan untuk mengevaluasi efektivitas program surveilans TBC dan mengidentifikasi area yang memerlukan intervensi tambahan.</li>
</ul>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_program' => 'Pengobatan dan Pendampingan Pasien',
                    'deskripsi' => '<ul>
<li><strong>Definisi</strong>: Pengobatan dan pendampingan pasien TBC melibatkan pemberian obat-obatan anti-TBC yang tepat, pemantauan kesehatan, dukungan psikososial, dan edukasi pasien tentang pentingnya kepatuhan terhadap pengobatan.</li>
<li><strong>Tujuan</strong>: Menyembuhkan pasien TBC, mencegah penularan ke orang lain, dan mengurangi risiko resistensi obat.</li>
<li><strong>Aspek Penting</strong>: Aspek penting dari pengobatan dan pendampingan pasien meliputi pemantauan efek samping obat, peningkatan kepatuhan pasien, dan penanganan komplikasi atau kegagalan pengobatan.</li>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerjas');
    }
};
