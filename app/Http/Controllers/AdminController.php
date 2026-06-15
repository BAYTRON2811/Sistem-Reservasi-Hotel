<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;

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

    public function checkin(Booking $booking)
    {
        $booking->update([
            'status' => 'occupied'
        ]);

        return back()
            ->with('success','Tamu berhasil check in');
    }

    public function occupiedRooms()
    {
        $bookings = Booking::with(['user', 'room'])
            ->where('status', 'confirmed')
            ->get();

        return view(
            'admin.occupied',
            compact('bookings')
        );
    }

    public function checkout(Booking $booking)
    {
        $booking->update([
            'status' => 'completed'
        ]);

        return back()
            ->with(
            'success',
            'Check Out berhasil'
        );
    }
}