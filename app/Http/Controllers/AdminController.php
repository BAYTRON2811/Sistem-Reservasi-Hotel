<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings = Booking::with(['user','room'])
            ->latest()
            ->get();

        $totalBooking = Booking::count();

        $confirmedBooking = Booking::where(
            'status',
            'confirmed'
        )->count();

        $revenue = Booking::where(
            'status',
            'confirmed'
        )->sum('total_price');

        return view('admin.dashboard', compact('bookings','totalBooking','confirmedBooking','revenue'));
    }

    public function confirm(Booking $booking)
    {
        $booking->update([
            'status' => 'confirmed'
        ]);

        return back();
    }

    public function cancel(Booking $booking)
    {
        $booking->update([
            'status' => 'cancelled'
        ]);

        return back();
    }
}