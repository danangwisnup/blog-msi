@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <div class="text-start">
                <a href="<?= url('admin/berita-artikel') ?>" class="btn btn-dark">
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
                            <h5 class="card-title">Buat Berita / Artikel</h5>
                            <form class="row g-3" method="post" action="{{ route('berita-artikel.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"
                                    value="@if (isset($beritaArtikel)) {{ $beritaArtikel->id }} @endif">
                                <div class="col-12">
                                    <label for="tanggal" class="form-label fw-semibold mt-2">Tanggal<small
                                            class="text-danger">*</small></label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ isset($beritaArtikel->updated_at) ? date('Y-m-d', strtotime($beritaArtikel->updated_at)) : date('Y-m-d') }}"
                                        required>
                                </div>

                                <div class="col-12">
                                    <label for="foto" class="form-label fw-semibold mt-2">
                                        Foto Thumbnail
                                    </label>
                                    <select class="form-select" id="foto_pilih" name="foto_pilih">
                                        <option value="">Pilih foto</option>
                                        @foreach ($ct_foto as $foto)
                                            <option value="{{ $foto->foto }}">{{ $foto->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-center mt-1 mb-1">Atau</div>
                                    <input type="file" class="form-control" id="foto_upload" name="foto_upload"
                                        accept="image/*">

                                    <div class="text-center" id="foto_preview">
                                        @if (isset($beritaArtikel))
                                            <img src="{{ asset('img/' . $beritaArtikel->foto) }}" alt="Foto Thumbnail"
                                                class="img-thumbnail mt-2" width="450">
                                        @endif
                                    </div>
                                    <small class="text-danger">
                                        * Gunakan foto landscape dengan ukuran 16:9, agar tampilan lebih baik
                                    </small>
                                </div>

                                <div class="col-12">
                                    <label for="tag" class="form-label fw-semibold mt-2">Tagar<small
                                            class="text-danger">*</small></label>
                                    <input type="tagar" class="form-control text-capitalize" id="tagar" name="tagar"
                                        value="{{ $beritaArtikel->tagar ?? old('tagar') }}" placeholder="Masukkan Tagar">
                                </div>
                                <div class="col-12">
                                    <label for="judul" class="form-label fw-semibold mt-2">Judul<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control text-capitalize" id="judul" name="judul"
                                        value="{{ $beritaArtikel->judul ?? old('judul') }}" placeholder="Masukkan Judul">
                                </div>
                                <div class="col-12">
                                    <label for="isi" class="form-label fw-semibold mt-2">Isi<small
                                            class="text-danger">*</small></label>
                                    <textarea class="form-control tinymce-editor" id="isi" name="isi" rows="5"
                                        placeholder="Masukkan Deskripsi">{{ $beritaArtikel->isi ?? old('isi') }}</textarea>
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
        $('#foto_pilih').change(function() {
            // hapus foto_upload
            $('#foto_upload').val('');

            // tampilkan foto yang dipilih
            if ($(this).val() != '') {
                $('#foto_preview').html(
                    `<div class="mt-2 mb-3 text-center">` +
                    `<img src="{{ asset('img') }}/${$(this).find(':selected').val()}" class="img-fluid img-thumbnail" class="img-fluid img-thumbnail" width="450">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_foto">Hapus foto</button>` +
                    `</div>`);
            } else {
                $('#foto_preview').html('');
            }
        });

        $('#foto_upload').change(function() {
            // hapus foto_pilih
            $('#foto_pilih').val('');

            // validasi ukuran file 10 MB
            if (this.files[0].size > 1024 * 1024 * 10) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran file tidak boleh lebih dari 10 MB!',
                });
                this.value = '';
            }

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#foto_preview').html(
                    `<div class="mt-2 mb-3 text-center">` +
                    `<img src="${e.target.result}" class="img-fluid img-thumbnail" class="img-fluid img-thumbnail" width="450">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_foto">Hapus foto</button>` +
                    `</div>`);

            }
            reader.readAsDataURL(this.files[0]);
        });

        // jika tombol hapus foto diklik
        $(document).on('click', '#hapus_foto', function() {
            $('#foto_pilih').val('');
            $('#foto_upload').val('');
            <?php if (isset($beritaArtikel)) : ?>
            $('#foto_preview').html(
                '<div class="mt-2 mb-3 text-center"><img src="{{ asset('img') }}/{{ $beritaArtikel->foto }}" class="img-fluid img-thumbnail" width="450"></div>'
            );
            <?php else : ?>
            $('#foto_preview').html('');
            <?php endif; ?>
        });
    </script>
@endsection
