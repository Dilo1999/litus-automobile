<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the super admin account.
     * Email: admin@gmail.com
     * Password: 12345678
     */
    public function run(): void
    {
        // Ensure admin role and permissions exist (e.g. when running only this seeder)
        $this->call(RoleAndPermissionSeeder::class);

        $user = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
            ]
        );

        $user->syncRoles(['admin']);
    }
}
