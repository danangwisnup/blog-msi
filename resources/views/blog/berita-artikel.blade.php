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

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog about-us">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">

                        @if ($ct_beritaArtikel->isEmpty() || is_null($beritaArtikel))
                            <article class="entry entry-single bg-white">
                                <h2 class="entry-title">
                                    <a href="javascript:void(0)">Berita atau artikel tidak ditemukan!</a>
                                </h2>
                            </article><!-- End blog entry -->
                        @elseif ($detail)
                            <article class="entry entry-single bg-white">
                                <div class="entry-img">
                                    <img src="{{ asset('img/' . $beritaArtikel->foto) }}" alt=""
                                        class="img-fluid w-100">
                                </div>
                                <h2 class="entry-title">
                                    <a href="javascript:void(0)">{{ $title }}</a>
                                </h2>
                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                            <a href="javascript:void(0)">
                                                Admin
                                            </a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                            <a href="javascript:void(0)">
                                                {{ $beritaArtikel->updated_at->format('d F Y') }}
                                            </a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                                            <a href="javascript:void(0)">
                                                0 Comments
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    {!! $beritaArtikel->isi !!}
                                </div>
                                <div class="entry-footer">
                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        @foreach (explode(',', $beritaArtikel->tagar) as $tag)
                                            <li>
                                                <a href="{{ route('berita-artikel', ['tag' => $tag]) }}">{{ trim($tag) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="row mt-5 fw-bold">
                                    <div class="col-lg-3">
                                        <span class="block font-bold">Bagikan ini:</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="header-social-links d-flex fs-6">
                                            <a href="http://www.facebook.com/sharer.php?u={{ urlencode(url()->current()) }}"
                                                target="_blank" rel="noopener"
                                                class="inline-flex items-center justify-center w-10 h-10 bg-facebook rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                                                <i class="bu bi-facebook text-xl"></i> Facebook
                                            </a>
                                            <a href="http://twitter.com/share?url={{ urlencode(url()->current()) }}"
                                                target="_blank" rel="noopener"
                                                class="inline-flex items-center justify-center w-10 h-10 bg-twitter rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                                                <i class="bu bi-twitter text-xl"></i> Twitter
                                            </a>
                                            <a href="https://telegram.me/share/url?url={{ urlencode(url()->current()) }}"
                                                target="_blank" rel="noopener"
                                                class="inline-flex items-center justify-center w-10 h-10 bg-telegram rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                                                <i class="bu bi-telegram text-xl"></i> Telegram
                                            </a>
                                            <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}"
                                                target="_blank" rel="noopener"
                                                class="inline-flex items-center justify-center w-10 h-10 bg-whatsapp rounded-full hover:ring-2 hover:ring-tertiary hover:ring-offset-2 transition duration-100">
                                                <i class="bu bi-whatsapp text-xl"></i> WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article><!-- End blog entry -->
                        @else
                            <div class="section-title">
                                <h2>{{ $title }}</h2>
                            </div>

                            <div class="blog-pagination mb-3">
                                {{ $beritaArtikel->render('pagination::bootstrap-5') }}
                            </div>

                            @foreach ($beritaArtikel as $item)
                                <article class="entry entry-single bg-white">
                                    <div class="entry-img">
                                        <img src="{{ asset('img/' . $item->foto) }}" alt=""
                                            class="img-fluid w-100">
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="{{ route('berita-artikel.detail', $item->slug) }}">
                                            {{ $item->judul }}
                                        </a>
                                    </h2>
                                    <div class="entry-meta">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                                <a href="javascript:void(0)">Admin</a>
                                            </li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                                <a href="javascript:void(0)">
                                                    {{ $item->updated_at->format('d F Y') }}
                                                </a>
                                            </li>
                                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                                                <a href="javascript:void(0)">
                                                    0 Comments
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry-content" id="entry-content">
                                        {!! $item->isi !!}
                                    </div>
                                    <div class="entry-footer">
                                        <i class="bi bi-tags"></i>
                                        <ul class="tags">
                                            @foreach (explode(',', $item->tagar) as $tag)
                                                <li>
                                                    <a href="{{ route('berita-artikel', ['tag' => $tag]) }}">
                                                        {{ trim($tag) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="read-more text-end">
                                        <a class="btn btn-outline-success"
                                            href="{{ route('berita-artikel.detail', $item->slug) }}">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </article><!-- End blog entry -->
                            @endforeach

                            <div class="blog-pagination mb-3">
                                {{ $beritaArtikel->render('pagination::bootstrap-5') }}
                            </div>
                        @endif

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar bg-white">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="{{ route('berita-artikel') }}" method="GET">
                                    <input type="text" name="search" value="{{ request()->query('search') }}"
                                        placeholder="Cari...">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Berita & Artikel Terbaru</h3>

                            <div class="sidebar-item recent-posts">
                                @foreach ($ct_beritaArtikel->slice(0, 10) as $item)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('img/' . $item->foto) }}" alt="">
                                        <h4>
                                            <a href="{{ route('berita-artikel.detail', $item->slug) }}">{{ $item->judul }}
                                            </a>
                                        </h4>
                                        <time datetime="{{ $item->updated_at->toIso8601String() }}">
                                            {{ $item->updated_at->format('d F Y') }}
                                        </time>
                                    </div>
                                @endforeach
                            </div><!-- End sidebar recent posts-->

                            <h3 class="sidebar-title">Tagar</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    @php
                                        $allTags = [];

                                        // Mengumpulkan semua tagar dari semua berita tanpa duplikat
                                        foreach ($ct_beritaArtikel as $berita) {
                                            $tags = explode(',', $berita->tagar);
                                            foreach ($tags as $tag) {
                                                if (!in_array($tag, $allTags)) {
                                                    $allTags[] = $tag;
                                                }
                                            }
                                        }

                                        // Hilangkan whitespace dari setiap elemen tagar
                                        $allTags = array_map('trim', $allTags);

                                        // Menghilangkan duplikat tagar dan mengurutkan secara alfabetis
                                        $allTags = array_unique($allTags);

                                        // urutkan isi array
                                        sort($allTags);
                                    @endphp

                                    <li>
                                        @foreach ($allTags as $tag)
                                            <a href="{{ route('berita-artikel', ['tag' => $tag]) }}">
                                                {{ $tag }}
                                            </a>
                                        @endforeach
                                    </li>

                                </ul>
                            </div><!-- End sidebar tags-->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->

    @include('layouts/blog/footer')
@endsection

@section('scripts')
    <script>
        // Get the content of the div
        let content = document.getElementById('entry-content').innerText;

        // Find the first sentence
        let firstSentence = content.match(/[^.!?]+[.!?]/)?.[0];

        // Display only the first sentence
        document.getElementById('entry-content').innerText = firstSentence || content;
    </script>
@endsection
