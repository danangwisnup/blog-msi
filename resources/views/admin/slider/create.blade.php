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
                            <h5 class="card-title">Buat {{ $title }}</h5>
                            <form class="row g-3" method="post" action="{{ route('slider.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"
                                    value="@if (isset($slider)) {{ $slider->id }}@else{{ old('id') }} @endif">

                                <div class="col-12">
                                    <label for="urutan" class="form-label fw-semibold mt-2">Urutan<small
                                            class="text-danger">*</small></label>
                                    <input type="number" class="form-control" id="urutan" name="urutan"
                                        value="{{ $slider->urutan ?? old('urutan') }}" placeholder="Masukkan Urutan">
                                </div>

                                <div class="col-12">
                                    <label for="judul" class="form-label fw-semibold mt-2">Judul<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $slider->judul ?? old('judul') }}" placeholder="Masukkan Judul">
                                </div>

                                <div class="col-12">
                                    <label for="deskripsi" class="form-label fw-semibold mt-2">Deskripsi<small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                        value="{{ $slider->deskripsi ?? old('deskripsi') }}"
                                        placeholder="Masukkan Deskripsi">
                                </div>


                                <div class="col-12">
                                    <label for="foto" class="form-label fw-semibold mt-2">Foto<small
                                            class="text-danger">*</small></label>
                                    <div id="foto_preview" class="mb-3 text-center">
                                        @if (isset($slider))
                                            <div class="mb-3 text-center">
                                                <img src="{{ asset('img/slider') }}/{{ $slider->foto }}"
                                                    class="img-fluid img-thumbnail" style="max-width: 450px" alt="foto">
                                            </div>
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        accept="image/*">
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
            $('#foto').val('');
            <?php if (isset($slider)) : ?>
            $('#foto_preview').html(
                '<div class="mt-2 mb-3 text-center"><img src="{{ asset('img/slider') }}/{{ $slider->foto }}" class="img-fluid img-thumbnail" width="450"></div>'
            );
            <?php else : ?>
            $('#foto_preview').html('');
            <?php endif; ?>
        });
    </script>
@endsection
