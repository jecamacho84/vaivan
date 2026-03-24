<?php

namespace App\Providers;

use App\Enums\UserRole;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('manage-company', fn ($user): bool => in_array($user->role, [
            UserRole::SuperAdmin,
            UserRole::CompanyAdmin,
        ], true));

        Gate::define('manage-operations', fn ($user): bool => in_array($user->role, [
            UserRole::SuperAdmin,
            UserRole::CompanyAdmin,
            UserRole::CompanyOperator,
        ], true));
    }
}
