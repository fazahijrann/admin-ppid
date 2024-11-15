@if (Auth::user()->role === 'superadmin')
    <nav class="side-nav">
        <a href="/" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Logo PPID" class="w-8" src="{{ asset('img/logo-ppid.png') }}">
            <span class="hidden xl:block text-white text-lg ml-3"> PPID Admin </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/" class="side-menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="side-menu__title">
                        Dashboard
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;"
                    class="side-menu {{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit', 'pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit', 'pemohon.index', 'pemohon.edit']) ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="side-menu__title">
                        Kelola Pengguna
                        <div class="side-menu__sub-icon"> <i
                                data-lucide="{{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit', 'pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit', 'pemohon.index', 'pemohon.edit']) ? 'chevron-up' : 'chevron-down' }}"></i>
                        </div>
                    </div>
                </a>
                <ul
                    class="{{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit', 'pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit', 'pemohon.index', 'pemohon.edit']) ? 'side-menu__sub-open ' : '' }}">
                    <li>
                        <a href="{{ route('petugasppid.index') }}"
                            class="side-menu {{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit']) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="side-menu__title"> Petugas PPID </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pejabatppid.index') }}"
                            class="side-menu {{ request()->routeIs(['pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit']) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="side-menu__title"> Pejabat PPID </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pemohon.index') }}"
                            class="side-menu {{ request()->routeIs(['pemohon.index', 'pemohon.edit']) ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="side-menu__title"> Pemohon </div>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                <a href="/file" class="side-menu {{ request()->routeIs('tampilFile') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                    <div class="side-menu__title">
                        File
                    </div>
                </a>
            </li> --}}
        </ul>

    </nav>
@endif


@if (Auth::user()->role === 'petugas_ppid')
    <nav class="side-nav">
        <a href="/" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Logo PPID" class="w-8" src="{{ asset('img/logo-ppid.png') }}">
            <span class="hidden xl:block text-white text-lg ml-3"> PPID Admin </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/" class="side-menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="side-menu__title">
                        Dashboard
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('permohonan.index') }}"
                    class="side-menu {{ request()->routeIs(['permohonan.index', 'permohonan.show']) ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="side-menu__title">
                        Permohonan Informasi
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('keberatan.index') }}"
                    class="side-menu {{ request()->routeIs(['keberatan.index']) ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="user-x"></i> </div>
                    <div class="side-menu__title">
                        Permohonan Keberatan Informasi
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('riwayatPermohonan') }}"
                    class="side-menu {{ request()->routeIs('riwayatPermohonan') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="archive"></i> </div>
                    <div class="side-menu__title">
                        Riwayat Permohonan Informasi
                    </div>
                </a>
            </li>


        </ul>
    </nav>
@endif


@if (Auth::user()->role === 'pejabat_ppid')
    <nav class="side-nav">
        <a href="/" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Logo PPID" class="w-8" src="{{ asset('img/logo-ppid.png') }}">
            <span class="hidden xl:block text-white text-lg ml-3"> PPID Admin </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="/" class="side-menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="side-menu__title">
                        Dashboard
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('permohonan.index') }}"
                    class="side-menu {{ request()->routeIs(['permohonan.index', 'permohonan.show']) ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="side-menu__title">
                        Permohonan Informasi
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('keberatan.index') }}"
                    class="side-menu {{ request()->routeIs(['keberatan.index']) ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="user-x"></i> </div>
                    <div class="side-menu__title">
                        Permohonan Keberatan Informasi
                    </div>
                </a>
            </li>
        </ul>
    </nav>
@endif
