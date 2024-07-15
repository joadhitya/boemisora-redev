<p class="text-muted nav-heading mt-1 mb-1">
    <span>Log Management</span>
</p>
<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(3) == 'log-activity') active-label @endif" href="{{ route('log-activity.index') }}">
            <i class="fe fe-clock fe-16"></i>
            <span class="ml-3 item-text">Log Activity</span>
        </a>
    </li>
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(3) == 'log-error') active-label @endif" href="{{ route('log-error.index') }}">
            <i class="fe fe-x-octagon fe-16"></i>
            <span class="ml-3 item-text">Log Error</span>
        </a>
    </li>
</ul>

<p class="text-muted nav-heading mt-1 mb-1">
    <span>General</span>
</p>
<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(3) == 'user-management') active-label @endif"
            href="{{ route('user-management.index') }}">
            <i class="fe fe-user-plus fe-16"></i>
            <span class="ml-3 item-text">User Management</span>
        </a>
    </li>
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(3) == 'role') active-label @endif" href="{{ route('role.index') }}">
            <i class="fe fe-pocket fe-16"></i>
            <span class="ml-3 item-text">Role</span>
        </a>
    </li>
</ul>
