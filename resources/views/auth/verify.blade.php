@extends('layouts.app')

@section('content')
    <div class="card card-md">

        <div class="card-body bg-primary text-white">

            <div class="text-center">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('/static/logo.png') }}"
                        height="90" alt=""></a>
            </div>
        </div>

        <div class="card-body">
            @if (session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

            <h2 class="card-title text-center mb-4">{{ __('Verify Your Email Address') }}</h2>

            {{ __('Before proceeding, please check your email for a verification link.') }}

            <p class="text-muted my-4">{{ __('global.two_factor.sent_to', ['email' => maskEmail(Auth::user()->email)]) }}
            </p>
            <div class="form-footer">

                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-default w-100">
                        {{ __('Not received? Request another') }}
                    </button>.
                </form>
            </div>
        </div>
    </div>

    <div class="text-center text-muted mt-3">
        Forget it, <a class="text-primary" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
            href="#">send me back</a> to the log in screen.
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
