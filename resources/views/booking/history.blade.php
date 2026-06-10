<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Riwayat Booking Saya</h2>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach($bookings as $booking)

            <tr>
                <td>{{ $booking->room->room_number }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>{{ $booking->check_out }}</td>
                <td>Rp {{ number_format($booking->total_price) }}</td>
                @if($booking->status == 'pending')

                    <span class="badge bg-warning">
                        Pending
                    </span>

                    @elseif($booking->status == 'confirmed')

                    <span class="badge bg-success">
                    Confirmed
                    </span>

                    @elseif($booking->status == 'cancelled')

                    <span class="badge bg-danger">
                    Cancelled
                    </span>

                @endif
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>