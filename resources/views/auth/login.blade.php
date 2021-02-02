@extends('layouts.app')

@section('content')
<div class="container register-margin-top">
        <div class="content">

            <h2 class="auth-form-header">{{ __('Login') }}</h2>

            <div class="login-form-container shadow content-animate">
                <div>
                    <form class="login-form content-animate" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div>
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="error-form">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="password-container">
                            <label for="password">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="error-form">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="box-wrapper">
                                <button class="submit-btn_form special-button mid-margin-top" type="submit">
                                   <span class="paragraph-bright">{{ __('Login') }}</span> 
                                </button>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                    <a href="{{ route('register') }}">
                                        <p>No Account yet?</p>
                                        <span class="link">Create one</span>.
                                    </a>
                                    
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
