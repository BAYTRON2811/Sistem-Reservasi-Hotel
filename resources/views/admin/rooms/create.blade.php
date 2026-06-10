<form action="{{ route('rooms.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="text"
           name="room_number"
           placeholder="Nomor Kamar"
           class="form-control mb-2">

    <input type="text"
           name="room_type"
           placeholder="Tipe Kamar"
           class="form-control mb-2">

    <input type="number"
           name="price"
           placeholder="Harga"
           class="form-control mb-2">

    <textarea name="description"
              class="form-control mb-2"></textarea>

    <input type="file"
           name="image"
           class="form-control mb-2">

    <button class="btn btn-primary">
        Simpan
    </button>

</form>