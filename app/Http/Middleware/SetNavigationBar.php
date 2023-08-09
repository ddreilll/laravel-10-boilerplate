<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;

class SetNavigationBar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request);
        }

        $navigation = [
            [
                "title" => "Dashboard",
                "url" => route('home'),
                "active" => request()->routeIs('home'),
                "icon_class" => "fa-light fa-chart-mixed",
                "children" => []
            ]
        ];

        // User and Access Management
        if (Gate::check(['role_access', 'user_access'])) {

            $userAccessManagement = [
                "title" => "User & Access Management",
                "url" => "#",
                "icon_class" => "fa-light fa-user-unlock",
                "children" => []
            ];

            // Roles
            if (Gate::check('role_access')) {
                array_push($userAccessManagement['children'], [
                    "title" => trans('cruds.role.title'),
                    "active" => (request()->is('roles*')),
                    "url" => route('roles.index'),
                    "children" => []
                ]);
            }

            // Users
            if (Gate::check('user_access')) {
                array_push($userAccessManagement['children'], [
                    "title" => trans('cruds.user.title'),
                    "active" => (request()->is('users*')),
                    "url" => route('users.index'),
                    "children" => []
                ]);
            }

            array_push($navigation, $userAccessManagement);
        }

        // System Tools and Maintenance
        // if (Gate::check(['audit_log_access', 'user_alert_access'])) {

        //     $systemToolsMaintenanace = [
        //         "title" => "System Tools & Maintenance",
        //         "url" => "#",
        //         "icon_class" => "fa-light fa-screwdriver-wrench",
        //         "children" => []
        //     ];

        //     // Audit Logs
        //     if (Gate::check('audit_log_access')) {
        //         array_push($systemToolsMaintenanace['children'], [
        //             "title" => trans('cruds.auditLog.title'),
        //             "active" => (request()->is('audit-logs*')),
        //             "url" => route('audit-logs.index'),
        //             "children" => []
        //         ]);
        //     }

        //     // User Alerts
        //     if (Gate::check('user_alert_access')) {
        //         array_push($systemToolsMaintenanace['children'], [
        //             "title" => trans('cruds.userAlert.title'),
        //             "active" => (request()->is('user-alerts*')),
        //             "url" => route('user-alerts.index'),
        //             "children" => []
        //         ]);
        //     }

        //     array_push($navigation, $systemToolsMaintenanace);
        // }

        // if ($user->isAdmin) {
        //     View::share('layout', 'admin');

        //     if (Gate::check('office_access')) {

        //         array_push($navigation, [
        //             "title" => "Menu",
        //             "url" => "#",
        //             "icon_class" => "fa-light fa-square-list fa-lg",
        //             "children" => [
        //                 [
        //                     "title" => trans('cruds.officeManagement.title'),
        //                     "active" => (request()->is('admin/offices*')),
        //                     "url" => "#",
        //                     "children" => [
        //                         [
        //                             "title" => trans('cruds.office.title'),
        //                             "active" => request()->is('admin/offices*'),
        //                             "url" => route('offices.index'),
        //                             "children" => []
        //                         ]
        //                     ]
        //                 ]
        //             ]
        //         ]);
        //     }

        //     if (Gate::check('user_alert_access')) {

        //         array_push($navigation, [
        //             "title" => "Tools",
        //             "url" => "#",
        //             "icon_class" => "fa-light fa-toolbox fa-lg",
        //             "children" => [
        //                 [
        //                     "title" => trans('cruds.userAlert.title'),
        //                     "active" => (request()->is('admin/user-alerts*')),
        //                     "url" => route('user-alerts.index'),
        //                     "children" => []
        //                 ]
        //             ]
        //         ]);
        //     }

        //     if (Gate::check('user_access') || Gate::check('permission_access') || Gate::check('role_access') || Gate::check('audit_log_access')) {
        //         array_push($navigation, [
        //             "title" => "System Settings",
        //             "url" => "#",
        //             "icon_class" => "fa-light fa-gears fa-lg",
        //             "children" => [
        //                 [
        //                     "title" => trans('cruds.permission.title'),
        //                     "icon_class" => "fas fa-unlock-alt",
        //                     "active" => (request()->is('admin/permissions') || request()->is('admin/permissions/*')),
        //                     "url" => route('permissions.index'),
        //                     "children" => []
        //                 ],
        //                 [
        //                     "title" => trans('cruds.role.title'),
        //                     "icon_class" => "fas fas fa-briefcase",
        //                     "active" => (request()->is('admin/roles') || request()->is('admin/roles/*')),
        //                     "url" => route('roles.index'),
        //                     "children" => []
        //                 ],
        //                 [
        //                     "title" => trans('cruds.user.title'),
        //                     "icon_class" => "fas fas fa-user",
        //                     "active" => (request()->is('admin/users') || request()->is('admin/users/*')),
        //                     "url" => route('users.index'),
        //                     "children" => []
        //                 ],
        //                 [
        //                     "title" => trans('cruds.auditLog.title'),
        //                     "icon_class" => "fas fa-file-alt",
        //                     "active" => (request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*')),
        //                     "url" => route('audit-logs.index'),
        //                     "children" => []
        //                 ]
        //             ]
        //         ]);
        //     }
        // } else {
        //     View::share('layout', 'user');
        // }

        View::share('navigation', $navigation);

        return $next($request);
    }
}
