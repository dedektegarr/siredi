<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ env('APP_URL') }}/dashboard" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/admin-img.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->username }}
                    <span class="right badge badge-danger">{{ auth()->user()->role }}</span></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-gauge"></i>
                        <p> Dashboard</p>
                    </a>
                </li>
                {{-- @dd(request()->route()->getPrefix() == '/users') --}}
                <li class="nav-item {{ request()->route()->getPrefix() == '/users' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->route()->getPrefix() == '/users' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dokter.index') }}"
                                class="nav-link {{ Route::is('dokter*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-user-doctor"></i>
                                <p> Dokter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('perawat.index') }}"
                                class="nav-link {{ Route::is('perawat*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-user-nurse"></i>
                                <p> Perawat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('apoteker.index') }}"
                                class="nav-link {{ Route::is('apoteker*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-user-nurse"></i>
                                <p> Apoteker</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pasien.index') }}" class="nav-link {{ Route::is('pasien*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-hospital-user"></i>
                        <p> Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('poli.index') }}" class="nav-link {{ Route::is('poli*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-notes-medical"></i>
                        <p> Poli</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
