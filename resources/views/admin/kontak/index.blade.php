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
                                    <label for="email" class="form-label fw-semibold mt-2">E-mail<small
                                            class="text-danger">*</small></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->email }}@else{{ old('email') }} @endif"
                                        placeholder="Masukkan E-mail">
                                </div>
                                <div class="col-12">
                                    <label for="ig" class="form-label fw-semibold mt-2">Instagram<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="ig" name="ig"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->ig }}@else{{ old('ig') }} @endif"
                                        placeholder="Masukkan Instagram">
                                </div>
                                <div class="col-12">
                                    <label for="wa" class="form-label fw-semibold mt-2">Whatsapp<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="wa" name="wa"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->wa }}@else{{ old('wa') }} @endif"
                                        placeholder="Masukkan Whatsapp">
                                </div>
                                <div class="col-12">
                                    <label for="alamat_kantor" class="form-label fw-semibold mt-2">Alamat Kantor<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->alamat_kantor }}@else{{ old('alamat_kantor') }} @endif"
                                        placeholder="Masukkan Alamat Kantor">
                                </div>
                                <div class="col-12">
                                    <label for="google_maps" class="form-label fw-semibold mt-2">Google Maps<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="google_maps" name="google_maps"
                                        value="@if (isset($ct_kontak)) {{ $ct_kontak->google_maps }}@else{{ old('google_maps') }} @endif"
                                        placeholder="Masukkan Google Maps">
                                    <div class="alert border-danger alert-dismissible fade show mt-3" role="alert">
                                        <small class="text-danger strong fw-bold">
                                            Contoh Link Google Maps:<br>
                                            <ol>
                                                <li>https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.6641571315276!2d110.85499687483444!3d-6.810642693186935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c52e32971c13%3A0xf419b5d16b1fc8af!2sSSR%20MENTARI%20SEHAT%20INDONESIA%20KUDUS!5e0!3m2!1sid!2sid!4v1715926009626!5m2!1sid!2sid
                                                </li>
                                                <li>
                                                    &lt;iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.6641571315276!2d110.85499687483444!3d-6.810642693186935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c52e32971c13%3A0xf419b5d16b1fc8af!2sSSR%20MENTARI%20SEHAT%20INDONESIA%20KUDUS!5e0!3m2!1sid!2sid!4v1715926009626!5m2!1sid!2sid"
                                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                                    loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"&gt;&lt;/iframe&gt;
                                                </li>
                                            </ol>
                                            Petunjuk:<br>
                                            <ol>
                                                <li>Buka Google Maps di browser</li>
                                                <li>Cari alamat kantor</li>
                                                <li>Klik bagian kanan atas (titik tiga)</li>
                                                <li>Pilih Bagikan atau embed peta (Sematkan Peta)</li>
                                                <li>Pilih Salin HTML</li>
                                                <li>Paste di sini</li>
                                            </ol>
                                        </small>
                                    </div>
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
