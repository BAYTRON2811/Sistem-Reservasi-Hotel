@extends('layouts.admin')

@section('content')

<h2 class="mb-4">
    Kamar Terisi
</h2>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif
<table class="table table-bordered">

    <thead>
        <tr>
            <th>Kamar</th>
            <th>Tamu</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($bookings as $booking)

        <tr>

            <td>
                {{ $booking->room->room_number }}
            </td>

            <td>
                {{ $booking->user->name }}
            </td>

            <td>
                {{ $booking->check_in }}
            </td>

            <td>
                {{ $booking->check_out }}
            </td>

            <td>

                <form action="{{ route('admin.checkout',$booking->id) }}"
                      method="POST">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Check Out
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="5" class="text-center">
                Tidak ada kamar yang sedang terisi
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection