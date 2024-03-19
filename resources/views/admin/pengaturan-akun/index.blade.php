@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Pengaturan Akun</h1>
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
                            <h5 class="card-title">Edit Akun</h5>
                            <form class="row g-3" method="post"
                                action="{{ route('pengaturan-akun.update', Auth::user()->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <label for="nama" class="form-label fw-semibold mt-2">Nama<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ Auth::user()->name }}" placeholder="Masukkan Nama">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label fw-semibold mt-2">Email<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ Auth::user()->email }}" placeholder="Masukkan Email">
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label fw-semibold mt-2">Password Baru</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan Password">
                                </div>
                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label fw-semibold mt-2">Konfirmasi
                                        Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Masukkan Konfirmasi Password">
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label fw-semibold mt-2">Password Lama<small
                                            class="text-danger">*</small></label>
                                    <input type="password" class="form-control" id="password_old" name="password_old"
                                        placeholder="Masukkan Password">
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
