@extends('layouts.admin')

@section('content')

<h2>Kelola Kamar</h2>

<a href="{{ route('rooms.create') }}"
   class="btn btn-success mb-3">
   Tambah Kamar
</a>

<table class="table">

    <tr>
        <th>No Kamar</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    @foreach($rooms as $room)

    <tr>

        <td>{{ $room->room_number }}</td>

        <td>{{ $room->room_type }}</td>

        <td>{{ $room->price }}</td>

        <td>
            @if($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" 
                     alt="Foto Kamar {{ $room->room_number }}" 
                     width="80" 
                     class="img-thumbnail">
            @else
                <span class="text-muted">Tidak ada foto</span>
            @endif
        </td>

        <td>

            <a href="{{ route('rooms.edit',$room) }}"
               class="btn btn-warning">
                Edit
            </a>

            <form action="{{ route('rooms.destroy', $room->id) }}"
                method="POST"
                style="display:inline"
                onsubmit="return confirm('Yakin ingin menghapus kamar ini?');">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>
@endsection