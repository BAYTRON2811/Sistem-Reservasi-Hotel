<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>

.card{
    border-radius:20px;
}

.form-control{
    border-radius:12px;
    padding:10px;
}

.btn-primary{
    border-radius:12px;
    font-weight:600;
}

.btn-primary:hover{
    transform:translateY(-2px);
    transition:0.3s;
}
</style>
<body>

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow-lg border-0">

            <div class="card-body p-5">

                <h2 class="text-center mb-4">
                    Login
                </h2>

                <form method="POST"
                      action="{{ route('login') }}">

                    @csrf

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <div class="flex flex-col gap-3 mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Lupa password?(test)') }}
                        </a>
                        @endif
                    </div>

                    <button class="btn btn-primary w-100">
                        Login
                    </button>

                    <div class="text-center mt-3">

                        Belum punya akun?

                        <a href="{{ route('register') }}">
                            Register
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>