<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
    // Ambil semua data kamar dari database
        $rooms = Room::all(); 
    
        if(request()->is('admin/*'))
        {
            return view(
                'admin.rooms.index',
                compact('rooms')
            );
        }
    // Atau jika Anda hanya ingin menampilkan kamar yang tersedia:
    // $rooms = Room::where('status', 'available')->get();

    // Kirim data ke view
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $image = null;

        if ($request->hasFile('image'))
        {
            $image = $request->file('image')
                ->store('rooms', 'public');
        }

        Room::create([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image,
            'status' => true
        ]);

        return redirect()
            ->route('admin.dashboard');
    }
    public function update(Request $request, Room $room)
    {
        $room->update([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('rooms.index');
    }
    public function destroy(Room $room)
    {
        if ($room->image)
        {
            Storage::disk('public')
                ->delete($room->image);
        }

        $room->delete();

        return back();
    }
}