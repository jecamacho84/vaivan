<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@vaivan.com'],
            [
                'name' => 'Super Admin',
                'company_id' => null,
                'password' => Hash::make('ChangeMe123!'),
                'role' => UserRole::SuperAdmin,
                'is_active' => true,
            ]
        );
    }
}
