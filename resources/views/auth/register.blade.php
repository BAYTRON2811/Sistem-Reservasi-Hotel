
@extends('layouts.guest')
 
@section('title', 'Daftar — Hotel Reservation')
@section('subtitle', 'Buat akun untuk mulai memesan kamar')
 
@section('content')
 
<form method="POST" action="{{ route('register') }}">
    @csrf
 
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text"
               id="name"
               name="name"
               value="{{ old('name') }}"
               class="form-control @error('name') is-invalid @enderror"
               required
               autofocus>
    </div>
 
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
               id="email"
               name="email"
               value="{{ old('email') }}"
               class="form-control @error('email') is-invalid @enderror"
               required>
    </div>
 
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
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
        Daftar
    </button>
 
    <div class="text-center mt-3 small">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login di sini</a>
    </div>
 
</form>
 
@endsection