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
        <th>Aksi</th>
    </tr>

    @foreach($rooms as $room)

    <tr>

        <td>{{ $room->room_number }}</td>

        <td>{{ $room->room_type }}</td>

        <td>{{ $room->price }}</td>

        <td>

            <a href="{{ route('rooms.edit',$room) }}"
               class="btn btn-warning">
                Edit
            </a>

            <form
                action="{{ route('rooms.destroy',$room) }}"
                method="POST"
                style="display:inline">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>