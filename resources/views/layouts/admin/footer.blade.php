<!-- ======= Footer ======= -->
<footer class="footer">
    <div class="copyright">
        <strong>
            <span>
                &copy; Copyright @if (date('Y') > 2024)
                    2024 - {{ date('Y') }}
                @else
                    2024
                @endif
                {{ $ct_profil->nama_blog }}. All Rights
                Reserved.
            </span>
        </strong>
    </div>
    <div class="credits">
        Designed by <a href="https://danangwisnu.my.id/">DWP</a>
    </div>
</footer>
<!-- End Footer -->
