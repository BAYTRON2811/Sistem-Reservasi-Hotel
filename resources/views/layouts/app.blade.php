<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>
<body>

<nav id="navbar" class="navbar navbar-expand-lg navbar-custom">

    <div class="container-fluid px-5">

        <a class="navbar-brand" href="/">
            Hotel Reservation
        </a>

        <div class="d-flex gap-2">

            @auth

            <a href="{{ route('booking.history') }}"
                class="btn btn-light">
                My Booking
            </a>

            @if(auth()->user()->role == 'admin')

            <a href="{{ route('admin.dashboard') }}"
                class="btn btn-light">
                Dashboard Admin
            </a>

            @endif

            <form action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button type="submit"
                    class="btn btn-danger">
                    Ganti Akun
                </button>

            </form>

            @else

            <a href="{{ route('login') }}"
                class="btn btn-light">
                Login
            </a>

            @endauth

        </div>

    </div>

</nav>

<div class="container-fluid mt-4 px-5">

    @yield('content')

</div>

<footer class="bg-dark text-white text-center py-4 mt-5">

    <h5>Hotel Reservation</h5>

    <p class="mb-0">
        © 2026 All Rights Reserved
    </p>

</footer>

<script>

let lastScroll = 0;
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {

    const currentScroll = window.pageYOffset;

    if(currentScroll <= 100)
    {
        navbar.classList.remove("navbar-hide");
        return;
    }

    if(currentScroll > lastScroll)
    {
        navbar.classList.add("navbar-hide");
    }
    else
    {
        navbar.classList.remove("navbar-hide");
    }

    lastScroll = currentScroll;
});

</script>
</body>
</html>