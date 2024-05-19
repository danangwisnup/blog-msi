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
                                    <h5 class="card-title">Total Staff Pengurus</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people fs-1 text-primary"></i>
                                        </div>
                                        <div class="ms-auto">
                                            <h3>{{ count($ct_strukturOrganisasi) }}
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
                                            <h3>{{ count($ct_beritaArtikel) }}</h3>
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

                                    <div class="row table-responsive">
                                        <table class="table table-hover table-bordered align-middle text-center"
                                            id="zero_config">
                                            <thead>
                                                <tr>
                                                    <th>Waktu</th>
                                                    <th>Pengguna</th>
                                                    <th>Modul</th>
                                                    <th>Aktivitas</th>
                                                </tr>
                                            </thead>
                                            <tbody style="cursor: pointer;">
                                                @foreach ($ct_riwayatAktivitas as $item)
                                                    <tr onclick="riwayatAktivitas({{ $item->id }})">
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->user->name }}</td>
                                                        <td>{{ $item->modul }}</td>
                                                        <td>{{ $item->aktivitas }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Reports -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

        <div class="modal fade modal-xl" id="riwayat_aktivitas" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Riwayat Aktivitas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="riwayat-aktivitas-content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div><!-- End Vertically centered Modal-->


        @include('layouts/admin/footer')

    </main><!-- End Main -->
@endsection

@section('scripts')
    <script>
        $('#zero_config').DataTable({
            "order": [
                [0, "desc"]
            ]
        });

        // function riwayatAktivitas(id) {
        //     $.ajax({
        //         url: "{{ url('admin/riwayat-aktivitas') }}/" + id,
        //         type: 'GET',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(response) {
        //             let data = JSON.parse(response.data);

        //             let dataSebelum = data.sebelum;
        //             let dataSesudah = data.sesudah;

        //             let html = '<div class="row">';

        //             html += '<div class="col-md-6">';
        //             // Periksa apakah dataSebelum adalah objek
        //             if (typeof dataSebelum === 'object' && dataSebelum !== null) {
        //                 for (const key in dataSebelum) {
        //                     if (Object.hasOwnProperty.call(dataSebelum, key)) {
        //                         const element = dataSebelum[key];
        //                         html += '<h5 class="card-title">' + key + '</h5>';
        //                         html += '<div class="card">';
        //                         html += '<div class="card-body">';
        //                         html += '<pre>' + element + '</pre>';
        //                         html += '</div>';
        //                         html += '</div>';
        //                         html += '</div>';
        //                     }
        //                 }
        //             }

        //             html += '</div>';

        //             // Periksa apakah dataSesudah adalah objek
        //             if (typeof dataSesudah === 'object' && dataSesudah !== null) {
        //                 for (const key in dataSesudah) {
        //                     if (Object.hasOwnProperty.call(dataSesudah, key)) {
        //                         const element = dataSesudah[key];
        //                         html += '<div class="col-md-6">';
        //                         html += '<h5 class="card-title">' + key + '</h5>';
        //                         html += '<div class="card">';
        //                         html += '<div class="card-body">';
        //                         html += '<pre>' + element + '</pre>';
        //                         html += '</div>';
        //                         html += '</div>';
        //                         html += '</div>';
        //                     }
        //                 }
        //             }

        //             html += '</div>';

        //             $('#riwayat-aktivitas-content').html(html);

        //             $('#riwayat_aktivitas').modal('show');

        //         },
        //         error: function(response) {
        //             console.log(response);
        //         },
        //     });
        // }
    </script>
@endsection
