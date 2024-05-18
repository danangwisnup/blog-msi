@extends('layouts/admin/main')
@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Masuk ke Admin Panel</h5>
                                    <p class="text-center small">
                                        Masukkan email dan kata sandi dibawah ini untuk melanjutkan.
                                    </p>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form class="row g-3 needs-validation" method="POST" action="{{ route('auth_login') }}"
                                    novalidate>
                                    @csrf
                                    <div class="col-12 mb-3">
                                        <label for="email" class="form-label">Email<small
                                                class="text-danger">*</small></label>
                                        <input type="email" class="form-control" name="email" id="email" autofocus required>
                                        <div class="invalid-feedback">Silahkan masukkan email anda!</div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="password" class="form-label">Kata Sandi<small
                                                class="text-danger">*</small></label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                        <div class="invalid-feedback">Silahkan masukkan kata sandi anda!</div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <button class="btn btn-primary w-100" type="submit">Masuk</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        @include('layouts/admin/footer')

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
