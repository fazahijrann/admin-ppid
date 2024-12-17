<div class="mobile-menu md:hidden">

    @if (Auth::user()->role === 'superadmin')
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Logo PPID" class="w-8" src="{{ asset('img/logo-ppid.png') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="javascript:;"
                    class="menu {{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit', 'pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit', 'pemohon.index', 'pemohon.edit']) ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="menu__title"> Kelola Pengguna
                        <i
                            data-lucide="{{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit', 'pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit', 'pemohon.index', 'pemohon.edit']) ? 'chevron-up' : 'chevron-down' }}"class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul
                    class="{{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit', 'pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit', 'pemohon.index', 'pemohon.edit']) ? 'menu__sub-open ' : '' }}">
                    <li>
                        <a href="{{ route('petugasppid.index') }}"
                            class="menu {{ request()->routeIs(['petugasppid.index', 'petugasppid.create', 'petugasppid.edit']) ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="menu__title"> Petugas PPID </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pejabatppid.index') }}"
                            class="menu {{ request()->routeIs(['pejabatppid.index', 'pejabatppid.create', 'pejabatppid.edit']) ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="menu__title"> Pejabat PPID </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pemohon.index') }}"
                            class="menu {{ request()->routeIs(['pemohon.index', 'pemohon.edit']) ? 'menu--active' : '' }}">
                            <div class="menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="menu__title"> Pemohon </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    @endif

    @if (Auth::user()->role === 'petugas_ppid')
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Logo PPID" class="w-8" src="{{ asset('img/logo-ppid.png') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">
            <li>
                <a href="/" class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title">
                        Dashboard
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('permohonan.index') }}"
                    class="menu {{ request()->routeIs(['permohonan.index', 'permohonan.show']) ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="menu__title">
                        Permohonan Informasi
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('keberatan.index') }}"
                    class="menu {{ request()->routeIs(['keberatan.index']) ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="user-x"></i> </div>
                    <div class="menu__title">
                        Permohonan Keberatan Informasi
                    </div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="{{ route('riwayatPermohonan') }}"
                    class="menu {{ request()->routeIs('riwayatPermohonan') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="archive"></i> </div>
                    <div class="menu__title">
                        Riwayat Permohonan Informasi
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('riwayatKeberatan') }}"
                    class="menu {{ request()->routeIs('riwayatKeberatan') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="archive"></i> </div>
                    <div class="menu__title">
                        Riwayat Keberatan Permohonan Informasi
                    </div>
                </a>
            </li>
        </ul>
    @endif

    @if (Auth::user()->role === 'pejabat_ppid')
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Logo PPID" class="w-8" src="{{ asset('img/logo-ppid.png') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">
            <li>
                <a href="/" class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title">
                        Dashboard
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('permohonan.index') }}"
                    class="menu {{ request()->routeIs(['permohonan.index', 'permohonan.show']) ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="users"></i> </div>
                    <div class="menu__title">
                        Permohonan Informasi
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ route('keberatan.index') }}"
                    class="menu {{ request()->routeIs(['keberatan.index']) ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="user-x"></i> </div>
                    <div class="menu__title">
                        Permohonan Keberatan Informasi
                    </div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="{{ route('riwayatPermohonan') }}"
                    class="menu {{ request()->routeIs('riwayatPermohonan') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="archive"></i> </div>
                    <div class="menu__title">
                        Riwayat Permohonan Informasi
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('riwayatKeberatan') }}"
                    class="menu {{ request()->routeIs('riwayatKeberatan') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="archive"></i> </div>
                    <div class="menu__title">
                        Riwayat Keberatan Permohonan Informasi
                    </div>
                </a>
            </li>
        </ul>
    @endif

</div>
