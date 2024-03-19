<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="/" class="logo me-auto me-lg-0">
        <img src="{{ url('img') }}/{{ $ct_profil->logo }}" alt="Logo" class="img-fluid"
        style="width: 180px; height: 50px;">
    </a>

      <nav id="navbar" class="navbar order-last order-lg-0 me-auto">
        <ul>
          <li><a href="/" class="active">Beranda</a></li>

          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="tentang/profil">Profil</a></li>
              <li><a href="tentang/pengurus">Pengurus</a></li>
            </ul>
          </li>

          <li><a href="program-kerja">Program Kerja</a></li>
          <li><a href="berita-artikel">Berita / Artikel</a></li>
          <li><a href="kontak">Kontak</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="admin/auth/login" class="btn btn-success">Login</a>           

    </div>
  </header><!-- End Header -->