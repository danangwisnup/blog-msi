@extends('layouts/admin/main')
@section('content')
    @include('layouts/admin/header')
    @include('layouts/admin/sider')

    <main id="main" class="main">

        <div class="pagetitle mt-4 mb-4">
            <h1>Profil</h1>
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
                            <form class="row g-3" method="post" action="{{ route('profil.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="logo" class="form-label fw-semibold mt-2">Logo</label>
                                    <div id="logo_preview" class="mb-3 text-center">
                                        <div class="mb-3 text-center">
                                            <img src="{{ url('img') }}/{{ $ct_profil->logo }}"
                                                class="img-fluid img-thumbnail" style="max-width: 200px" alt="Logo">
                                        </div>
                                    </div>
                                    <input type="file" class="form-control" id="logo" name="logo"
                                        accept="image/*">
                                </div>
                                <div class="col-12">
                                    <label for="blog" class="form-label fw-semibold mt-2">Nama Blog</label>
                                    <input type="text" class="form-control" id="nama_blog" name="nama_blog"
                                        value="{{ $ct_profil->nama_blog }}" placeholder="Masukkan Nama Blog" required>
                                </div>
                                <div class="col-12">
                                    <label for="judul_header" class="form-label fw-semibold mt-2">Judul Header</label>
                                    <input type="text" class="form-control" id="judul_header" name="judul_header"
                                        value="{{ $ct_profil->judul_header }}" placeholder="Masukkan Judul Header" required>
                                </div>
                                <div class="col-12">
                                    <label for="judul_subheader" class="form-label fw-semibold mt-2">Judul Subheader</label>
                                    <input type="text" class="form-control" id="judul_subheader" name="judul_subheader"
                                        value="{{ $ct_profil->judul_subheader }}" placeholder="Masukkan Judul Subheader"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi" class="form-label fw-semibold mt-2">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi">{{ $ct_profil->deskripsi }}</textarea>
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
        $('#logo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#logo_preview').html(
                    `<img src="${e.target.result}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Logo">` +
                    `<button type="button" class="btn btn-danger ms-2" id="hapus_logo">Hapus Logo</button>`);
            }
            reader.readAsDataURL(this.files[0]);
        });

        // jika tombol hapus logo diklik
        $(document).on('click', '#hapus_logo', function() {
            $('#logo').val('');
            $('#logo_preview').html(
                '<div class="mb-3 text-center"><img src="{{ url('img') }}/{{ $ct_profil->logo }}" class="img-fluid img-thumbnail" style="max-width: 200px" alt="Logo"></div>'
            );
        });
    </script>
@endsection
