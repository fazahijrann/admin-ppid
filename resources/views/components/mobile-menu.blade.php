@if (Auth::user()->role === 'superadmin')
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Logo PPID" class="w-8" src="{{ asset('img/logo-ppid.png') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">
            <li>
                <a href="javascript:;.html" class="menu menu--active">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
        </ul>
    </div>
@endif
