@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <div class="text-start">
                <a href="<?= url('admin/program-kerja') ?>" class="btn btn-dark">
                    <i class="bi bi-box-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Buat Program Kerja</h5>
                            <form class="row g-3" method="post" action="">
                                <div class="col-12">
                                    <label for="tag" class="form-label fw-semibold mt-2">Tagar</label>
                                    <input type="text" class="form-control" id="tag" name="tag"
                                        placeholder="Masukkan Tagar">
                                </div>
                                <div class="col-12">
                                    <label for="judul" class="form-label fw-semibold mt-2">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Masukkan Judul">
                                </div>
                                <div class="col-12">
                                    <label for="dekskripsi" class="form-label fw-semibold mt-2">Deskripsi</label>
                                    <textarea class="form-control tinymce-editor" id="dekskripsi" name="dekskripsi" rows="5"
                                        placeholder="Masukkan Deskripsi"></textarea>
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
