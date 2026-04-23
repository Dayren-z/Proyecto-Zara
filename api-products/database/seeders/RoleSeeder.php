<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $clientRole = Role::firstOrCreate(['name' => 'cliente']);

        User::firstOrCreate(
            ['email' => 'admin@zarahome.com'],
            [
                'name' => 'Admin Zara Home',
                'password' => Hash::make('12345678'),
                'role_id' => $adminRole->id
            ]
        );
    }
}
