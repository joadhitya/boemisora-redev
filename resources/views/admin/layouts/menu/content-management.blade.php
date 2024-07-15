<p class="text-muted nav-heading mt-1 mb-1">
    <span>Master Data</span>
</p>


<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
        <a href="#cms-master-data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-box fe-16"></i>
            <span class="ml-3 item-text">Data Master</span><span class="sr-only">(current)</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100  @if (Request::segment(2) == 'cms-master-data') show @endif"
            id="cms-master-data">
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'category-field') active-label @endif"
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
        <ul class="collapse list-unstyled pl-4 w-100  @if (Request::segment(2) == 'profile-master') show @endif"
            id="profile-master">
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'profile-assessor') active-label @endif" href="">
                    <span class="item-text">Homepage</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'profile-assessor') active-label @endif" href="">
                    <span class="item-text">Our Story</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'profile-assessor') active-label @endif" href="">
                    <span class="item-text">Ecopark</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'profile-assessor') active-label @endif" href="">
                    <span class="item-text">Bale</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
