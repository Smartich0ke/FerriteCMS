@extends('layouts.admin')
@section('content')
<div class="m-5">
    <h1 class="mb-3">Profile</h1>
    <div >
        <h3>{{ auth()->user()->name }}</h3>
        <div>{{ auth()->user()->email }}</div>
    </div>

    <div>
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="text" value="{{ auth()->user()->email }}" name="email" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>

        <form action="{{ route('profile.password.update') }}" method="post">
            @csrf
            <div class="form-group mt-5">
                <label for="password">Old Password</label>
                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">
                @error('current_password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Change Password</button>
        </form>
    </div>
</div>
@endsection
