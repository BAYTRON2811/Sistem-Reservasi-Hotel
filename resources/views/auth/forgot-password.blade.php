@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card p-4">

        <h3>Lupa Password</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('password.reset.custom') }}">

            @csrf

            <div class="mb-3">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Password Baru</label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>

                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       required>
            </div>

            <button class="btn btn-primary">
                Reset Password
            </button>

        </form>

    </div>

</div>

@endsection