<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <div class="admin-sidebar d-flex flex-column">
        <div class="sidebar-brand d-flex align-items-center gap-2">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="36">
            <div>
                <h5 class="mb-0">PTSP Admin</h5>
                <small>MAKN Ende</small>
            </div>
        </div>
        <ul class="nav nav-pills flex-column mt-3 mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.buku-tamu.index') }}" class="nav-link {{ request()->routeIs('admin.buku-tamu.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-text me-2"></i> Buku Tamu
                </a>
            </li>
            <li>
                <a href="{{ route('admin.layanan.index') }}" class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">
                    <i class="bi bi-folder2-open me-2"></i> Layanan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengajuan.index') }}" class="nav-link {{ request()->routeIs('admin.pengajuan.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text me-2"></i> Pengajuan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengaduan.index') }}" class="nav-link {{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
                    <i class="bi bi-megaphone me-2"></i> Pengaduan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.konten.index') }}" class="nav-link {{ request()->routeIs('admin.konten.*') ? 'active' : '' }}">
                    <i class="bi bi-pencil-square me-2"></i> Konten
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="bi bi-person me-2"></i> User
                </a>
            </li>
        </ul>
        <div class="p-3 border-top" style="border-color: rgba(255,255,255,0.06) !important;">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <strong class="small">{{ Auth::user()->name ?? 'Admin' }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="admin-main">
        <div class="admin-topbar">
            <div>
                @if(isset($header))
                    <h5 class="fw-bold mb-0">{{ $header }}</h5>
                @endif
            </div>
            <span class="text-muted small">Selamat datang, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong></span>
        </div>

        <div class="admin-content">
            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
