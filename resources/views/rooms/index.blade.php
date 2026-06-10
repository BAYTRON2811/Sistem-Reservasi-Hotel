@extends('layouts.app')

@section('content')

<div class="hero-section">

    <div class="hero-overlay">

        <h1>Temukan Kamar Terbaik</h1>

        <p>
            Pesan kamar hotel dengan mudah dan nyaman.
        </p>

    </div>

</div>

<h1 class="mb-4">Daftar Kamar</h1>

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

@endsection