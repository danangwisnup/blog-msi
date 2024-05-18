<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $ct_profil->nama_blog }} {{ isset($title) ? '- ' . $title : '' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('img') }}/{{ $ct_profil->logo }}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/blog/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/blog/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('assets/blog/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/blog/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/blog/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/blog/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/blog/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/blog/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/blog/assets/css/style.css') }}" rel="stylesheet">
</head>

<body style="background-color: #00000009;">

    <main>
        @yield('content')
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/blog/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('assets/blog/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/blog/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('assets/blog/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/blog/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('assets/blog/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url('assets/blog/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/blog/assets/js/main.js') }}"></script>

    @yield('scripts')

</body>

</html>
