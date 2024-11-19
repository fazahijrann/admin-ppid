<?php
$role = str_replace('_', ' ', Auth::user()->role);
$roleParts = explode(' ', $role);

if (isset($roleParts[0])) {
    // Mengubah kata pertama menjadi kapital huruf pertama
    $roleParts[0] = ucfirst($roleParts[0]);
}

if (isset($roleParts[1])) {
    // Mengubah kata kedua menjadi kapital seluruhnya
    $roleParts[1] = strtoupper($roleParts[1]);
}

$formattedRole = implode(' ', $roleParts);

?>
<!-- BEGIN: Account Menu -->
<div class="intro-x dropdown w-8 h-8">
    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
        aria-expanded="false" data-tw-toggle="dropdown">
        <img alt="Midone - HTML Admin Template" src="{{ asset('img/logopemkot.png') }}">
    </div>
    <div class="dropdown-menu w-56">
        <ul class="dropdown-content bg-primary text-white">
            <li class="p-2">
                <div class="font-medium">{{ Auth::user()->name }}</div>
                <div class="text-xs text-white/70 mt-0.5 ">{{ $formattedRole }} | Kota Bogor
                </div>
            </li>
            <li>
                <hr class="dropdown-divider border-white/[0.08]">
            </li>
            <li>
                <a href="/profile" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                        class="w-4 h-4 mr-2"></i> Profile </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="dropdown-item hover:bg-white/5">
                        <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- END: Account Menu -->
