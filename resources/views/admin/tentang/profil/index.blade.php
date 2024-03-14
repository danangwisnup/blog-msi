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
                    <div class="card">
                        <div class="card-body">
                            <br />
                            <form class="row g-3" method="post" action="">
                                <div class="col-12">
                                    <label for="logo" class="form-label fw-semibold mt-2">Logo</label>
                                    <div class="mb-3 text-center">
                                        <img src="<?= url('img/msi.png') ?>" alt="Logo" class="img-fluid img-thumbnail"
                                            style="width: 300px;">
                                    </div>
                                    <input type="file" class="form-control" id="logo" name="logo"
                                        accept="image/*">
                                </div>
                                <div class="col-12">
                                    <label for="blog" class="form-label fw-semibold mt-2">Nama Blog</label>
                                    <input type="text" class="form-control" id="blog" name="blog"
                                        placeholder="Masukkan Nama Blog">
                                </div>
                                <div class="col-12">
                                    <label for="judul_header" class="form-label fw-semibold mt-2">Judul Header</label>
                                    <input type="text" class="form-control" id="judul_header" name="judul_header"
                                        placeholder="Masukkan Judul Header">
                                </div>
                                <div class="col-12">
                                    <label for="judul_subheader" class="form-label fw-semibold mt-2">Judul Subheader</label>
                                    <input type="text" class="form-control" id="judul_subheader" name="judul_subheader"
                                        placeholder="Masukkan Judul Subheader">
                                </div>
                                <div class="col-12">
                                    <label for="dekskripsi" class="form-label fw-semibold mt-2">Deskripsi</label>
                                    <textarea class="form-control" id="dekskripsi" name="dekskripsi" rows="5" placeholder="Masukkan Deskripsi"></textarea>
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
