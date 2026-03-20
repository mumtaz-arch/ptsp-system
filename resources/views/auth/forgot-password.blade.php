<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - {{ config('app.name') }}</title>
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
                <h4 class="fw-bold mb-1 text-white">Reset Password</h4>
                <p class="mb-0 small" style="color: rgba(255,255,255,0.7);">PTSP MAKN Ende</p>
            </div>
            <div class="auth-body">
                <p class="small mb-3" style="color: rgba(255,255,255,0.5);">Masukkan email Anda dan kami akan mengirimkan link untuk reset password.</p>

                @if(session('status'))
                    <div class="alert alert-success small">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-ptsp w-100 fw-bold py-2">Kirim Link Reset</button>
                </form>
            </div>
            <div class="text-center pb-4">
                <a href="{{ route('login') }}" class="small" style="color: rgba(255,255,255,0.5);">← Kembali ke Login</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
