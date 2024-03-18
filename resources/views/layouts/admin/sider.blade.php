<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?= request()->is('admin') ? '' : 'collapsed' ?>" href="<?= url('admin') ?>">
                <i class="bi bi-house fs-5 fw-bold"></i>
                <span>Beranda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= request()->is('admin/tentang*') ? '' : 'collapsed' ?>" data-bs-target="#tentang-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-info-circle fs-5 fw-bold"></i>
                <span>Tentang</span>
                <i class="bi bi-chevron-down fs-5 fw-bold ms-auto"></i>
            </a>
            <ul id="tentang-nav" class="nav-content <?= request()->is('admin/tentang*') ? '' : 'collapse' ?>"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= url('admin/tentang/profil') ?>" class="<?= $title == 'Profil' ? 'active' : '' ?>">
                        <i class="bi bi-circle fw-bold"></i><span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="<?= url('admin/tentang/visi-misi') ?>"
                        class="<?= $title == 'Visi Misi' ? 'active' : '' ?>">
                        <i class="bi bi-circle fw-bold"></i><span>Visi Misi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= url('admin/tentang/pengurus') ?>" class="<?= $title == 'Pengurus' ? 'active' : '' ?>">
                        <i class="bi bi-circle fw-bold"></i><span>Pengurus</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= request()->is('admin/program-kerja*') ? '' : 'collapsed' ?>"
                href="<?= url('admin/program-kerja') ?>">
                <i class="bi bi-lightbulb fs-5 fw-bold"></i>
                <span>Program Kerja</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= request()->is('admin/berita-artikel*') ? '' : 'collapsed' ?>"
                href="<?= url('admin/berita-artikel') ?>">
                <i class="bi bi-newspaper fs-5 fw-bold"></i>
                <span>Berita / Artikel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= request()->is('admin/kontak*') ? '' : 'collapsed' ?>"
                href="<?= url('admin/kontak') ?>">
                <i class="bi bi-telephone fs-5 fw-bold"></i>
                <span>Kontak</span>
            </a>
        </li>
    </ul>
</aside>
