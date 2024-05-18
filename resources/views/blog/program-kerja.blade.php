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
                    <h2>Pogram Kerja</h2>
                </div>

                @foreach ($ct_programKerja as $item)
                    <div class="row skills-content">
                        <div class="col-lg-3">
                            <strong>{{ $loop->iteration }}. {{ $item->nama_program }}</strong>
                            <img src="{{ url('img/program-kerja') }}/{{ $item->gambar }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-9">
                            {!! $item->deskripsi !!}
                        </div>
                        <br />
                    </div>
                @endforeach


            </div>
        </section><!-- End Our Skills Section -->

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection
