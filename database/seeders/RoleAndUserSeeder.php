<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'CSM Administrator']);
        $managerRole = Role::firstOrCreate(['name' => 'Customer Service Manager']);
        $agentRole = Role::firstOrCreate(['name' => 'Customer Service Agent']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@csm.com'],
            [
                'name' => 'CSM Admin',
                'password' => Hash::make('password')
            ]
        );

        // Assign role
        if (!$admin->hasRole('CSM Administrator')) {
            $admin->assignRole($adminRole);
        }
    }
}
