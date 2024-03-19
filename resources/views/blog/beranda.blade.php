@extends('layouts/blog/main')
@section('content')
    @include('layouts/blog/header')

        <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/s-11.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h1 class="text-center"> YAYASAN MENTARI SEHAT INDONESIA</h1>
              <h3 class="text-center" style="color: #21df41;">Kabupaten Klaten</h3>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/s-22.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h1 class="text-center"> YAYASAN MENTARI SEHAT INDONESIA</h1>
              <h3 class="text-center" style="color: #21df41;">Kabupaten Klaten</h3>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/s-33.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h1 class="text-center"> YAYASAN MENTARI SEHAT INDONESIA</h1>
              <h3 class="text-center" style="color: #21df41;">Kabupaten Klaten</h3>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Situasi Section ======= -->
    <section id="services" class="services section-bg1">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div style="text-align: center;">
            <h2 style="color:#4D4D4D;">Situasi Kasus TBC di Kabupaten Klaten</h2>
            <p style="color: #ffffff;">
                Update per Bulan Tahun 2024 (Januari - Februari 2024)
            </p>
          </div>
        
          <!-- Kolom 1 -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box" style="background-color: #21df41;">
              <h4 style="color: #ffffff;">Kasus TBC Terduga</h4>
              <h2>32</h2>
            </div>
          </div>
    
          <!-- Kolom 2 -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box" style="background-color: #C5F7EF;">
              <h4 style="color: #21df41;">Kasus TBC Ternotifikasi</h4>
              <h2>??</h2>
            </div>
          </div>
    
          <!-- Kolom 3 -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box" style="background-color: #21df41;">
              <h4 style="color: #ffffff;">Kasus TBC Sembuh</h4>
              <h2>??</h2>
            </div>
          </div>
    
          <!-- Kolom 4 -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box" style="background-color: #C5F7EF;">
              <h4 style="color: #21df41;">Kasus TBC Meninggal</h4>
              <h2>??</h2>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Situasi Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>Welcome to Yayasan</h2>
            <h2 style="color: #21df41;">Mentari Sehat Indonesia</h2>
            <div class="row">
              <div class="col-lg-6" data-aos="fade-right">
                <h4>VISI :</h4>
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-justify">
                <p>
                  Penggerak terwujudnya infrastruktur kesehatan non pemerintah dan dinamika kelompok sosial yang mampu secara mandiri menanggulangi masalah kesehatan, sosial, dan pendidikan di masyarakat.
                </p>
              </div>
            </div>            
            <h3 style="color: #21df41;">Mentari Sehat Indonesia Kabupaten Klaten</h3>
            <p class="text-justify">
              Mentari Sehat Indonesia Kabupaten Klaten terletak di Perum Gunungan No.19, RT.01/RW.10, Gunungan, Bareng Lor, Kec. Klaten Utara, Kabupaten Klaten, Jawa Tengah 57438
            </p>
            <div class="text-center"><a href="" class="btn-get-started">Selengkapnya</a></div>
          </div>
          <div class="col-lg-6" data-aos="fade-left">
            <div class="about-img">
              <img src="assets/img/foto kantor.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- Proker start -->
    <section id="proker" class="proker"></section>
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Program Kerja</h2>
      </div>
      <div class="row justify-content-center">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="single-post-wrap style-white">
                    <div class="thumb">
                        <img src="assets/img/proker/Foto Program.jpeg" alt="img">
                        <a class="tag-base tag-blue">IK</a>
                    </div>
                    <div class="details">
                        <h6 class="title" style="color: #21df41;" ><a>Investigasi Kontak</a></h6>
                        <div class="post-meta-single mt-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="single-post-wrap style-white">
                    <div class="thumb">
                        <img src="assets/img/Proker/Foto Program.jpeg" alt="img">
                        <a class="tag-base tag-orange">Suspek</a>
                    </div>
                    <div class="details">
                        <h6 class="title" style="color: #21df41;"><a>Suspek Terduga</a></h6>
                        <div class="post-meta-single mt-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="single-post-wrap style-white">
                    <div class="thumb">
                        <img src="assets/img/Proker/Foto Program.jpeg" alt="img">
                        <a class="tag-base tag-blue">CNR</a>
                    </div>
                    <div class="details">
                        <h6 class="title" style="color: #21df41;"><a>Case Notification Rate </a></h6>
                        <div class="post-meta-single mt-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="single-post-wrap style-white">
                    <div class="thumb">
                        <img src="assets/img/Proker/Foto Program.jpeg" alt="img">
                        <a class="tag-base tag-orange">TPT</a>
                    </div>
                    <div class="details">
                        <h6 class="title" style="color: #21df41;"><a>Terapi Pencegahan Tubercolosis</a></h6>
                        <div class="post-meta-single mt-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
              <div class="single-post-wrap style-white">
                  <div class="thumb">
                      <img src="assets/img/Proker/Foto Program.jpeg" alt="img">
                      <a class="tag-base tag-blue">Penyuluhan</a>
                  </div>
                  <div class="details">
                      <h6 class="title" style="color: #21df41;"><a>Penyuluhan</a></h6>
                      <div class="post-meta-single mt-3">
                      </div>
                  </div>
              </div>
          </div>
          <div class="text-center"><a href="" class="btn-get-startedd">Selengkapnya</a></div>
        </div>
        </div>
    </div>  
</div>
<!-- Proker end -->

   <!-- ======= Latest News Section ======= -->
   <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="section-title">
              <h2>Latest News</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.html">Semua Berita
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="news-carousel" class="swiper">
        <div class="swiper-wrapper">

          <div class="carousel-item-c swiper-slide">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="assets/img/news/news1.jpg" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="#" class="category-b">Penyuluhan</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="blog-single.html">Pertemuan Dukungan Pasien TBC-RO
                        </a>
                    </h2>
                  </div>
                  <div class="card-date">
                    <span class="date-b">06 Mar. 2024</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->

          <div class="carousel-item-c swiper-slide">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="assets/img/news/news2.jpg" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="#" class="category-b">Screening</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="blog-single.html">Screening Bersama Dinas Kesehatan Kabupaten Klaten di Ponpes Yapu Sunni Tegalgondo
                        </a>
                    </h2>
                  </div>
                  <div class="card-date">
                    <span class="date-b">06 Mar. 2024</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->

          <div class="carousel-item-c swiper-slide">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="assets/img/news/news3.jpg" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="#" class="category-b">Pertemuan</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="blog-single.html">Validasi Data dan Koordinasi Komunitas dan Layanan Kesehatan Kabupaten Klaten
                        </a>
                    </h2>
                  </div>
                  <div class="card-date">
                    <span class="date-b">02 Mar. 2024</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->

          <div class="carousel-item-c swiper-slide">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="assets/img/news/news4-1.jpg" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="#" class="category-b">Pelatihan</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="#">Frefreshment Kader Baru MSI Klaten 2024 Day 1-2
                        </a>
                    </h2>
                  </div>
                  <div class="card-date">
                    <span class="date-b">7-8 Mar. 2024</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->

        </div>
      </div>

      <div class="news-carousel-pagination carousel-pagination"></div>
    </div>
  </section><!-- End Latest News Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Clients Section -->

  </main><!-- End #main -->

        @include('layouts/blog/footer')
@endsection
