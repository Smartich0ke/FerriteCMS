@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">
    <h1>Login</h1>

        @if(config('services.authentik.enabled'))
            <a href="{{ url('/auth/authentik/redirect') }}" class="btn btn-outline-dark d-flex flex-row justify-content-center align-items-center p-2">
                <span class="icon pe-2"><img src="{{ config('services.authentik.icon') }}" alt="icon" height="24" width="24"></span>
                Login with Artichoke Technologies (Authentik)
            </a>
        @endif
        <form method="POST" action="{{ route('login') }}">
            <div class="d-flex flex-column justify-content-center align-items-center">
                @csrf

                <div class="mb-1">
                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="my-1">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-check my-1 d-flex flex-row justify-content-start w-100">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <div class="my-1 d-flex flex-row justify-content-start w-100">
                        <a class="btn btn-link text-center p-0" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
                <div class="mt-2 d-flex flex-row justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
</div>
@endsection
