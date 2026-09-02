@extends('layouts.guest')
 
@section('title', 'Konfirmasi Password — Hotel Reservation')
@section('subtitle', 'Ini area aman. Konfirmasi password kamu untuk lanjut.')
 
@section('content')
 
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
 
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               id="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               required
               autocomplete="current-password"
               autofocus>
    </div>
 
    <button type="submit" class="btn btn-primary w-100">
        Konfirmasi
    </button>
 
</form>
 
@endsection