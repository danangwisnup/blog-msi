@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <div class="text-start">
                <a href="<?= previous_url() ?>" class="btn btn-dark">
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
                            <h5 class="card-title">Buat Staff Pengurus</h5>
                            <form class="row g-3" method="post" action="{{ route('struktur-organisasi.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"
                                    value="{{ isset($strukturOrganisasi) ? $strukturOrganisasi->id : '' }}">
                                <div class="col-12">
                                    <label for="urutan" class="form-label fw-semibold mt-2">Urutan<small
                                            class="text-danger">*</small></label>
                                    <input type="number" class="form-control" id="urutan" name="urutan"
                                        value="{{ isset($strukturOrganisasi) ? $strukturOrganisasi->urutan : old('urutan') }}"
                                        placeholder="Masukkan Urutan">
                                </div>
                                <div class="col-12">
                                    <label for="foto" class="form-label fw-semibold mt-2">Foto<small
                                            class="text-danger">*</small></label>
                                    <div id="foto_preview" class="mb-3 text-center">
                                        <div class="mb-3 text-center">
                                            <img src="{{ url('img/struktur-organisasi/') }}/{{ isset($strukturOrganisasi) ? $strukturOrganisasi->foto : 'no-image.png' }}"
                                                class="img-fluid img-thumbnail" style="max-width: 200px"
                                                alt="foto-staf-pengurus">
                                        </div>
                                    </div>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        accept="image/*">
                                    <small class="text-danger">* Ukuran foto 3x4</small>
                                </div>
                                <div class="col-12">
                                    <label for="nama" class="form-label fw-semibold mt-2">Nama<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ isset($strukturOrganisasi) ? $strukturOrganisasi->nama : old('nama') }}"
                                        placeholder="Masukkan Nama">
                                </div>
                                <div class="col-12">
                                    <label for="jabatan" class="form-label fw-semibold mt-2">Jabatan<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control text-capitalize" id="jabatan" name="jabatan"
                                        value="{{ isset($strukturOrganisasi) ? $strukturOrganisasi->jabatan : old('jabatan') }}"
                                        placeholder="Masukkan Jabatan">
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

@section('scripts')
    <script>
        // jika ada file yang dipilih
        $('#foto').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#foto_preview').html(
                    `<img src="${e.target.result}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="foto">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_foto">Hapus foto</button>`);
            }
            reader.readAsDataURL(this.files[0]);
        });

        // jika tombol hapus foto diklik
        $(document).on('click', '#hapus_foto', function() {
            $('#foto').val('');
            $('#foto_preview').html(
                `<div class="mb-3 text-center">
                    <img src="{{ url('img') }}/@if (isset($strukturOrganisasi)) staf-pengurus/{{ $strukturOrganisasi->foto }} @else no-image.png @endif" class="img-fluid img-thumbnail" style="max-width: 200px" alt="foto-staf-pengurus">
                </div>`
            );
        });
    </script>
@endsection
