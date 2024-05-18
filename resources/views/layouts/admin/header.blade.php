<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="text-center" style="width: 280px; height: 50px; overflow: hidden;">
        <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center">
            <img src="{{ url('img') }}/{{ $ct_profil->logo }}" alt="Logo" class="img-fluid"
                style="width: 180px; height: 50px;">
        </a>
    </div>

    <i class="bi bi-list toggle-sidebar-btn"></i>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-2"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2 pe-4">{{ Auth::user()->name }} </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->email }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= url('admin/pengaturan-akun') ?>">
                            <i class="bi bi-gear"></i>
                            <span>Pengaturan Akun</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= url('admin/auth/logout') ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
