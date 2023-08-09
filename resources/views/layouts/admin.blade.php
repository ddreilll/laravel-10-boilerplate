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
    <link href="{{ asset('/dist/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/libs/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/custom.css') }}" rel="stylesheet" />


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

<body>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none text-white">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="{{ asset('/static/logo-small-white.svg') }}" width="50" height="20" alt=""
                            class="navbar-brand-image">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">

                    <div class="d-none d-md-flex">

                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0 text-light" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications">
                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                                <span class="badge bg-yellow"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Notifications</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Change deprecated html tags to text decoration classes (#29604)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 2</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        justify-content:between ⇒ justify-content:space-between (#29734)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon text-yellow" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 3</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Update change-version.js (#29736)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon text-muted" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 4</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">
                                                        Regenerate package-lock.json (#29730)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon text-muted" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url({{ asset('/static/avatars/main.jpg') }})"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ auth()->user()->name }}</div>
                                <div class="mt-1 small">{{ auth()->user()->roles->pluck('title')[0] }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                                @can('profile_password_edit')
                                    <a href="{{ route('my-profile.edit') }}"
                                        class="dropdown-item">{{ trans('global.profile_settings') }}</a>
                                @endcan
                            @endif
                            <div class="dropdown-divider mb-0"></div>
                            <a href="#" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('global.logout') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @include('partials.menu')

        <div class="page-wrapper">
            <!-- Page header -->
            @yield('header')
            <!-- Page body -->
            <div class="page-body">

                <div class="container-xl">

                    @if (session('message'))
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {!! session('message') !!}
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="alert alert-secondary alert-dismissible" role="alert">
                                    {!! session('info') !!}
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    {!! session('warning') !!}
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <h3 class="mb-1">Something went wrong</h3>
                                    @if (sizeOf($errors->all()) == 1)
                                        <p>{{ $errors->first() }}</p>
                                    @elseif (sizeOf($errors->all()) > 1)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    &copy; {{ date('Y') }}
                                    <a href="." class="link-secondary">{{ trans('panel.site_title') }}</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="link-secondary" rel="noopener">
                                        v1.0.0
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

    <script src="{{ asset('/dist/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/dist/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/dist/js/tabler.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
            let printButtonTrans = '{{ trans('global.datatables.print') }}'
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn'
            });

            $.extend(true, $.fn.dataTable.defaults, {
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: '',
                        renderer: function(api, rowIdx, columns) {

                            var dl = $('<dl class="row" style="font-size: .9rem"/>');

                            columns.forEach((col, i) => {
                                if (col.hidden) {
                                    col.title = (col.title).trim();
                                    $(dl).append(`<dt class="col-5">${(col.title && col.title != "&nbsp;") ? col.title + ':' : ''}</dt>
                                <dd class="col-7">${col.data}</dd>`);
                                }
                            });

                            return columns.length >= 1 ? dl : false;
                        }
                    }
                },
                language: {
                    url: languages['{{ app()->getLocale() }}'],
                    buttons: {
                        pageLength: {
                            _: "Show %d entries",
                            '-1': "Show All"
                        }
                    }
                },
                columnDefs: [{
                    orderable: false,
                    searchable: false,
                    responsivePriority: 2,
                    targets: -1
                }, {
                    responsivePriority: 1,
                    targets: 0
                }, ],
                pageLength: 10,
                dom: `<'card'<'card-header row pb-2 mx-0 gy-2'<'text-muted col-lg-6 ps-0 d-flex justify-content-center justify-content-md-start'f><'col-lg-6 d-flex justify-content-lg-end'B>>
                        <'card-body p-0'<t>>
                       <'card-footer card-datatable row'<'col-md-6 d-flex justify-content-center justify-content-md-start text-muted pt-2'i><'col-md-6'p>>>`,
                buttons: [{
                        extend: 'pageLength',
                        className: 'btn-default',
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-default',
                        text: "{{ __('Visible Columns') }}",
                        columns: ':visible:not(:last-child)'
                    },
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [{
                                extend: 'excel',
                                className: 'btn-default',
                                text: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                    <path d="M8 11h8v7h-8z"></path>
                                    <path d="M8 15h8"></path>
                                    <path d="M11 11v7"></path>
                                    </svg> Excel`,
                                exportOptions: {
                                    columns: ':visible:not(:last-child)'
                                }
                            },
                            {
                                extend: 'pdf',
                                className: 'btn-default',
                                text: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 8v8h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-2z"></path>
                                <path d="M3 12h2a2 2 0 1 0 0 -4h-2v8"></path>
                                <path d="M17 12h3"></path>
                                <path d="M21 8h-4v8"></path>
                                </svg> PDF`,
                                exportOptions: {
                                    columns: ':visible:not(:last-child)'
                                }
                            },
                            {
                                extend: 'print',
                                className: 'btn-default',
                                text: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"></path>
                                </svg> Print`,
                                exportOptions: {
                                    columns: ':visible:not(:last-child)'
                                }
                            }
                        ]
                    },
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
        });
    </script>

    <script type="text/javascript">
        const pluralized = function(word, size) {
            if (size > 1) {
                return `${word}s`;
            } else {
                return word;
            }
        };

        const initializedFormSubmitConfirmation = function(dom, formId, action, btnColor, icon = "info") {

            $(`${dom}`).on("click", function(e) {
                e.preventDefault();

                var resourceId = $(this).attr("data-id");

                Swal.fire({
                    text: ("{{ __('modal.confirmation', ['action' => ':action']) }}")
                        .replace(
                            ":action",
                            action),
                    icon: icon,
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: (
                            "{{ __('modal.confirm_btn', ['action' => ':action']) }}")
                        .replace(
                            ":action", action),
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: `btn btn-${btnColor}`,
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.value) {
                        $(`form#${resourceId}${formId}`).submit();
                    }
                });
            });
        }
    </script>

    @yield('scripts')

</body>

</html>
