<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            SuperAdminSeeder::class,
        ]);

        $company = Company::query()->first();

        if (! $company) {
            return;
        }

        User::query()->updateOrCreate(
            ['email' => 'admin.demo@vaivan.com'],
            [
                'company_id' => $company->id,
                'name' => 'Admin Empresa Demo',
                'password' => Hash::make('ChangeMe123!'),
                'role' => UserRole::CompanyAdmin,
                'is_active' => true,
            ]
        );
    }
}
