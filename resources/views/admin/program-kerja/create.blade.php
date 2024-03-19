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
                            <h5 class="card-title">Buat Program Kerja</h5>
                            <form class="row g-3" method="post" action="{{ route('program-kerja.store') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="nama_program" class="form-label fw-semibold mt-2">Nama Program Kerja<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="nama_program" name="nama_program" value="@if (isset($programKerja)){{ $programKerja->nama_program }}@else{{ old('nama_program') }}@endif"
                                        placeholder="Masukkan Nama Program Kerja">
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi" class="form-label fw-semibold mt-2">Deskripsi<small
                                            class="text-danger">*</small></label>
                                    <textarea class="form-control tinymce-editor" id="deskripsi" name="deskripsi" rows="5"
                                        placeholder="Masukkan Deskripsi">@if (isset($programKerja)){{ $programKerja->deskripsi }}@else{{ old('deskripsi') }}@endif</textarea>
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
