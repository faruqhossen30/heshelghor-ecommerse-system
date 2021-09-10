@extends('marchant.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Marchat Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! as Marchant') }}
                        <br>
                        <hr>
                        <p>
                            @guest('marchant')
                                Your Are guest
                            @endguest
                            @auth('marchant')
                                Your are Marchant
                            @endauth
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
