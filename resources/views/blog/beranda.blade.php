@extends('layouts/blog/main')
@section('content')
    @include('layouts/blog/header')
    <center id="beranda">
        <section id="hero" style="align-items: center; justify-content: center;">
            <div id="heroCarousel" data-bs-interval="5000" class="mt-3 carousel slide carousel-fade" data-bs-ride="carousel">
                <style>
                    .carousel-item {
                        position: relative;
                        height: 100%;
                        overflow: hidden;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    @media (min-width: 1024px) {
                        .carousel-item img {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            width: 100%;
                            height: auto;
                            transform: translate(-50%, -50%);
                            min-height: 100%;
                            min-width: 100%;
                        }
                    }

                    @media (max-width: 1000px) {
                        .carousel-item img {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            width: 100%;
                            height: 80%;
                            transform: translate(-50%, -50%);
                            min-height: 100%;
                            min-width: 100%;
                        }
                    }
                </style>
                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active mt-5">
                        <img src="img/{{ $ct_profil->foto_sampul }}" alt="Foto Sampul">
                        <div class="carousel-container">
                            <div class="carousel-content animate__animated animate__fadeInUp">
                                <h2 class="text-center text-uppercase">Selamat Datang di Website Resmi</h2>
                                <h3 class="text-center text-uppercase text-success">
                                    {{ $ct_profil->nama_blog }}
                                </h3>
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
                                class="img-fluid portfolio-lightbox preview-link" alt="" style="cursor: pointer;">
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
