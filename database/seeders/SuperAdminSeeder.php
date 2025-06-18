<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    $user = User::updateOrCreate(
        ['email' => 'admin@example.com'],
        [
            'first_name' => 'Mohammed',
            'last_name' => 'El Abdellaoui',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
        ]
    );

    $role = Role::firstOrCreate(['name' => 'super admin']);
    $user->assignRole($role);
}

}
