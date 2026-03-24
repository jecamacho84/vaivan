<?php

namespace App\Enums;

enum UserRole: string
{
    case SuperAdmin = 'super_admin';
    case CompanyAdmin = 'company_admin';
    case CompanyOperator = 'company_operator';
    case Driver = 'driver';
    case Guardian = 'guardian';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
