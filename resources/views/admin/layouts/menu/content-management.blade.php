{{-- <p class="text-muted nav-heading mt-1 mb-1">
    <span>Master Data</span>
</p>


<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
        <a href="#cms-master-data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-box fe-16"></i>
            <span class="ml-3 item-text">Data Master</span><span class="sr-only">(current)</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100  @if (Request::segment(2) == 'master-data') show @endif"
            id="cms-master-data">
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'social-media') active-label @endif"
                    href="{{ route('md-social-media.index') }}">
                    <span class="item-text">Social Media</span>
                </a>
            </li>
        </ul>
    </li>
</ul>

<p class="text-muted nav-heading mt-1 mb-1">
    <span>Content Management</span>
</p>
<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
        <a href="#profile-master" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-grid fe-16"></i>
            <span class="ml-3 item-text">Profile - Master</span><span class="sr-only">(current)</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100  @if (Request::segment(2) == 'content-management') show @endif"
            id="profile-master">
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'homepage') active-label @endif"
                    href="{{ route('homepage.index') }}">
                    <span class="item-text">Homepage</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'ourstorypage') active-label @endif"
                    href="{{ route('ourstorypage.index') }}">
                    <span class="item-text">Our Story</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'ecoparkpage') active-label @endif"
                    href="{{ route('ecoparkpage.index') }}">
                    <span class="item-text">Ecopark</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'balepage') active-label @endif"
                    href="{{ route('balepage.index') }}">
                    <span class="item-text">Bale</span>
                </a>
            </li>
        </ul>
    </li>
</ul> --}}


@php
    $menuItems = [
        'master-data' => [
            'icon' => 'fe fe-box fe-16',
            'text' => 'Data Master',
            'items' => [
                ['route' => 'md-social-media.index', 'segment' => 'social-media', 'text' => 'Social Media'],
                ['route' => 'md-social-media.index', 'segment' => 'what-to-do', 'text' => 'What to Do'],
            ],
        ],
        'content-management' => [
            'icon' => 'fe fe-grid fe-16',
            'text' => 'Halaman Website',
            'items' => [
                ['route' => 'homepage.index', 'segment' => 'homepage', 'text' => 'Homepage'],
                ['route' => 'ourstorypage.index', 'segment' => 'ourstorypage', 'text' => 'Our Story'],
                ['route' => 'ecoparkpage.index', 'segment' => 'ecoparkpage', 'text' => 'Ecopark'],
                ['route' => 'balepage.index', 'segment' => 'balepage', 'text' => 'Bale'],
            ],
        ],
    ];
@endphp

@foreach ($menuItems as $menuKey => $menu)
    <p class="text-muted nav-heading mt-1 mb-1">
        <span>{{ ucwords(str_replace('-', ' ', $menuKey)) }}</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="#{{ $menuKey }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="{{ $menu['icon'] }}"></i>
                <span class="ml-3 item-text">{{ $menu['text'] }}</span>
                <span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100 @if (Request::segment(2) == $menuKey) show @endif"
                id="{{ $menuKey }}">
                @foreach ($menu['items'] as $item)
                    <li class="nav-item w-100">
                        <a class="nav-link @if (Request::segment(3) == $item['segment']) active-label @endif"
                            href="{{ route($item['route']) }}">
                            <span class="item-text">{{ $item['text'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
@endforeach
