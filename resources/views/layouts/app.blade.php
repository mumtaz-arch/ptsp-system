<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 (Local) -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Custom styles if any -->
    <style>
        :root {
            --ptsp-primary: #198754; /* Green */
        }
        .bg-primary-green { background-color: var(--ptsp-primary) !important; }
        .text-primary-green { color: var(--ptsp-primary) !important; }
    </style>
    @stack('styles')
</head>
<body>
    {{ $slot }}

    <!-- Scripts (Local) -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
