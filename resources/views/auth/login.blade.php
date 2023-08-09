<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ trans('panel.site_title') }} | {{ trans('global.login') }}</title>

    @laravelPWA

    <!-- CSS files -->
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body bg-primary text-white">

                    <div class="text-center">
                        <a href="." class="navbar-brand navbar-brand-autodark"><img
                                src="{{ asset('/static/logo-white.svg') }}" height="90" width="300" alt=""></a>
                    </div>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @if (sizeOf($errors->all()) == 1)
                                <p>{{ $errors->first() }}</p>
                            @elseif (sizeOf($errors->all()) > 1)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" autocomplete="off"
                        login-form-component="loginForm" novalidate>
                        @csrf

                        <div class="mb-3 form-group">
                            <label class="form-label">{{ trans('global.login_email') }}</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="{{ trans('global.login_email') }}" autocomplete="off" autofocus
                                name="email" required="true" value="{{ old('email', null) }}"
                                required-validation-massage="{{ trans('validation.required', ['attribute' => 'email']) }}">

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-2 form-group">
                            <label class="form-label">
                                {{ trans('global.login_password') }}
                            </label>
                            <input type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="{{ trans('global.login_password') }}" autocomplete="off" required="true"
                                name="password"
                                validation-massage="{{ trans('validation.required', ['attribute' => 'password']) }}">

                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" />
                                <span class="form-check-label">{{ trans('global.remember_me') }}</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100"> {{ trans('global.login') }}</button>
                        </div>
                    </form>

                    <p class="text-center mt-5"> &copy; {{ date('Y') }}
                        <a href="." class="link-secondary">{{ trans('panel.site_title') }}</a>. <br>
                        All rights reserved.
                    </p>
                    <p class="text-center">
                        <a href="#" class="link-secondary" rel="noopener">
                            v1.0.0
                        </a>
                    </p>
                </div>

            </div>
        </div>

    </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('/dist/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/dist/js/tabler.min.js') }}"></script>

    <script>
        $(function() {

            const attr = "login-form-component";


            $(`form[${attr}="loginForm"]`).validate({
                rules: {
                    "email": {
                        required: true,
                        email: true,
                    },
                    "password": {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "{{ __('validation.required', ['attribute' => 'email']) }}",
                        email: "{{ __('validation.email', ['attribute' => 'email']) }}"
                    },
                    password: {
                        required: "{{ __('validation.required', ['attribute' => 'password']) }}",
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });

        });
    </script>

</body>

</html>
