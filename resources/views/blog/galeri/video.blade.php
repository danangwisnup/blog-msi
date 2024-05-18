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
                    <a href="{{ route('galeri-video') }}" class="text-decoration-none text-dark">
                        <h2>Galeri Video</h2>
                    </a>
                </div>
                <div class="blog-pagination mb-3">
                    {{ $video->render('pagination::bootstrap-5') }}
                </div>
                <div class="row portfolio-container">
                    @foreach ($video as $item)
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
                <div class="blog-pagination mb-3">
                    {{ $video->render('pagination::bootstrap-5') }}
                </div>
        </section>

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection
