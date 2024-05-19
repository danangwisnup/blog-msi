@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Berita / Artikel</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="text-end">
                        <a href="javascript:void(0)" class="btn btn-danger" onclick="confirmDeleteAll()">
                            <i class="bi bi-trash3"></i> Hapus Semua
                        </a>
                        <a href="<?= url('admin/berita-artikel/create') ?>" class="btn btn-success">
                            <i class="bi bi-plus-square-dotted"></i> Tambah baru
                        </a>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Berita / Artikel</h5>
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
                            <div class="row table-responsive">
                                <table class="table border table-striped table-bordered align-middle text-center"
                                    id="zero_config">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tagar</th>
                                            <th>Judul</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ct_beritaArtikel as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tagar }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('berita-artikel.show', $item->id) }}"
                                                        class="btn btn-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-danger"
                                                        onclick="confirmDelete({{ $item->id }})">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                    fetch('<?= url('admin/berita-artikel') ?>/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        }
                    }).then(response => response.json()).then(data => {
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
                    fetch('<?= url('admin/berita-artikel/destroy-all') ?>', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                        }
                    }).then(response => response.json()).then(data => {
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
