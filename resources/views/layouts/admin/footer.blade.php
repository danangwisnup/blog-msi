<!-- ======= Footer ======= -->
<footer class="footer">
    <div class="copyright">
        <span>
            &copy; Copyright @if (date('Y') > 2024)
                2024 - {{ date('Y') }}
            @else
                2024
            @endif

            <strong>
                {{ $ct_profil->nama_blog }}.
            </strong>
            All Rights Reserved.
        </span>
    </div>
</footer>
<!-- End Footer -->
