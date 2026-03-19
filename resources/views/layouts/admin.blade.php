<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin Portal</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    @stack('styles')

    <style>
        :root {
            --ptsp-primary: #198754;
            --sidebar-width: 250px;
        }
        .bg-primary-green { background-color: var(--ptsp-primary) !important; }
        body { background-color: #f4f6f9; }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            background-color: #212529;
            color: white;
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar .nav-link { color: #adb5bd; border-radius: 4px; margin-bottom: 4px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white; background-color: var(--ptsp-primary);
        }
        .main-wrapper { margin-left: var(--sidebar-width); }
        .top-nav { background: white; border-bottom: 1px solid #e3e6f0; }
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 text-white text-decoration-none">
            <span class="fs-5 fw-bold">PTSP Admin</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.buku-tamu.index') }}" class="nav-link {{ request()->routeIs('admin.buku-tamu.*') ? 'active' : '' }}">
                    Buku Tamu
                </a>
            </li>
            <li>
                <a href="{{ route('admin.layanan.index') }}" class="nav-link {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">
                    Layanan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengajuan.index') }}" class="nav-link {{ request()->routeIs('admin.pengajuan.*') ? 'active' : '' }}">
                    Pengajuan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengaduan.index') }}" class="nav-link {{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
                    Pengaduan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.konten.index') }}" class="nav-link {{ request()->routeIs('admin.konten.*') ? 'active' : '' }}">
                    Konten
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    Manajemen User
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown">
                <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
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

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <nav class="navbar navbar-expand-lg top-nav p-3 mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1 d-md-none">PTSP Admin</span>
                <div class="ms-auto d-flex">
                    <span class="navbar-text text-dark">
                        Selamat Datang, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
                    </span>
                </div>
            </div>
        </nav>

        <div class="container-fluid px-4">
            @if(isset($header))
                <div class="mb-4">
                    <h2 class="h3 fw-bold">{{ $header }}</h2>
                </div>
            @endif

            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
