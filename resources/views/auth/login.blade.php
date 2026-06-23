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
                        <a href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
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