@extends('marchant.auth.layouts')
@section('title')
Register | Heshelghor
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
                <p class="m-1 text-secondary">Merchant Register</p>

            </div>
        </div>

        <form method="POST" action="{{ route('marchant.register') }}">
            @csrf
            <div class="mb-2">
                <label for="fullname" class="form-label">{{ __('Name') }}</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="fullname" placeholder="Enter your name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="emailaddress" class="form-label">{{ __('E-Mail Address') }}</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" id="emailaddress" required placeholder="Enter your email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="mb-2">
                <label for="phone-number" class="form-label">{{ __('Phone Number') }}</label>
                <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" id="phone-number" required placeholder="Enter your phone number">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="fullname" class="form-label">{{ __('Address') }}</label>
                <input class="form-control @error('address') is-invalid @enderror" name="address" type="text" id="fullname" placeholder="Enter your name">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">

                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-2">
                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Enter your password" required>
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>

                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkbox-signup">
                    <label class="form-check-label" for="checkbox-signup">
                        I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a>
                    </label>
                </div>
            </div>

            <div class="d-grid text-center">
                <button class="btn btn-primary" type="submit"> {{ __('Register') }} </button>
            </div>

        </form>

        {{-- <div class="text-center">
            <h5 class="mt-3 text-muted">Sign Up using</h5>
            <ul class="social-list list-inline mt-3 mb-0">
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="mdi mdi-facebook"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                </li>
            </ul>
        </div> --}}

        <br>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="text-muted">Already have account? <a href="{{route('marchant.login')}}" class="text-primary fw--medium ms-1">Sign In</a></p>
            </div>
        </div>

    </div> <!-- end card-body -->
</div>





@endsection
