@extends('adminlte::page')

@section('title', 'Users')

@section('content')
<div class="container">
    <h1>Users</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add User</a>
    <form action="{{ route('admin.users.index') }}" method="GET" class="row">
        <div class="form-group col-2">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" value="{{ request()->has('login') ? request()->get('login') : '' }}">
        </div>
        <div class="form-group col-2">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control" value="{{ request()->has('email') ? request()->get('email') : '' }}">
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-danger" style="display: flex;align-content: center;flex-wrap: wrap;" class="btn btn-danger">Clear</a>
        <button type="submit" class="btn btn-success" style="margin-left: 25px;">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection