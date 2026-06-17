@extends('layouts.admin')

@section('content')

<div class="container mt-5">

    <h2>Dashboard Admin</h2>
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="dashboard-card">
                <h6>Total Kamar</h6>
                <h2>{{ $totalRooms }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <h6>Kamar Terisi</h6>
                <h2>{{ $occupiedRooms }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <h6>Kamar Kosong</h6>
                <h2>{{ $availableRooms }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h6>Pendapatan</h6>
                <h3>Rp {{ number_format($revenue) }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <h6>Pendapatan Hari Ini</h6>
                <h4>Rp {{ number_format($todayRevenue) }}</h4>
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
                <span class="badge bg-info">
                    Confirmed
                </span>

                @elseif($booking->status == 'occupied')
                <span class="badge bg-success">
                Occupied
                </span>

                @elseif($booking->status == 'completed')
                <span class="badge bg-secondary">
                    Completed
                </span>

                @else
                <span class="badge bg-danger">
                    Cancelled
                </span>
                @endif

            </td>

            <td>

                @if($booking->status == 'confirmed')

                <form action="{{ route('admin.checkin',$booking->id) }}"
                    method="POST"
                    class="d-inline">

                    @csrf

                    <button class="btn btn-primary btn-sm">
                    Check In
                    </button>

                </form>

                @endif
                
                <form action="{{ route('admin.confirm',$booking->id) }}"
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