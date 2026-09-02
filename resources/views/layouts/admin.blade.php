<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel — Hotel Reservation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-layout no-navbar-offset">

<div class="d-flex flex-column flex-lg-row">

    <aside class="admin-sidebar">

        <div class="sidebar-brand">Hotel Admin</div>

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('admin.rooms.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}">
            🛏️ Kelola Kamar
        </a>

        <a href="{{ route('admin.occupied') }}"
           class="sidebar-link {{ request()->routeIs('admin.occupied') ? 'active' : '' }}">
            🚪 Kamar Terisi
        </a>

        <a href="{{ route('admin.users') }}"
           class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
            👥 Kelola User
        </a>

        <a href="{{ route('rooms.index') }}" class="sidebar-link">
            🌐 Lihat Web
        </a>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button class="btn btn-danger w-100">
                Logout
            </button>
        </form>

    </aside>

    <div class="flex-grow-1 p-3 p-lg-4">

        <div class="admin-topbar">
            <div>
                <div class="fw-bold">Halo, {{ auth()->user()->name }} 👋</div>
                <div class="text-muted small">Selamat datang kembali di panel admin</div>
            </div>
            <span class="badge bg-primary">Admin</span>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')

    </div>

</div>

</body>
</html>