@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Kontak</h1>
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
                            <br />
                            <form class="row g-3" method="post" action="{{ route('kontak.store') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="email" class="form-label fw-semibold mt-2">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->email }}@else{{ old('email') }} @endif"
                                        placeholder="Masukkan E-mail">
                                </div>
                                <div class="col-12">
                                    <label for="ig" class="form-label fw-semibold mt-2">Instagram</label>
                                    <input type="text" class="form-control" id="ig" name="ig"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->ig }}@else{{ old('ig') }} @endif"
                                        placeholder="Masukkan Instagram">
                                </div>
                                <div class="col-12">
                                    <label for="wa" class="form-label fw-semibold mt-2">Whatsapp</label>
                                    <input type="text" class="form-control" id="wa" name="wa"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->wa }}@else{{ old('wa') }} @endif"
                                        placeholder="Masukkan Whatsapp">
                                </div>
                                <div class="col-12">
                                    <label for="alamat_kantor" class="form-label fw-semibold mt-2">Alamat Kantor</label>
                                    <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->alamat_kantor }}@else{{ old('alamat_kantor') }} @endif"
                                        placeholder="Masukkan Alamat Kantor">
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
