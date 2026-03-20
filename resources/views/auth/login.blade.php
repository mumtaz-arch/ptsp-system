<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card shadow-lg">
            <div class="auth-header">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="64" class="mb-2">
                <h4 class="fw-bold mb-1 text-white">PTSP MAKN Ende</h4>
                <p class="mb-0 small" style="color: rgba(255,255,255,0.7);">Pelayanan Terpadu Satu Pintu</p>
            </div>
            <div class="auth-body">
                <h5 class="fw-bold mb-4 text-center text-white">Login Admin</h5>

                @if(session('status'))
                    <div class="alert alert-success small">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@ptsp.test" required autofocus>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="small" style="color: var(--ptsp-green-light);">Lupa password?</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-ptsp w-100 fw-bold py-2">Masuk</button>
                </form>
            </div>
            <div class="text-center pb-4">
                <a href="{{ url('/') }}" class="small" style="color: rgba(255,255,255,0.5);">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
