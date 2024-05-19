@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Profil</h1>
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
                            <br />
                            <form class="row g-3" method="post" action="{{ route('profil.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="logo" class="form-label fw-semibold mt-2">Logo<small
                                            class="text-danger">*</small></label>
                                    <div id="logo_preview" class="mb-3 text-center">
                                        <div class="mb-3 text-center">
                                            <img src="{{ url('img') }}/{{ $ct_profil->logo }}"
                                                class="img-fluid img-thumbnail" style="max-width: 200px" alt="Logo">
                                        </div>
                                    </div>
                                    <input type="file" class="form-control" id="logo" name="logo"
                                        accept="image/*">
                                </div>

                                <style>
                                    .image-wrapper {
                                        position: relative;
                                        width: 100%;
                                        /* Lebar kontainer sesuai keinginan */
                                        height: 265px;
                                        /* Tinggi kontainer sesuai keinginan */
                                        overflow: hidden;
                                        /* Memastikan bagian luar gambar dipotong */
                                        margin: 0 auto;
                                        /* Untuk memusatkan kontainer */
                                    }

                                    .image-wrapper img {
                                        position: absolute;
                                        top: 50%;
                                        left: 50%;
                                        width: auto;
                                        height: auto;
                                        transform: translate(-50%, -50%);
                                        min-height: 100%;
                                        min-width: 100%;
                                        object-fit: cover;
                                    }

                                    /* Media Query untuk perangkat mobile */
                                    @media (max-width: 767px) {
                                        .image-wrapper {
                                            height: 200px;
                                            /* Tinggi kontainer untuk perangkat mobile */
                                        }
                                    }

                                    /* Media Query untuk perangkat sangat kecil (seperti ponsel kecil) */
                                    @media (max-width: 480px) {
                                        .image-wrapper {
                                            height: 150px;
                                            /* Tinggi kontainer untuk perangkat sangat kecil */
                                        }
                                    }
                                </style>

                                <div class="col-12">
                                    <label for="foto_sampul" class="form-label fw-semibold mt-2">Foto Sampul<small
                                            class="text-danger">*</small></label>
                                    <div id="foto_sampul_preview" class="mb-3 text-center">
                                        <div class="image-wrapper">
                                            <img src="{{ url('img') }}/{{ $ct_profil->foto_sampul }}"
                                                class="img-fluid img-thumbnail" alt="Foto Main">
                                        </div>
                                    </div>
                                    <input type="file" class="form-control" id="foto_sampul" name="foto_sampul"
                                        accept="image/*">
                                </div>

                                <div class="col-12">
                                    <label for="foto_tentang" class="form-label fw-semibold mt-2">Foto Tentang<small
                                            class="text-danger">*</small></label>
                                    <div id="foto_tentang_preview" class="mb-3 text-center">
                                        <div class="mb-3 text-center">
                                            <img src="{{ url('img') }}/{{ $ct_profil->foto_tentang }}"
                                                class="img-fluid img-thumbnail" style="max-width: 200px" alt="Foto About">
                                        </div>
                                    </div>
                                    <input type="file" class="form-control" id="foto_tentang" name="foto_tentang"
                                        accept="image/*">
                                </div>

                                <div class="col-12">
                                    <label for="blog" class="form-label fw-semibold mt-2">Nama Blog<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="nama_blog" name="nama_blog"
                                        value="{{ $ct_profil->nama_blog }}" placeholder="Masukkan Nama Blog" required>
                                </div>
                                <div class="col-12">
                                    <label for="judul_header" class="form-label fw-semibold mt-2">Judul Header<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="judul_header" name="judul_header"
                                        value="{{ $ct_profil->judul_header }}" placeholder="Masukkan Judul Header" required>
                                </div>
                                <div class="col-12">
                                    <label for="judul_subheader" class="form-label fw-semibold mt-2">Judul Subheader<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="judul_subheader" name="judul_subheader"
                                        value="{{ $ct_profil->judul_subheader }}" placeholder="Masukkan Judul Subheader"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi" class="form-label fw-semibold mt-2">Deskripsi<small
                                            class="text-danger">*</small></label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ $ct_profil->deskripsi }}</textarea>
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

@section('scripts')
    <script>
        // jika ada file yang dipilih
        $('#logo').change(function() {
            // validate ukuran file
            if (this.files[0].size > 5 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran file terlalu besar! Maksimal 5 MB.'
                });
                this.value = '';
                $('#logo_preview').html(
                    '<div class="mb-3 text-center"><img src="{{ url('img') }}/{{ $ct_profil->logo }}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Logo"></div>'
                );
            }

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#logo_preview').html(
                    `<img src="${e.target.result}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Logo">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_logo">Hapus Logo</button>`);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#foto_sampul').change(function() {
            // validate ukuran file
            if (this.files[0].size > 5 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran file terlalu besar! Maksimal 5 MB.'
                });
                this.value = '';
                $('#foto_sampul_preview').html(
                    '<div class="image-wrapper"><img src="{{ url('img') }}/{{ $ct_profil->foto_sampul }}" class="img-fluid img-thumbnail" alt="Foto Main"></div>'
                );
            }

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#foto_sampul_preview').html(
                    `<div class="image-wrapper"><img src="${e.target.result}" class="img-fluid img-thumbnail" alt="Foto Main"></div>` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_foto_sampul">Hapus Foto</button>`
                );
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#foto_tentang').change(function() {
            // validate ukuran file
            if (this.files[0].size > 5 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran file terlalu besar! Maksimal 5 MB.'
                });
                this.value = '';
                $('#foto_tentang_preview').html(
                    '<div class="mb-3 text-center"><img src="{{ url('img') }}/{{ $ct_profil->foto_tentang }}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Foto About"></div>'
                );
            }

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#foto_tentang_preview').html(
                    `<img src="${e.target.result}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Foto About">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_foto_tentang">Hapus Foto</button>`
                );
            }
            reader.readAsDataURL(this.files[0]);
        });

        // jika tombol hapus logo diklik
        $(document).on('click', '#hapus_logo', function() {
            $('#logo').val('');
            $('#logo_preview').html(
                '<div class="mb-3 text-center"><img src="{{ url('img') }}/{{ $ct_profil->logo }}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Logo"></div>'
            );
        });

        $(document).on('click', '#hapus_foto_sampul', function() {
            $('#foto_sampul').val('');
            $('#foto_sampul_preview').html(
                '<div class="image-wrapper"><img src="{{ url('img') }}/{{ $ct_profil->foto_sampul }}" class="img-fluid img-thumbnail" alt="Foto Main"></div>'
            );
        });

        $(document).on('click', '#hapus_foto_tentang', function() {
            $('#foto_tentang').val('');
            $('#foto_tentang_preview').html(
                '<div class="mb-3 text-center"><img src="{{ url('img') }}/{{ $ct_profil->foto_tentang }}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Foto About"></div>'
            );
        });
    </script>
@endsection
