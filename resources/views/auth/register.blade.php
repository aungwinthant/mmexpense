@extends('layouts.app')

@include('layouts.navbar')

@section('content')
<div class="auth-body">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="text-center border border-light p-5">
                        @csrf

                        <div class="form-group md-form">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mb-4" name="name" value="{{ old('name') }}" required autofocus placeholder="Username">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group md-form">

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-4" name="email" value="{{ old('email') }}" required placeholder="Email Address">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group md-form">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} mb-4" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group md-form">
                            <input id="password-confirm" type="password" class="form-control mb-4" name="password_confirmation" required placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-default btn-block ">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
