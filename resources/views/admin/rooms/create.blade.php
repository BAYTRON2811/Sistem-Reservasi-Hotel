@extends('layouts.admin')

@section('content')

<div class="container mt-5">

       <h2>Tambah Kamar</h2>
       <form action="{{ route('rooms.store') }}"
              method="POST"
              enctype="multipart/form-data">

              @csrf

              <label>Nomor Kamar</label>
              <input type="text"
                     name="room_number"
                     !!placeholder="Nomor Kamar"!!
                     class="form-control mb-2">
              @error('room_number')
              <div class="text-danger mt-1">
                     {{ $message }}
              </div>
              @enderror

              <label>Tipe Kamar</label>
              <input type="text"
                     name="room_type"
                     class="form-control mb-2">

              <label>Harga Kamar</label>
              <input type="number"
                     name="price"
                     class="form-control mb-2">

              <label>Deskripsi</label>
              <textarea name="description"
                     class="form-control mb-2"></textarea>

              <input type="file"
                     name="image"
                     class="form-control mb-2">

              <button class="btn btn-primary">
              Simpan
              </button>

       </form>
</div>
@endsection