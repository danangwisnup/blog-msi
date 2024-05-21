@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <div class="text-start">
                <a href="<?= previous_url() ?>" class="btn btn-dark">
                    <i class="bi bi-box-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Buat {{ $title }}</h5>
                            <form class="row g-3" method="post" action="{{ route('video.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"
                                    value="@if (isset($video)) {{ $video->id }}@else{{ old('id') }} @endif">

                                <div class="col-12">
                                    <label for="nama" class="form-label fw-semibold mt-2">Nama<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $video->nama ?? old('nama') }}" placeholder="Masukkan Nama">
                                </div>

                                <div class="col-12">
                                    <label for="video" class="form-label fw-semibold mt-2">Video
                                    </label>
                                    <input type="text" class="form-control" id="video" name="video"
                                        value="{{ $video->video ?? old('video') }}" placeholder="Masukkan Link Video">
                                    <div class="alert border-danger alert-dismissible fade show mt-3" role="alert">
                                        <small class="text-danger strong fw-bold">
                                            Contoh Link Video:<br>
                                            <ol>
                                                <li>https://www.youtube.com/watch?v=xxxxxxxxxxx</li>
                                                <li>https://www.youtube.com/embed/xxxxxxxxxxx</li>
                                                <li>https://youtu.be/xxxxxxxxxxx</li>
                                                <li>
                                                    &lt;iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/xxxxxxxxxxx"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen&gt;&lt;/iframe&gt;
                                                </li>
                                            </ol>
                                        </small>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="deskripsi" class="form-label fw-semibold mt-2">Deskripsi<small
                                            class="text-danger">*</small></label>
                                    <textarea class="form-control tinymce-editor" id="deskripsi" name="deskripsi" rows="5"
                                        placeholder="Masukkan Deskripsi">{{ $video->deskripsi ?? old('deskripsi') }}</textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts/admin/footer')

    </main><!-- End Main -->

@endsection
