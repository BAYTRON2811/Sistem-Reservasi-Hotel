<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;
use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings = Booking::with(['user','room'])
            ->where('status', '!=', 'completed')
            ->latest()
            ->get();

        $totalRooms = Room::count();

        $occupiedRooms = Booking::where('status','occupied')
            ->count();

        $availableRooms = $totalRooms - $occupiedRooms;

        $revenue = Booking::whereIn('status', [
            'occupied',
            'completed'
        ])->sum('total_price');

        $todayRevenue = Booking::whereDate(
                'created_at',
                Carbon::today()
            )
            ->whereIn('status', [
            'occupied',
            'completed'
        ])
        ->sum('total_price');

        return view(
            'admin.dashboard',
            compact(
                'bookings',
                'totalRooms',
                'occupiedRooms',
                'availableRooms',
                'revenue',
                'todayRevenue'
            )
        );
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
            ->where('status', 'occupied')
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

    public function users()
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    public function changeRole(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with(
            'error',
            'Tidak bisa mengubah role akun sendiri'
            );
        }

        $user->role =
            $user->role === 'admin'
            ? 'user'
            : 'admin';

        $user->save();

        return back()->with(
            'success',
            'Role berhasil diubah'
        );
    }
}