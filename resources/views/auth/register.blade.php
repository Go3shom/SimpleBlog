@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ __('Register') }}</h1>

                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>

                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="form-label">{{ __('Userame') }}</label>

                                <input id="username" name="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="row justify-content-endh">
                                <div class="col-sm-12 offset-md-8">
                                    <a href="{{ url('/') }}" class="btn btn-outline-primary">
                                        {{ __('Cancel') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
