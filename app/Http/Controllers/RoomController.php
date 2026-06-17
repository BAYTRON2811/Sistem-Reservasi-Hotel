<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $request->validate([
        'room_number' => 'required|unique:rooms,room_number',
        'room_type' => 'required',
        'price' => 'required|numeric|min:0',
        ], [
            'room_number.unique' => 'Nomor kamar sudah digunakan.'
        ]);
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

        return redirect('/admin/rooms');
    }
    public function update(Request $request, Room $room)
    {
        $request->validate([
        'room_number' => [
            'required',
            Rule::unique('rooms', 'room_number')
                ->ignore($room->id)
        ],
        'room_type' => 'required',
        'price' => 'required|numeric|min:0',
        ], [
            'room_number.unique' => 'Nomor kamar sudah digunakan.'
        ]);

        $data = [
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'price' => $request->price,
            'description' => $request->description,
        ];

        // Jika ada foto baru
        if ($request->hasFile('image'))
        {
            // Hapus foto lama
            if ($room->image)
            {
                Storage::disk('public')->delete($room->image);
            }

            // Simpan foto baru
            $data['image'] = $request->file('image')
            ->store('rooms', 'public');
        }

        elseif ($request->has('remove_image'))
        {
            if ($room->image)
                {
                    Storage::disk('public')->delete($room->image);
                }
            $data['image'] = null;
        }

        $room->update($data);

        return redirect('/admin/rooms');
    }
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
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