<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Reservation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav id="navbar" class="navbar navbar-expand-lg navbar-custom">

    <div class="container-fluid px-4 px-lg-5">

        <a class="navbar-brand" href="{{ route('rooms.index') }}">
            Hotel Reservation
        </a>

        <div class="d-flex gap-2 flex-wrap">

            @auth

            <a href="{{ route('booking.history') }}" class="btn btn-light btn-sm">
                My Booking
            </a>

            @if(auth()->user()->role == 'admin')

            <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm">
                Dashboard Admin
            </a>

            @endif

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">
                    Ganti Akun
                </button>
            </form>

            @else

            <a href="{{ route('login') }}" class="btn btn-light btn-sm">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-hero btn-sm py-2 px-3">
                Daftar
            </a>

            @endauth

        </div>

    </div>

</nav>

<main class="container-fluid mt-4 px-4 px-lg-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')

</main>

<footer class="site-footer">
    <h5>Hotel Reservation</h5>
    <p class="mb-0">&copy; {{ date('Y') }} All Rights Reserved</p>
</footer>

<script>
let lastScroll = 0;
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll <= 100) {
        navbar.classList.remove("navbar-hide");
        return;
    }

    if (currentScroll > lastScroll) {
        navbar.classList.add("navbar-hide");
    } else {
        navbar.classList.remove("navbar-hide");
    }

    lastScroll = currentScroll;
});
</script>
</body>
</html>