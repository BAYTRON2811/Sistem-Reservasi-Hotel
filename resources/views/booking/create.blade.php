@extends('layouts.app')

@section('content')

<div class="row">

    <!-- Detail Kamar -->
    <div class="col-lg-5">

        <div class="card shadow-sm border-0">

            @if($room->image)
                <img src="{{ asset('storage/'.$room->image) }}"
                     class="card-img-top"
                     style="height:300px;object-fit:cover;">
            @endif

            <div class="card-body">

                <span class="badge bg-primary mb-2">
                    {{ $room->room_type }}
                </span>

                <h3>Kamar {{ $room->room_number }}</h3>

                <p class="text-muted">
                    {{ $room->description }}
                </p>

                <hr>

                <h4 class="text-success">
                    Rp {{ number_format($room->price) }}
                    <small class="text-muted">/ malam</small>
                </h4>

            </div>

        </div>

    </div>

    <!-- Form Booking -->
    <div class="col-lg-7">

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                <h3 class="mb-4">
                    Reservasi Kamar
                </h3>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('booking.store') }}"
                      method="POST">

                    @csrf

                    <input type="hidden"
                           name="room_id"
                           value="{{ $room->id }}">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Check In
                            </label>

                            <input type="date"
                                   name="check_in"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Check Out
                            </label>

                            <input type="date"
                                   name="check_out"
                                   class="form-control"
                                   required>

                        </div>

                    </div>

                    <div class="alert alert-light border">

                        <h6>Fasilitas Kamar</h6>

                        <ul class="mb-0">
                            <li>WiFi Gratis</li>
                            <li>AC</li>
                            <li>TV LED</li>
                            <li>MBG</li>
                        </ul>

                    </div>

                    <button class="btn btn-primary w-100 py-2">
                        Booking Sekarang
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection