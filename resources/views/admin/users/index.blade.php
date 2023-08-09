@extends('layouts.admin')

@section('header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col text-center text-md-start">
                    <div class="page-pretitle">
                        User & Access Management
                    </div>
                    <h2 class="page-title d-inline">
                        {{ __('cruds.user.title') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mb-3 gy-2">
        <div class="col-md-6">
            <div class="card card-sm">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green text-white avatar">
                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium" user-account-component="onlineUserText">
                                {{ $onlineUsers }}
                                {{ pluralized('user', $onlineUsers) }}</div>
                            <div class="small">
                                <span class="badge bg-green"></span> Online
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn" user-account-component="filterOnlineBtn" value="0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter-plus"
                                    width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M12 20l-3 1v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3">
                                    </path>
                                    <path d="M16 19h6"></path>
                                    <path d="M19 16v6"></path>
                                </svg>
                                More details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @can('system_setup_access')
            <div class="col-md-6">
                <div class="row gy-2">
                    <div class="col-xl-6">
                        <div class="card card-sm">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-secondary text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-shield-lock" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3">
                                                </path>
                                                <path d="M12 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                <path d="M12 12l0 2.5"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">Two-Factor Authentication</div>

                                    </div>
                                    <div class="col-auto">
                                        <form method="POST" action="{{ route('users.updateConfig', $twoFactorKey) }}"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf
                                            @if ($twoFactor == 'on')
                                                <button type="submit" value="off" name="value"
                                                    class="btn btn-success">ON</button>
                                            @else
                                                <button type="submit" value="on" name="value"
                                                    class="btn btn-danger">OFF</button>
                                            @endif
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card card-sm">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-secondary text-white avatar">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-mail-check" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M11 19h-6a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v6">
                                                </path>
                                                <path d="M3 7l9 6l9 -6"></path>
                                                <path d="M15 19l2 2l4 -4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">Email Verification</div>

                                    </div>
                                    <div class="col-auto">

                                        <form method="POST" action="{{ route('users.updateConfig', $emailVerifiedKey) }}"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf
                                            @if ($emailVerified == 'on')
                                                <button type="submit" value="off" name="value"
                                                    class="btn btn-success">ON</button>
                                            @else
                                                <button type="submit" value="on" name="value"
                                                    class="btn btn-danger">OFF</button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>

    <table class="table card-table table-vcenter text-nowrap datatable datatable-User m-0">
        <thead>
            <tr>
                <th>
                    {{ trans('cruds.user.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.email') }}
                </th>
                @if (Config::get('panel.email_verified') == 'on')
                    <th>
                        {{ trans('cruds.user.fields.email_verified_at') }}
                    </th>
                @endif
                @if (Config::get('panel.2fa') == 'on')
                    <th>
                        {{ trans('cruds.user.fields.two_factor') }}
                    </th>
                @endif
                <th>
                    {{ trans('cruds.user.fields.roles') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.is_active') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.last_seen') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
        </thead>
    </table>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function() {

            const attr = "user-account-component";
            const resource = "user";

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let otherButtons = [{
                text: ` <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh me-0"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                            </svg>`,
                className: 'btn',
                action: function(e, dt, node, config) {

                    const icon = $(node).find("svg");

                    $(node).empty().append(
                        `<span class="spinner-border spinner-border-sm me-2" role="status"></span> Updating..`
                    );

                    dt.ajax.reload(function() {

                        $(node).empty().append(icon);

                    }, false);

                    $(node).attr("refresh-date", moment().format('YYYY-MM-DD HH:mm:ss'));
                },
                init: function(dt, node, config) {

                    const icon = $(node).find("svg");
                    $(node).empty().append(icon);

                    $(node).tooltip({
                        "title": function() {
                            return `Refreshed ${moment($(node).attr("refresh-date")).fromNow()}`;
                        },
                        "placement": "bottom"
                    });

                    $(node).on("click", function() {
                        $(node).tooltip("hide");
                    });
                },
                attr: {
                    'refresh-date': '{{ Carbon\Carbon::now() }}',
                    'user-account-component': "refreshBtn"
                }
            }];

            dtButtons = [...otherButtons, ...dtButtons];

            let dtOverrideGlobals = {
                buttons: dtButtons,
                serverSide: true,
                retrieve: true,
                searchDelay: 400,
                ajax: {
                    url: "{{ route('users.index') }}",
                    data: function(d) {
                        return $.extend({}, d, {
                            "filter": {
                                "is_online": $(`[${attr}="filterOnlineBtn"]`).val()
                            }
                        });
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                ],
                orderCellsTop: true,
                order: [
                    [0, 'asc']
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10', '25', '50', 'Show all']
                ],
                pageLength: -1,
                drawCallback: function(settings, json) {

                    initializedFormSubmitConfirmation(`[${resource}-destroy="true"]`,
                        `-${resource}-destroy`,
                        "delete", "danger", "warning");
                    initializedFormSubmitConfirmation(`[${resource}-update-status="true"]`,
                        `-${resource}-update-status`, "update", "warning", "warning");
                }
            };

            @if (Config::get('panel.email_verified') == 'on')
                dtOverrideGlobals.columns.push({
                    data: 'email_verified_at',
                    name: 'email_verified_at',
                    searchable: false,
                });
            @endif

            @if (Config::get('panel.2fa') == 'on')
                dtOverrideGlobals.columns.push({
                    data: 'two_factor',
                    name: 'two_factor',
                    orderable: false,
                    searchable: false,
                });
            @endif

            dtOverrideGlobals.columns = [...dtOverrideGlobals.columns, ...[{
                    data: 'roles',
                    name: 'roles.title',
                    orderable: false,
                    searchable: false,

                },
                {
                    data: 'is_active',
                    data: 'is_active',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'last_seen',
                    name: 'last_seen',
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return moment(data).fromNow();
                        }
                        return data;
                    },
                    searchable: false,
                }, {
                    data: 'actions',
                    name: '{{ trans('global.actions') }}'
                }
            ]];

            let table = $('.datatable-User').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on(
                'shown.bs.tab click',
                function(e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });

            // Filtration
            const filterOnBtnContent = $(`[${attr}="filterOnlineBtn"]`).html();
            $(`[${attr}="filterOnlineBtn"]`).on(
                "click",
                function() {
                    if ($(this).val() == "1") {
                        $(this).val("0").removeClass("btn-yellow");
                        $(this).empty().append(filterOnBtnContent);

                    } else {
                        $(this).val("1").addClass("btn-yellow");;
                        $(this).empty().append(`<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 4h12v2.172a2 2 0 0 1 -.586 1.414l-3.914 3.914m-.5 3.5v4l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227"></path>
                    <path d="M3 3l18 18"></path>
                    </svg> Remove filter`);
                    }

                    $(`button[${attr}="refreshBtn"]`).click();
                });

        });
    </script>
@endsection
