@extends('layouts.guest')
 
@section('title', 'Reset Password — Hotel Reservation')
@section('subtitle', 'Buat password baru untuk akunmu')
 
@section('content')
 
<form method="POST" action="{{ route('password.store') }}">
    @csrf
 
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
 
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
               id="email"
               name="email"
               value="{{ old('email', $request->email) }}"
               class="form-control @error('email') is-invalid @enderror"
               required
               autofocus
               autocomplete="username">
    </div>
 
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               id="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               required
               autocomplete="new-password">
    </div>
 
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password"
               id="password_confirmation"
               name="password_confirmation"
               class="form-control"
               required
               autocomplete="new-password">
    </div>
 
    <button type="submit" class="btn btn-primary w-100">
        Reset Password
    </button>
 
</form>
 
@endsection