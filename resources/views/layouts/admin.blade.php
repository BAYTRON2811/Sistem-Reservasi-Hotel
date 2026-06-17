<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-layout">

<div class="d-flex">

    <div class="bg-dark text-white p-3"
         style="width:250px;min-height:100vh;">

        <h4>Admin Panel</h4>

        <hr>

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link">
           Dashboard
        </a>

        <a href="/admin/rooms"
           class="sidebar-link">
           Kelola Kamar
        </a>

        <a href="{{ route('admin.occupied') }}"
            class="sidebar-link">
            Kamar Terisi
        </a>

        <a href="{{ route('rooms.index') }}"
            class="sidebar-link">
            Lihat Web
        </a>

        <form action="{{ route('logout') }}"
            method="POST">

            @csrf

            <button class="btn btn-danger w-100 mt-4">
                Logout
            </button>

        </form>

    </div>

    <div class="flex-grow-1 p-4">

        @yield('content')

    </div>

</div>

</body>
</html>