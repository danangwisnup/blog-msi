@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Visi Misi</h1>
        </div>

        <section class="section">
            <form class="row g-3" method="post" action="">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <br />
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-12">
                                        <label for="gambar_visi" class="form-label fw-semibold mt-2">Visi</label>
                                        <div class="mb-3 text-center">
                                            <img src="<?= url('img/msi.png') ?>" alt="gambar_visi"
                                                class="img-fluid img-thumbnail" style="width: 100%;">
                                        </div>
                                        <input type="file" class="form-control" id="gambar_visi" name="gambar_visi"
                                            accept="image/*">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <textarea class="form-control" id="dekskripsi" name="dekskripsi" rows="5" placeholder="Masukkan Deskripsi"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">
                                        <label for="gambar_misi" class="form-label fw-semibold mt-2">Misi</label>
                                        <div class="mb-3 text-center">
                                            <img src="<?= url('img/msi.png') ?>" alt="gambar_misi"
                                                class="img-fluid img-thumbnail" style="width: 100%;">
                                        </div>
                                        <input type="file" class="form-control" id="gambar_misi" name="gambar_misi"
                                            accept="image/*">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <textarea class="form-control" id="dekskripsi" name="dekskripsi" rows="5" placeholder="Masukkan Deskripsi"></textarea>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>


        @include('layouts/admin/footer')

    </main><!-- End Main -->
@endsection
