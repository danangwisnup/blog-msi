@extends('layouts/blog/main')
@section('content')
    @include('layouts/blog/header')
    <center id="beranda">
        <section id="hero" style="align-items: center; justify-content: center;">
            <div id="heroCarousel" data-bs-interval="5000" class="mt-3 carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">

                    <!-- Slide Sampul -->
                    <div class="carousel-item active"
                        style="background-image: url('img/{{ $ct_profil->foto_sampul }}'); background-position: center; background-size: cover;">
                        <div
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
                        </div>
                        <div class="carousel-container">
                            <div style="position: relative; z-index: 1; color: white; text-align: center; padding: 20px;">
                                <div class="text-white animate__animated animate__fadeInUp">
                                    <h2 class="text-center text-uppercase fw-bold">
                                        Selamat Datang di Website Resmi
                                    </h2>
                                    <h4 class="text-center text-uppercase fw-bold">
                                        {{ $ct_profil->nama_blog }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide SLider -->
                    @foreach ($ct_slider as $item)
                        <div class="carousel-item"
                            style="background-image: url('img/slider/{{ $item->foto }}'); background-position: center; background-size: cover;">
                            <div
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
                            </div>
                            <div class="carousel-container">
                                <div
                                    style="position: relative; z-index: 1; color: white; text-align: center; padding: 20px;">
                                    <div class="text-white animate__animated animate__fadeInUp">
                                        <h2 class="text-center fw-bold">{{ $item->judul }}</h2>
                                        <p class="text-center fw-bold">{{ $item->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

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
    </center>

    <main id="main" style="overflow-x: hidden;">
        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 mb-3" data-aos="fade-right">
                        <h2>{{ $ct_profil->nama_blog }}</h2>
                        <div class="row">
                            <p class="text-muted">{!! $ct_profil->deskripsi !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="features">
                            <div class="icon-box">
                                <div class="d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="about-img">
                                        <img src="{{ asset('img') }}/{{ $ct_profil->foto_tentang }}" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Our Skills Section ======= -->
        <section id="skills" class="skills">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Visi & Misi</h2>
                </div>

                <div class="row skills-content">

                    <div class="col-lg-6 mb-5" data-aos="fade-up">
                        <strong>Visi</strong> <br>
                        {!! $ct_visiMisi->visi_deskripsi !!}
                    </div>

                    <div class="col-lg-6 mb-5" data-aos="fade-up">
                        <strong>Misi</strong> <br>
                        {!! $ct_visiMisi->misi_deskripsi !!}
                    </div>

                </div>

            </div>
        </section><!-- End Our Skills Section -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Pengurus <strong>Kami</strong></h2>
                </div>

                <div class="row">

                    @foreach ($ct_strukturOrganisasi as $pengurus)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member" data-aos="fade-up">
                                <div class="member-img">
                                    <img src="{{ url('img/struktur-organisasi') }}/{{ $pengurus->foto }}" class="img-fluid"
                                        alt="">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{ $pengurus->nama }}</h4>
                                    <h6>{{ $pengurus->jabatan }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Our Team Section -->

        <!-- Berita atau Artikel start -->
        <section id="berita-artikel" class="pricing section-bg1">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-white">
                    <a href="{{ route('berita-artikel') }}" class="text-decoration-none text-white">
                        <h2>Berita & Artikel Terbaru</h2>
                    </a>
                </div>
                <div class="row justify-content-center">
                    @foreach ($ct_beritaArtikel->slice(0, 6) as $item)
                        <div class="col-lg-4 col-md-12 mb-3">
                            <a href="{{ route('berita-artikel.detail', $item->slug) }}" class="text-decoration-none">
                                <div class="box" style="cursor: pointer; position: relative;">
                                    <span class="btn btn-dark text-white text-uppercase"
                                        style="font-size: 12px; font-weight: bold; padding: 5px 10px; border-radius: 5px; position: absolute; top: 25px; right: 20px; z-index: 1; background-color: #28a745 !important; border-color: #28a745 !important;">
                                        {{ $item->updated_at->format('d F Y') }}
                                    </span>
                                    <img src="{{ asset('img/' . $item->foto) }}" class="card-img-top" max-width="300"
                                        height="200" alt="...">
                                    <div class="text-start mt-2 text-center fw-bold">
                                        <a href="{{ route('berita-artikel.detail', $item->slug) }}"
                                            class="tag-base tag-blue">
                                            <h5 class="card-title">{{ $item->judul }}</h5>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title">
                    <a href="{{ route('galeri-foto') }}" class="text-decoration-none text-dark">
                        <h2>Galeri Foto</h2>
                    </a>
                </div>
                <div class="row portfolio-container">
                    @foreach ($ct_foto->take(6) as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('img') }}/{{ $item->foto }}"
                                class="img-fluid portfolio-lightbox preview-link" alt=""
                                style="cursor: pointer;">
                            <div class="portfolio-info text-center">
                                <h4>{{ $item->nama }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>

        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title">
                    <a href="{{ route('galeri-video') }}" class="text-decoration-none text-dark">
                        <h2>Galeri Video</h2>
                    </a>
                </div>
                <div class="row portfolio-container">
                    @foreach ($ct_video->take(6) as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <iframe class="" height="225" width="96%" src="{{ $item->video }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <div class="text-center">
                                <strong>{{ $item->nama }}</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection
