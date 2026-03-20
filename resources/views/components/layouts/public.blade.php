<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-ptsp sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="36">
                PTSP MAKN Ende
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('buku-tamu.*') ? 'active' : '' }}" href="{{ route('buku-tamu.create') }}">Buku Tamu</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}" href="{{ route('pengaduan.create') }}">Pengaduan</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a></li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-login" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer-ptsp">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand d-flex align-items-center gap-2">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="40">
                        PTSP MAKN Ende
                    </div>
                    <p class="footer-desc">"Memberikan pelayanan terpadu yang transparan, akuntabel, dan profesional untuk seluruh masyarakat."</p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="footer-link">Facebook</a>
                        <a href="#" class="footer-link">Instagram</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5>Halaman</h5>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="{{ route('home') }}" class="footer-link">Beranda</a>
                        <a href="{{ route('profil') }}" class="footer-link">Profil</a>
                        <a href="{{ route('layanan') }}" class="footer-link">Layanan</a>
                        <a href="{{ route('buku-tamu.create') }}" class="footer-link">Buku Tamu</a>
                        <a href="{{ route('pengaduan.create') }}" class="footer-link">Pengaduan</a>
                        <a href="{{ route('kontak') }}" class="footer-link">Kontak</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5>Kontak</h5>
                    <p class="small mb-1"><strong>Alamat:</strong> Jl. Raya Ende, Kabupaten Ende, NTT</p>
                    <p class="small mb-1"><strong>Telepon:</strong> 0381-XXXXXXX</p>
                    <p class="small mb-1"><strong>Email:</strong> ptsp@makn-ende.sch.id</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                &copy; {{ date('Y') }} PTSP MAKN Ende. Semua Hak Dilindungi.
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float -->
    <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float" title="Chat WhatsApp">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
