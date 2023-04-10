@extends('layouts.front_layout.front_layout')

@section('content')
<!-- Breadcrumb Area start -->

<!-- Breadcrumb Area End -->
<!-- login area start -->
<div class="login-register-area mb-60px mt-53px">
    <div class="container">

        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="test-title text-center">
                                <h3 class="">Login Page</h3>
                                <img src="{{ asset('front2') }}/images/line2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                                <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="row justify-content-center align-self-center">
                                                <button type="submit"><span>Login</span></button>
                                            </div>
                                        </div>
                                        {{-- <a href="{{ url('login/github') }}" class="mt-3 btn btn-block btn-social btn-github">
                                            <span class="fab fa-github"></span>Login With GitHub</a>

                                        <a href="{{ url('login/google') }}" class=" mt-3 btn btn-block btn-social btn-dropbox">
                                            <span class="fab fa-google"></span>Login With Google</a> --}}
                                    </form>
                                    <a href="{{ url('/register') }}" class="text-center btn btn-success btn-sm mb-5">Create a new account ?</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
