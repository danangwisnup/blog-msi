@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Visi Misi</h1>
        </div>

        <section class="section">
            <div class="row">

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
                        <div class="row">
                            <form class="row g-3" method="post" action="{{ route('visi-misi.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="visi_gambar" class="form-label fw-semibold">Visi<small
                                            class="text-danger">*</small></label>
                                </div>
                                <div class="col-12 mt-3">
                                    <textarea class="form-control" id="visi_deskripsi" name="visi_deskripsi" rows="5"
                                        placeholder="Masukkan Deskripsi">{{ $ct_visiMisi->visi_deskripsi }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="misi_gambar" class="form-label fw-semibold mt-2">Misi<small
                                            class="text-danger">*</small></label>
                                </div>
                                <div class="col-12 mt-3">
                                    <textarea class="form-control" id="misi_deskripsi" name="misi_deskripsi" rows="5"
                                        placeholder="Masukkan Deskripsi">{{ $ct_visiMisi->misi_deskripsi }}</textarea>
                                </div>
                                <div class="mt-3">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
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
        // visi 
        $('#visi_gambar').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#visi_preview').html(
                    `<img src="${e.target.result}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Visi">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_visi">Hapus Visi</button>`);
            }
            reader.readAsDataURL(this.files[0]);
        });

        // jika tombol hapus visi diklik
        $(document).on('click', '#hapus_visi', function() {
            $('#visi_gambar').val('');
            $('#visi_preview').html(
                '<div class="mb-3 text-center"><img src="{{ url('img') }}/{{ $ct_visiMisi->visi_gambar }}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Visi"></div>'
            );
        });

        // misi
        $('#misi_gambar').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#misi_preview').html(
                    `<img src="${e.target.result}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Misi">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_misi">Hapus Misi</button>`);
            }
            reader.readAsDataURL(this.files[0]);
        });

        // jika tombol hapus misi diklik
        $(document).on('click', '#hapus_misi', function() {
            $('#misi_gambar').val('');
            $('#misi_preview').html(
                '<div class="mb-3 text-center"><img src="{{ url('img') }}/{{ $ct_visiMisi->misi_gambar }}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Misi"></div>'
            );
        });
    </script>
@endsection
