<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Room $room)
    {
        return view('booking.create', compact('room'));
    }

    public function store(Request $request)
    {
        $room = Room::findOrFail($request->room_id);

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);

        $days = $checkIn->diffInDays($checkOut);

        $totalPrice = $days * $room->price;

        $exists = Booking::where('room_id', $room->id)
            ->where(function ($query) use ($request) {

                $query->whereBetween('check_in', [
                    $request->check_in,
                    $request->check_out
                ])
                ->orWhereBetween('check_out', [
                    $request->check_in,
                    $request->check_out
                ]);
            })
            ->exists();

    if ($exists) {
        return back()
            ->with('error', 'Kamar sudah dipesan pada tanggal tersebut.');
    }

        Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $totalPrice,
            'status' => 'pending'
        ]);

        return redirect('/')
            ->with('success', 'Booking berhasil dibuat');
    }

    public function myBookings()
    {
        $bookings = auth()->user()
            ->bookings()
            ->with('room')
            ->latest()
            ->get();

        return view('booking.history', compact('bookings'));
    }
}