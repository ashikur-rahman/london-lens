<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(

            [
                'email' => 'admin@londonlens.co.uk'
            ],

            [

                'name' => 'Super Admin',

                'password' => Hash::make('Admin@123')

            ]

        );

        $user->assignRole('Super Admin');

        $user->syncPermissions(
            Permission::all()
        );
    }
}
