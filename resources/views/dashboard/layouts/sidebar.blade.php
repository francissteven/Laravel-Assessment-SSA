<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                @php
                    $activeRoutes = [
                        'dashboard', 
                        'users.create', 
                        'users.store',
                        'users.view',
                        'users.edit',
                        'users.update',
                        'users.destroy'
                    ];
                @endphp
                <a class="nav-link {{ in_array(Route::currentRouteName(), $activeRoutes) ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{Route::is('users.trashed') ? 'active' : '' }}" href="{{ route('users.trashed') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Soft Deleted
                </a>
            </div>            
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <strong>{{ Auth::user()->firstname }}</strong>
        </div>
    </nav>
</div>