<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel {{ isset($title) ? '- ' . $title : '' }}</title>

    <!-- Favicons -->
    <link href="{{ url('assets/admin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('assets/admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('assets/admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('assets/admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/admin/assets/vendor/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/2.0.1/css/dataTables.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/admin/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('assets/admin/assets/vendor/sweetalert/sweetalert2.min.js') }}"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script src="{{ url('assets/admin/assets/vendor/datatables/dataTables-init.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/admin/assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        new Tagify(document.querySelector('#tagar'), {

        });
    </script>

    @yield('scripts')

    <!-- Konfigurasi SweetAlert -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

    <!-- Konfigurasi Modal -->
    @if (session('modal'))
        <script>
            $(document).ready(function() {
                $('#{{ session('modal') }}').modal('show');
            });
        </script>
    @endif

    <script>
        // jika melakukan submit maka disable semua tombol submit
        $('form').submit(function() {
            $(this).find('button').prop('disabled', true);
        });
    </script>
</body>

</html>
