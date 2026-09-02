@extends('layouts.guest')
 
@section('title', 'Lupa Password — Hotel Reservation')
@section('subtitle', 'Atur ulang password akun kamu')
 
@section('content')
 
<form method="POST" action="{{ route('password.reset.custom') }}">
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
        <label for="password" class="form-label">Password Baru</label>
        <input type="password"
               id="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               required>
    </div>
 
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password"
               id="password_confirmation"
               name="password_confirmation"
               class="form-control"
               required>
    </div>
 
    <button type="submit" class="btn btn-primary w-100">
        Reset Password
    </button>
 
    <div class="text-center mt-3 small">
        <a href="{{ route('login') }}">Kembali ke login</a>
    </div>
 
</form>
 
@endsection