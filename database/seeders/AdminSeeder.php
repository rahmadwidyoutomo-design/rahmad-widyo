<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'rahmadwidyoutomo@gmail.com'],
            [
                'name'     => 'Rahmad Widyo',
                'password' => bcrypt('admin123'),
            ]
        );

        $admin->assignRole($adminRole);
    }
}
