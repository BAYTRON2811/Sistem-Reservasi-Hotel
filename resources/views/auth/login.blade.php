@extends('layouts.guest')
 
@section('title', 'Login — Hotel Reservation')
@section('subtitle', 'Masuk untuk melanjutkan reservasi kamar')
 
@section('content')
 
<form method="POST" action="{{ route('login') }}">
    @csrf
 
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
               id="email"
               name="email"
               value="{{ old('email') }}"
               class="form-control @error('email') is-invalid @enderror"
               required
               autofocus>
    </div>
 
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               id="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               required>
    </div>
 
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label small" for="remember">Ingat saya</label>
        </div>
 
        <a href="{{ route('password.request') }}" class="small">
            Lupa password?
        </a>
    </div>
 
    <button type="submit" class="btn btn-primary w-100">
        Login
    </button>
 
    <div class="text-center mt-3 small">
        Belum punya akun?
        <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>
 
</form>
 
@endsection