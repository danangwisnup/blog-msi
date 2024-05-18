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

        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title">
                    <a href="{{ route('galeri-foto') }}" class="text-decoration-none text-dark">
                        <h2>Galeri Foto</h2>
                    </a>
                </div>
                <div class="blog-pagination mb-3">
                    {{ $foto->render('pagination::bootstrap-5') }}
                </div>
                <div class="row portfolio-container">
                    @foreach ($foto as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('img') }}/{{ $item->foto }}"
                                class="img-fluid portfolio-lightbox preview-link" alt="" style="cursor: pointer;">
                            <div class="portfolio-info text-center">
                                <h4>{{ $item->nama }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="blog-pagination mb-3">
                    {{ $foto->render('pagination::bootstrap-5') }}
                </div>
        </section>

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection
