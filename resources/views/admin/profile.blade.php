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

        <div>
            <h3 class="mt-5">Linked Accounts</h3>
            <div class="mt-3">
                <div class="my-2">
                    <a href="{{ url('/auth/authentik/redirect') }}" class="btn btn-outline-dark d-flex flex-row justify-content-center align-items-center p-2" style="width: fit-content">
                        <span class="icon pe-2"><img src="{{ config('services.authentik.icon') }}" alt="icon" height="24" width="24"></span>
                        Login with Artichoke Technologies (Authentik)
                    </a>
                </div>
            @foreach($connections as $connection)
                <div class="border rounded-2">
                    <div class="p-2 d-flex flex-row align-items-center justify-content-between">
                        <div class="d-flex flex-row justify-content-start align-items-center">
                            <span><img src="{{ config('services.authentik.icon') }}" alt="icon" class="me-2" width="32" height="32"></span>
                            <div class="text-lg pe-2">
                                @if($connection->provider == 'authentik')
                                    Artichoke Technologies (Authentik)
                                @else
                                    {{ ucfirst($connection->provider) }}
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('oauth.disconnect', $connection->provider) }}" class="btn btn-sm btn-outline-danger">Unlink</a>
                    </div>
                </div>
            @endforeach

        </div>

        <form action="{{ route('profile.password.update') }}" method="post">
            <h3 class="mt-5">Change Password</h3>
            @csrf
            <div class="form-group mt-2">
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
