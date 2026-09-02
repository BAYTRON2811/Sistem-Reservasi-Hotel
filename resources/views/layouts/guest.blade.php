<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hotel Reservation')</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="no-navbar-offset">
 
<div class="auth-wrapper">
    <div class="auth-card">
 
        <div class="auth-brand">Hotel Reservation</div>
        <p class="auth-subtitle">@yield('subtitle', 'Kelola reservasi kamar dengan mudah')</p>
 
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
 
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
 
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        @yield('content')
 
    </div>
</div>
 
</body>
</html>