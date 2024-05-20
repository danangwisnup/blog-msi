 <header id="header" class="fixed-top">
     <div class="container d-flex align-items-center">

         <h1 class="me-auto">
             <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center">
                 <img src="{{ url('img') }}/{{ $ct_profil->logo }}" alt="Logo" class="img-fluid"
                     style="width: 200px; height: 80px;">
             </a>
         </h1>

         <nav id="navbar" class="navbar order-last order-lg-0">
             <ul>
                 <li>
                     <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                         Beranda
                     </a>
                 </li>
                 <li class="dropdown">
                     <a href="javascript:void(0)">
                         <span>Tentang</span><i class="bi bi-chevron-down"></i>
                     </a>
                     <ul>
                         <li>
                             <a href="{{ url('tentang/profil') }}">Profil</a>
                         </li>
                         <li>
                             <a href="{{ url('tentang/visi-misi') }}">Visi Misi</a>
                         </li>
                         <li>
                             <a href="{{ url('tentang/struktur-organisasi') }}">Struktur Organisasi</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="{{ url('program-kerja') }}" class="{{ request()->is('program-kerja') ? 'active' : '' }}">
                         Program Kerja
                     </a>
                 </li>
                 <li class="dropdown">
                     <a href="javascript:void(0)">
                         <span>Galeri</span><i class="bi bi-chevron-down"></i>
                     </a>
                     <ul>
                         <li>
                             <a href="{{ url('galeri/foto') }}">Foto</a>
                         </li>
                         <li>
                             <a href="{{ url('galeri/video') }}">Video</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="{{ url('berita-artikel') }}"
                         class="{{ request()->is('berita-artikel') ? 'active' : '' }}">
                         Berita & Artikel
                     </a>
                 <li>
                     <a href="{{ url('kontak') }}" class="{{ request()->is('kontak') ? 'active' : '' }}">
                         Kontak
                     </a>
                 </li>

             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

         <div class="d-flex ms-5">
             @if (auth()->check())
                 <a href="{{ url('admin') }}" class="btn btn-success">Dashboard</a>
             @else
                 <a href="{{ url('admin/auth/login') }}" class="btn btn-success">Login</a>
             @endif
         </div>

     </div>
 </header><!-- End Header -->

 @if (!request()->is('/'))
     <br><br><br>
 @endif
