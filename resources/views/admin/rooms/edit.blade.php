@extends('layouts.admin')

@section('content')

<div class="container mt-5">

    <h2>Edit Kamar</h2>

    <form action="{{ route('admin.rooms.update', $room->id) }}"
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nomor Kamar</label>
            <input type="text"
                   name="room_number"
                   value="{{ old('room_number', $room->room_number ?? '') }}"
                   class="form-control">
            @error('room_number')
                <div class="text-danger mt-1">
                {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Tipe Kamar</label>
            <input type="text"
                   name="room_type"
                   value="{{ $room->room_type }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number"
                   name="price"
                   value="{{ $room->price }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                      class="form-control">{{ $room->description }}</textarea>
        </div>

        
        <div class="mb-3">
            <label>Foto Kamar</label>
            
            <!-- Tampilkan foto lama jika ada -->
            @if($room->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $room->image) }}" 
                         alt="Foto Kamar" 
                         class="img-thumbnail" 
                         width="200">
                    <br>
                    <small class="text-muted">Foto saat ini</small>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" 
                           type="checkbox" 
                           name="remove_image" 
                           id="remove_image" 
                           value="1">
                    <label class="form-check-label text-danger" for="remove_image">
                        Hapus foto ini
                    </label>
                </div>
            @endif

            <!-- Input untuk foto baru -->
            <input type="file"
                   name="image"
                   class="form-control"
                   accept="image/*">
            <small class="text-muted">Pilih foto baru jika ingin mengubah foto. Kosongkan jika tidak.</small>
        </div>

        <button class="btn btn-primary">
              Update
        </button>

    </form>

</div>
@endsection