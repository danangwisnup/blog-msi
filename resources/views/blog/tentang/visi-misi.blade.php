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

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection
