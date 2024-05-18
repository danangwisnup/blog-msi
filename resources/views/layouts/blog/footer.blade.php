<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>{{ $ct_profil->nama_blog }}</h3>
                    <p>
                        {{ $ct_kontak->alamat_kantor }}<br><br>
                        <strong>Phone:</strong> {{ $ct_kontak->wa }}<br>
                        <strong>Email:</strong> {{ $ct_kontak->email }}<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Tautan</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Beranda</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('tentang/profil') }}">Profil</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('tentang/visi-misi') }}">Visi Misi</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('program-kerja') }}">Program Kerja</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('berita-artikel') }}">Berita &
                                Artikel</a>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Ikuti Artikel dan Kegiatan Terbaru Kami</h4>
                    <p>Kirim e-mail anda pada kolom di bawah ini untuk selalu update dengan artikel dan kegiatan kami
                    </p>
                    <form action="{{ url('/') }}" method="post">
                        @csrf
                        <input type="email" name="email"><input type="submit" value="Kirim">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ $ct_profil->nama_blog }}</span></strong>. All Rights
                Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href=" https://twitter.com/{{ $ct_kontak->twitter }}" class="twitter">
                <i class="bx bxl-twitter"></i>
            </a>
            <a href="https://www.facebook.com/{{ $ct_kontak->fb }}" class="facebook">
                <i class="bx bxl-facebook"></i>
            </a>
            <a href="https://www.instagram.com/{{ $ct_kontak->ig }}" class="instagram">
                <i class="bx bxl-instagram"></i>
            </a>
        </div>
    </div>
</footer><!-- End Footer -->
