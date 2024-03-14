@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Beranda</h1>
        </div>

        <section class="section">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Pengguna Card -->
                        <div class="col-md-6">
                            <div class="card p-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pengurus</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people fs-1 text-primary"></i>
                                        </div>
                                        <div class="ms-auto">
                                            <h3>145</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Pengguna Card -->

                        <!-- Artikel / Berita Card -->
                        <div class="col-md-6">
                            <div class="card p-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Artikel / Berita</h5>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-newspaper fs-1 text-danger"></i>
                                        <div class="ms-auto">
                                            <h3>145</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Artikel / Berita Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Aktivitas</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="search-table"
                                            placeholder="Cari data...">
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
                                    <table class="table border table-striped table-bordered align-middle"
                                        id="zero_config">
                                        <thead>
                                            <!-- posisi center -->
                                            <tr class="text-center">
                                                <th>Waktu</th>
                                                <th>Pengguna</th>
                                                <th>Aktivitas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2024-10-01 14:03:20</td>
                                                <td>Admin</td>
                                                <td>Menambahkan pengurus baru “Setnov (Staff Program SSR)”</td>
                                            </tr>
                                            <tr>
                                                <td>2024-12-01 12:02:00</td>
                                                <td>Admin</td>
                                                <td>Menambahkan artikel / berita berjudul “Sosialiasasi Pentingnya Menjaga
                                                    Kesehatan oleh Puskesmas Tembalang”</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Reports -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>


        @include('layouts/admin/footer')

    </main><!-- End Main -->
@endsection
