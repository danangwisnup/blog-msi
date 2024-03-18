@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <div class="text-start">
                <a href="<?= url('admin/berita-artikel') ?>" class="btn btn-dark">
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
                            <h5 class="card-title">Buat Berita / Artikel</h5>
                            <form class="row g-3" method="post" action="{{ route('berita-artikel.store') }}">
                                @csrf
                                <input type="hidden" name="id" value="@if (isset($beritaArtikel)){{ $beritaArtikel->id }}@endif">
                                <div class="col-12">
                                    <label for="tag" class="form-label fw-semibold mt-2">Tagar</label>
                                    <input type="tagar" class="form-control" id="tagar" name="tagar"
                                        value="{{ $beritaArtikel->tagar ?? old('tagar') }}" placeholder="Masukkan Tagar">
                                </div>
                                <div class="col-12">
                                    <label for="judul" class="form-label fw-semibold mt-2">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $beritaArtikel->judul ?? old('judul') }}" placeholder="Masukkan Judul">
                                </div>
                                <div class="col-12">
                                    <label for="isi" class="form-label fw-semibold mt-2">Isi</label>
                                    <textarea class="form-control tinymce-editor" id="isi" name="isi" rows="5"
                                        placeholder="Masukkan Deskripsi">{{ $beritaArtikel->isi ?? old('isi') }}</textarea>
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
