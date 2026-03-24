<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::query()->updateOrCreate(
            ['document' => '00000000000191'],
            [
                'name' => 'VaiVan Demo Transportes',
                'trade_name' => 'VaiVan Demo',
                'is_active' => true,
            ]
        );
    }
}
