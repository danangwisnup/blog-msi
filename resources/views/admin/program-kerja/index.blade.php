@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Program Kerja</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="text-end">
                        <!-- open sweetalert -->
                        <a href="javascript:void(0)" class="btn btn-danger" onclick="confirmDeleteAll()">
                            <i class="bi bi-trash3"></i> Hapus Semua
                        </a>
                        <a href="<?= url('admin/program-kerja/create') ?>" class="btn btn-success">
                            <i class="bi bi-plus-square-dotted"></i> Tambah baru
                        </a>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Program Kerja</h5>
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
                                        <th>Nama Program Kerja</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Program Kerja 1</td>
                                        <td>Deskripsi Program Kerja 1</td>
                                        <td class="text-center">
                                            <a href="<?= url('admin/program-kerja/1/edit') ?>" class="btn btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-danger" onclick="confirmDelete(1)">
                                                <i class="bi bi-trash"></i>
                                            </a>
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

@section('scripts')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                icon: 'warning',
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                focusCancel: true,
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= url('admin/program-kerja') ?>/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        }
                    }).then(response => response.json()).then(data => {
                        console.log(data);
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.message,
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.message,
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    }).catch((error) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat menghapus data!',
                        }).then((result) => {
                            location.reload();
                        });
                    });
                }
            });
        }

        function confirmDeleteAll() {
            Swal.fire({
                icon: 'warning',
                title: 'Apakah Anda yakin ingin menghapus semua data ini?',
                focusCancel: true,
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus semua!',
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('<?= url('admin/program-kerja/destroy-all') ?>', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        }
                    }).then(response => response.json()).then(data => {
                        console.log(data);
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.message,
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.message,
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    }).catch((error) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat menghapus data!',
                        }).then((result) => {
                            location.reload();
                        });
                    });
                }
            });
        }
    </script>
@endsection
