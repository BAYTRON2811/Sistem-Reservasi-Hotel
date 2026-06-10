<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="d-flex">

    <div class="bg-dark text-white p-3"
         style="width:250px;min-height:100vh;">

        <h4>Admin Panel</h4>

        <hr>

        <a href="{{ route('admin.dashboard') }}"
           class="text-white d-block mb-3 text-decoration-none">
           Dashboard
        </a>

        <a href="/admin/rooms"
           class="text-white d-block mb-3 text-decoration-none">
           Kelola Kamar
        </a>

    </div>

    <div class="flex-grow-1 p-4">

        @yield('content')

    </div>

</div>

</body>
</html>