<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

            'dashboard.view',

            'users.view',
            'users.create',
            'users.edit',
            'users.delete',

            'products.view',
            'products.create',
            'products.edit',
            'products.delete',

            'categories.view',
            'categories.create',
            'categories.edit',
            'categories.delete',

            'orders.view',
            'orders.edit',

            'downloads.view',

            'blog.view',
            'blog.create',
            'blog.edit',
            'blog.delete',

            'coupons.view',
            'coupons.create',
            'coupons.edit',
            'coupons.delete',

            'reports.view',

            'settings.view',
            'settings.edit'

        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);

        }
    }
}
