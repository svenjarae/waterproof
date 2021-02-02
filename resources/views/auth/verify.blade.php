@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-container">
        <div>
            <div>
                <div>{{ __('Verify Your Email Address') }}</div>

                <div>
                    @if (session('resent'))
                        <div class="">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
