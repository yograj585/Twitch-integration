<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
               
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (Auth::user()->role_name=='Admin')
                            <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                            <hr>
                            <span>Role Name:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Super Admin')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-info">Super Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Normal User')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-warning">User Normal</span>
                            @endif
                        </div>
                    </div>
                </li>
                @if (Auth::user()->role_name=='Admin')
                <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                        <i class="bi-people-fill"></i>
                            <span>Customer</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('userManagement') }}">Customer Listing</a>
                            </li>
                        </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                        <i class="bi-house-door"></i>
                            <span>Shopkeeper</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('Shopkeeper') }}">Shopkeeper Listing</a>
                            </li>
                        </ul>
                        </li>
                @endif
                <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class='sidebar-link'>
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>