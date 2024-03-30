@extends('layouts/blog/main')
@section('content')
    @include('layouts/blog/header')

    <!-- Content -->
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
      
              <div class="d-flex justify-content-between align-items-center">
                <h2>Program Kerja</h2>
                <ol>
                  <li><a href="/">Beranda</a></li>
                  <li>Program Kerja</li>
                </ol>
              </div>
      
            </div>
          </section><!-- End Breadcrumbs -->
            <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-in">Indikator Program</h2>
        </div>

        <div class="row">
          <div class="col-md-6 d-flex" data-aos="fade-right">
            <div class="card">
              <div class="card-img">
                <img src="public/img/img-blog/pk/ik.jpg" alt="ik">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Investigasi Kontak</a></h5>
                <p class="card-text"> Kegiatan pelacakan dan investigasi secara sistematik yang ditujukan pada
                  orang-orang yang kontak serumah dan kontak erat dengan pasien tuberkulosis
                  paru dengan hasil pemeriksaan sputum positif atau terduga/kasus tuberkulosis
                  resistan obat. Kontak serumah merupakan orang yang tinggal serumah minimal satu malam atau sering tinggal serumah
                  pada siang hari dengan dengan pasien tuberkulosis paru dengan hasil
                  pemeriksaan sputum positif atau terduga/kasus tuberkulosis resistan obat
                  dalam 3 bulan terakhir sebelum pasien tuberkulosis paru mendapat obat anti
                  tuberkulosis (OAT).</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex" data-aos="fade-left">
            <div class="card">
              <div class="card-img">
                <img src="public/img/img-blog/pk/penyuluhan.jpg" alt="penyuluhan">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Penyuluhan</a></h5>
                <p class="card-text">Kegiatan penyuluhan dalam tuberkulosis (TBC) merupakan bagian integral dari program pencegahan dan pengendalian TBC. Penyuluhan TBC bertujuan untuk meningkatkan pemahaman masyarakat tentang penyakit TBC, cara penularannya, gejala, diagnosis, pengobatan, dan pentingnya pencegahan.</p></div>
            </div>

          </div>
          <div class="col-md-6 d-flex" data-aos="fade-right">
            <div class="card">
              <div class="card-img">
                <img src="public/img/img-blog/pk/cnr.jpg" alt="cnr">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Case Notification Rate</a></h5>
                <p class="card-text">Case Notification Rate (CNR) adalah salah satu indikator penting dalam pemantauan dan evaluasi program pengendalian tuberkulosis (TBC). CNR mengacu pada jumlah kasus TBC baru yang dilaporkan dalam satu periode waktu tertentu, biasanya dalam satu tahun, per 100.000 populasi.
                  CNR adalah metrik yang penting karena memberikan gambaran tentang tingkat kejadian kasus TBC baru dalam suatu populasi.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex" data-aos="fade-left">
            <div class="card">
              <div class="card-img">
                <img src="public/img/img-blog/pk/tpt.jpg" alt="tpt">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Terapi Pencegahan Tuberkolosis</a></h5>
                <p class="card-text">Terapi Pencegahan Tuberkulosis (TPT) yakni pengobatan pencegahan rutin baik bagi masyarakat sehat yang kontak erat dengan penderita positif TB. Tujuan pemberian TPT adalah untuk mencegah terjadinya sakit TBC sehingga dapat menurunkan beban TBC. Siapa saja yang bisa diberikan TPT? Orang dengan HIV/AIDS (ODHA)
                  Kontak serumah dengan pasien TBC paru yang terkonfirmasi bakteriologis diantarnya Anak usia di bawah 5 tahun, Anak usia 5-14 tahun, Remaja dan dewasa (usia di atas 15 tahun). Pemberian TPT dapat mengurangi risiko seseorang yang tinggal serumah dengan positif TB sekitar 60 sampai 90 persen.</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
          <div class="col-md-6 d-flex" data-aos="fade-left">
            <div class="card">
              <div class="card-img">
                <img src="public/img/img-blog/pk/suspek.jpg" alt="suspek">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a>Suspek Terduga</a></h5>
                <p class="card-text">Kegiatan pencarian seorang individu dianggap sebagai suspek TBC ketika dia memiliki gejala atau 
                  tanda yang mengarah kepada TBC, seperti batuk persisten lebih dari dua minggu, demam, penurunan berat badan yang 
                  tidak dapat dijelaskan, keringat malam, atau sesak napas. Orang-orang yang berisiko tinggi terkena TBC, 
                  seperti kontak dengan penderita TBC aktif, atau memiliki kondisi medis yang meningkatkan risiko terkena TBC, 
                  juga dapat dianggap sebagai suspek TBC. Namun, status suspek TBC belum dipastikan secara diagnostik, dan perlu dilakukan 
                  lebih lanjut pemeriksaan dan evaluasi untuk memastikan diagnosis.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

        @include('layouts/blog/footer')
@endsection
