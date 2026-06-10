@extends('layouts.admin')

@section('content')

<div class="container mt-5">

    <h2>Dashboard Admin</h2>
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="stat-card">
                <h5>Total Booking</h5>
                <h3>{{ $totalBooking }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <h5>Booking Confirmed</h5>
                <h3>{{ $confirmedBooking }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <h5>Pendapatan</h5>
                <h3>Rp {{ number_format($revenue) }}</h3>
            </div>
        </div>

    </div>
    
    <table class="table table-bordered">

        <thead>
        <tr>
            <th>User</th>
            <th>Kamar</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>

        @foreach($bookings as $booking)

        <tr>

            <td>{{ $booking->user->name }}</td>

            <td>{{ $booking->room->room_number }}</td>

            <td>{{ $booking->check_in }}</td>

            <td>{{ $booking->check_out }}</td>

            <td>

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

            </td>

            <td>

                <form
                    action="{{ route('admin.confirm',$booking->id) }}"
                    method="POST"
                    style="display:inline">

                    @csrf

                    <button class="btn btn-success btn-sm">
                        Confirm
                    </button>

                </form>

                <form
                    action="{{ route('admin.cancel',$booking->id) }}"
                    method="POST"
                    style="display:inline">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Cancel
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection 