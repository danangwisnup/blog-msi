@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Artikel / Berita</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="text-end">
                        <a href="<?= url('admin/artikel/create') ?>" class="btn btn-danger">
                            <i class="bi bi-trash3"></i> Hapus Semua
                        </a>
                        <a href="<?= url('admin/artikel/create') ?>" class="btn btn-success">
                            <i class="bi bi-plus-square-dotted"></i> Tambah baru
                        </a>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Artikel / Berita</h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="search-table" placeholder="Cari data...">
                            </div>
                            <div class="mb-3 col-md-3 col-sm-3">
                                <select class="form-select" id="length-table">
                                    <option value="1">1</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <table class="table border table-striped table-bordered align-middle" id="zero_config">
                                <thead>
                                    <!-- posisi center -->
                                    <tr class="text-center">
                                        <th>Tagar</th>
                                        <th>Judul</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#tagar1</td>
                                        <td>Judul Artikel 1</td>
                                        <td class="text-center">
                                            <a href="<?= url('admin/program-kerja/1/edit') ?>" class="btn btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="<?= url('admin/program-kerja/1') ?>" method="post"
                                                class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @include('layouts/admin/footer')

    </main><!-- End Main -->
@endsection
