@extends('layouts/blog/main')
@section('content')
    @include('layouts/blog/header')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $title }}</h2>
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li>{{ $title }}</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= About us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2>{{ $ct_profil->nama_blog }}</h2>
                        <div class="row">
                            <p class="text-muted">{!! $ct_profil->deskripsi !!}</p>
                        </div>
                        <p class="text-justify">{{ $ct_kontak->alamat_kantor }}</p>
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

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection
