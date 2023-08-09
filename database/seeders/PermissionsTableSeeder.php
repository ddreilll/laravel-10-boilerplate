<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'system_setup_access',
            ],
            [
                'title' => 'system_backup_create',
            ],
            [
                'title' => 'system_backup_download',
            ],
            [
                'title' => 'system_backup_delete',
            ],
            [
                'title' => 'system_backup_access',
            ],
            [
                'title' => 'system_error_logs_access',
            ],
            [
                'title' => 'profile_password_edit',
            ],
            [
                'title' => 'user_management_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
