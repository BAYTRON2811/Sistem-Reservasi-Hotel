@extends('layouts.guest')
 
@section('title', 'Verifikasi Email — Hotel Reservation')
@section('subtitle', 'Satu langkah lagi sebelum mulai memesan kamar')
 
@section('content')
 
<p class="text-muted small">
    Terima kasih sudah mendaftar! Sebelum mulai, mohon verifikasi alamat email kamu
    dengan klik link yang sudah kami kirimkan. Kalau belum menerima email-nya,
    kami akan kirim ulang.
</p>
 
@if(session('status') == 'verification-link-sent')
    <div class="alert alert-success">
        Link verifikasi baru sudah dikirim ke alamat email yang kamu daftarkan.
    </div>
@endif
 
<div class="d-flex justify-content-between align-items-center mt-4">
 
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">
            Kirim Ulang Email Verifikasi
        </button>
    </form>
 
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link text-muted small text-decoration-underline">
            Logout
        </button>
    </form>
 
</div>
 
@endsection