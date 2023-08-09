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
    <title>{{ trans('panel.site_title') }}</title>

    @laravelPWA

    <!-- CSS files -->
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/libs/fontawesome-pro/css/all.css') }}" rel="stylesheet" />

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

            @yield('content')

        </div>
    </div>
    <script src="{{ asset('/dist/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('/dist/js/tabler.min.js') }}"></script>

    @yield('scripts')
</body>

</html>
