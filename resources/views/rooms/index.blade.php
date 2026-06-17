@extends('layouts.app')

@section('content')
<div class="page-enter">

<div class="hero-section">

    <div class="hero-overlay">

        <h1>Temukan Kamar Terbaik</h1>

        <p>
            Pesan kamar hotel dengan mudah dan nyaman.
        </p>

        <a href="#rooms" class="btn-hero">
        Lihat Kamar
        </a>

    </div>

</div>

<div class="row text-center mb-5">

    <div class="col-md-4">
        <div class="dashboard-card">
            <h3>🏊</h3>
            <h5>Kolam Renang</h5>
            <p>Nikmati fasilitas kolam renang premium.</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="dashboard-card">
            <h3>🍽️</h3>
            <h5>Restoran</h5>
            <p>Menu lokal dan internasional.</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="dashboard-card">
            <h3>📶</h3>
            <h5>WiFi Gratis</h5>
            <p>Koneksi internet cepat di seluruh area hotel.</p>
        </div>
    </div>

</div>

<div id="rooms" class="mt-5">

    <h2 class="mb-4">Daftar Kamar</h2>

    <div class="row">

        @foreach($rooms as $room)

        <div class="col-md-4">

            <div class="card mb-4">

                @if($room->image)

                <img src="{{ asset('storage/'.$room->image) }}"
                class="card-img-top room-img">

                @endif

                <div class="card-body">

                    <h4>{{ $room->room_type }}</h4>

                    <p>Kamar {{ $room->room_number }}</p>

                    <h5>
                        Rp {{ number_format($room->price) }}
                    </h5>

                    <a href="{{ route('booking.create',$room->id) }}"
                    class="btn btn-primary w-100">
                    Pesan Sekarang
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>
</div>

</div>


@endsection