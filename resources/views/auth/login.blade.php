@extends('layouts.app')

@include('layouts.navbar')

@section('content')
<div class="auth-body">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form class="text-center border border-light p-5" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group md-form">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mb-4" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

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

                        <div class="form-group row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-block ">
                            {{ __('Login') }}
                        </button>
                            <a  href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

@endsection
