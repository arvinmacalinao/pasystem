@extends('layouts.guest')

@section('content')
    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                    <h1 class="mb-4">{{ __('Login') }}</h1>
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('users.login') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                      </svg></span>
                            <input class="form-control form-control-sm @error('email_or_username') is-invalid @enderror" type="text" name="email_or_username"
                                   placeholder="{{ __('Email/Username') }}" required autofocus>
                            @error('email_or_username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                      </svg></span>
                            <input class="form-control form-control-sm @error('password') is-invalid @enderror" type="password"
                                   name="password"
                                   placeholder="{{ __('Password') }}" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-6 text-end">
                                    <a href="{{ route('password.request') }}" class="btn btn-link px-0"
                                       type="button">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('images/EPAlogo.png') }}" alt="" style="max-width: 100%; max-height: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection