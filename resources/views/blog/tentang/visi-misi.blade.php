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

        <!-- ======= Our Skills Section ======= -->
        <section id="skills" class="skills">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Visi & Misi</h2>
                </div>

                <div class="row skills-content">

                    <div> <strong>Visi</strong> </div>
                    <div class="col-lg-3">
                        <img src="{{ url('img/visi-misi') }}/{{ $ct_visiMisi->visi_gambar }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-lg-9">
                        {{ strip_tags($ct_visiMisi->visi_deskripsi) }}
                    </div>

                    <div> <strong>Misi</strong> </div>
                    <div class="col-lg-3">
                        <img src="{{ url('img/visi-misi') }}/{{ $ct_visiMisi->misi_gambar }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-lg-9">
                        {!! $ct_visiMisi->misi_deskripsi !!}
                    </div>

                </div>

            </div>
        </section><!-- End Our Skills Section -->

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection
