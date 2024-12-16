@extends('adminlte::page')

@section('title', $user ?? 'Create User')

@section('content')
<div class="container">
    <h1>{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>
    <form action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" value="{{ $user->login ?? old('login') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email ?? old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
            @if(isset($user))
                <small class="form-text text-muted">Leave blank to keep the current password.</small>
            @endif
        </div>

        <div class="form-group">
            <label for="roles">Roles</label>
            <select name="roles[]" class="form-control" multiple required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" 
                        {{ isset($user) && $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_blocked">is Blocked?</label>
            <input type="checkbox" name="is_blocked" @if($user->is_blocked == 1) checked @endif class="form-control" value="1">
        </div>

        <div class="form-group">
            <label for="min_sum">Min Sum</label>
            <input type="number" step="any" name="min_sum" class="form-control" value="{{ $user->min_sum ?? old('min_sum') }}">
        </div>

        <div class="form-group">
            <label for="sum_transfer">Sum Transfer</label>
            <input type="number" step="any" name="sum_transfer" class="form-control" value="{{ $user->sum_transfer ?? old('sum_transfer') }}">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($user) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection