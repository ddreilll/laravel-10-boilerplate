@extends('layouts.app')

@section('content')
    <form class="card card-md" method="POST" action="{{ route('twoFactor.check') }}" autocomplete="off" novalidate>
        @csrf

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

            <h2 class="card-title text-center mb-4">{{ __('global.two_factor.title') }}</h2>
            <p class="text-muted mb-4">{{ __('global.two_factor.sub_title', ['minutes' => 15]) }}</p>

            <p class="text-muted mb-4">{{ __('global.two_factor.sent_to', ['email' => maskEmail(Auth::user()->email)]) }}
            </p>

            <div class="mb-3">
                <label class="form-label">{{ trans('global.two_factor.code') }}</label>
                <input name="two_factor_code" type="text"
                    class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus>
                @if ($errors->has('two_factor_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('two_factor_code') }}
                    </div>
                @endif
            </div>
            <div class="form-footer">

                <button type="submit" class="btn btn-primary w-100">
                    {{ __('global.two_factor.verify') }}
                </button>

                <a href="{{ route('twoFactor.resend') }}" class="btn btn-default w-100 mt-2">
                    <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-share" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M13 19h-8a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v6"></path>
                        <path d="M3 7l9 6l9 -6"></path>
                        <path d="M16 22l5 -5"></path>
                        <path d="M21 21.5v-4.5h-4.5"></path>
                    </svg>
                    {{ __('global.two_factor.resend') }}
                </a>
            </div>
        </div>
    </form>

    <div class="text-center text-muted mt-3">
        Forget it, <a class="text-primary" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
            href="#">send me back</a> to the log in screen.
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
