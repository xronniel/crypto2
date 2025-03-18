<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              // Create roles
              Role::create(['name' => 'Admin']);
              Role::create(['name' => 'User']);
      
              // Create admin user and assign Admin role
              $admin = User::create([
                  'name' => 'Admin User',
                  'email' => 'admin@cryptohomeelite.com',
                  'password' => bcrypt('password123')
              ]);
              $admin->assignRole('Admin');
      
              // Create normal user and assign User role
              $user = User::create([
                  'name' => 'Normal User',
                  'email' => 'user@cryptohomeelite.com',
                  'password' => bcrypt('password123')
              ]);
              $user->assignRole('User');
      
    }
}
