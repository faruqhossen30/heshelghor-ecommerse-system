@extends('marchant.auth.layouts')
@section('title')
Log In | Heshelghor
@endsection
@section('content')

<div class="card">

    <div class="card-body p-4">

        <div class="text-center w-75 m-auto">
            <div class="auth-logo">
                <a href="#" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo.jpg" alt="Heshel Ghor" height="50" width="200">
                    </span>
                </a>
                <p class="m-1 text-secondary">Merchant Login</p>

            </div>
        </div>
        <form method="POST" action="{{ route('marchant.login') }}">
            @csrf
            <div class="mb-2">
                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="mb-2">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <div class="input-group input-group-merge">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>



                <div class="d-grid mb-0 text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

        </form>

        <div class="row">
            <div class="col-12 text-center">
                <p class="text-muted">Don't have account? <a href="{{route('marchant.register')}}" class="text-primary fw--medium ms-1">Register Now !</a></p>
            </div>
        </div>
    </div> <!-- end card-body -->
</div>


@endsection
