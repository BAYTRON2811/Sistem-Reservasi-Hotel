@extends('layouts.admin')

@section('content')

<h2>Kelola User</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->role == 'admin')
                    <span class="badge bg-success">
                        Admin
                    </span>
                @else
                    <span class="badge bg-secondary">
                        User
                    </span>
                @endif
            </td>

            <td>
                <form method="POST"
                    action="{{ route('admin.users.role',$user) }}">
                    @csrf

                    <button class="btn btn-warning btn-sm">
                        Ubah Role
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection