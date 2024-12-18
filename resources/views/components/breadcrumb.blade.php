<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" {{ $loop->last ? 'aria-current="page"' : '' }}>
                @if ($breadcrumb->url && !$loop->last)
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                @else
                    {{ $breadcrumb->title }}
                @endif
            </li>
        @endforeach
    </ol>
</nav>
