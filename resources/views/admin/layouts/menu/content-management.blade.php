@php
    $menus = [
        [
            'heading' => 'Master Data',
            'icon' => 'fe-box',
            'id' => 'master-data',
            'items' => [
                ['url' => url('/admin/master-data/md-social-media'), 'text' => 'Social Media', 'active' => false],
                ['url' => url('/admin/master-data/md-what-to-do'), 'text' => 'What to Do', 'active' => false],
            ],
        ],
        [
            'heading' => 'Content Management',
            'icon' => 'fe-grid',
            'id' => 'content-management',
            'items' => [
                ['url' => url('/admin/content-management/homepage'), 'text' => 'Homepage', 'active' => true],
                ['url' => url('/admin/content-management/ourstorypage'), 'text' => 'Our Story', 'active' => false],
                ['url' => url('/admin/content-management/ecoparkpage'), 'text' => 'Ecopark', 'active' => false],
                ['url' => url('/admin/content-management/balepage'), 'text' => 'Bale', 'active' => false],
            ],
        ],
        [
            'heading' => 'Kelola Blog',
            'icon' => 'fe-image',
            'id' => 'cms-blog',
            'items' => [
                ['url' => url('/admin/master-data/md-category-blog'), 'text' => 'Kategori Blog', 'active' => false],
                ['url' => url('/admin/content-management/blog'), 'text' => 'List Blog', 'active' => false],
                ['url' => '#', 'text' => 'Kelola Kata Terlarang', 'active' => false],
            ],
        ],
    ];
@endphp

@foreach ($menus as $menu)
    @if ($menu['heading'])
        <p class="text-muted nav-heading mt-1 mb-1">
            <span>{{ $menu['heading'] }}</span>
        </p>
    @endif
    <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="#{{ $menu['id'] }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe {{ $menu['icon'] }} fe-16"></i>
                <span class="ml-3 item-text">{{ $menu['heading']}}</span>
                <span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100 {{ $menu['id'] == 'content-management' ? '' : '' }}"
                id="{{ $menu['id'] }}">
                @foreach ($menu['items'] as $item)
                    <li class="nav-item w-100">
                        <a class="nav-link {{ $item['active'] ? 'active-label' : '' }}" href="{{ $item['url'] }}">
                            <span class="item-text">{{ $item['text'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
@endforeach
