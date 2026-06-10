<!DOCTYPE html>
<html>
<head>
    <title>Booking Kamar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container mt-5">

    <h2>Booking Kamar {{ $room->room_number }}</h2>

    <form action="{{ route('booking.store') }}" method="POST">

        @csrf

        <input type="hidden"
               name="room_id"
               value="{{ $room->id }}">

        <div class="mb-3">

            <label>Check In</label>

            <input type="date"
                   name="check_in"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label>Check Out</label>

            <input type="date"
                   name="check_out"
                   class="form-control"
                   required>

        </div>

        <button class="btn btn-success">
            Booking
        </button>

    </form>

</div>

</body>
</html>