<p class="text-muted nav-heading mt-1 mb-1">
    <span>Master Data</span>
</p>

<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(3) == 'phase') active-label @endif" href="{{ route('md-supplier.index') }}">
            <i class="fe fe-truck fe-16"></i>
            <span class="ml-3 item-text">Supplier</span>
        </a>
    </li>
</ul>
