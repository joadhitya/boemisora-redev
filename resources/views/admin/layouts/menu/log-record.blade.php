<p class="text-muted nav-heading mt-1 mb-1">
    <span>Log Record</span>
</p>

<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(3) == 'phase') active-label @endif" href="{{ route('log-record.index') }}">
            <i class="fe fe-file-text fe-16"></i>
            <span class="ml-3 item-text">Log Aktivitas</span>
        </a>
    </li>
</ul>
