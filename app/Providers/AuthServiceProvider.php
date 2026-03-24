<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\Driver;
use App\Models\Guardian;
use App\Models\Notification;
use App\Models\Passenger;
use App\Models\PassengerScheduleDay;
use App\Models\Payment;
use App\Models\Route;
use App\Models\RoutePassenger;
use App\Models\Subscription;
use App\Models\Trip;
use App\Models\TripPassenger;
use App\Models\Vehicle;
use App\Models\VehicleLocation;
use App\Policies\CompanyScopedPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Driver::class => CompanyScopedPolicy::class,
        Vehicle::class => CompanyScopedPolicy::class,
        Guardian::class => CompanyScopedPolicy::class,
        Passenger::class => CompanyScopedPolicy::class,
        PassengerScheduleDay::class => CompanyScopedPolicy::class,
        Route::class => CompanyScopedPolicy::class,
        RoutePassenger::class => CompanyScopedPolicy::class,
        Trip::class => CompanyScopedPolicy::class,
        TripPassenger::class => CompanyScopedPolicy::class,
        VehicleLocation::class => CompanyScopedPolicy::class,
        Payment::class => CompanyScopedPolicy::class,
        Notification::class => CompanyScopedPolicy::class,
        Subscription::class => CompanyScopedPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function ($user, string $ability): bool|null {
            return $user->role === UserRole::SuperAdmin ? true : null;
        });

        Gate::define('manage-company', fn ($user): bool => $user->role === UserRole::CompanyAdmin);

        Gate::define('manage-operations', fn ($user): bool => in_array($user->role, [
            UserRole::CompanyAdmin,
            UserRole::CompanyOperator,
        ], true));

        Gate::define('access-company-resource', function ($user, $resource): bool {
            $companyId = is_object($resource) ? ($resource->company_id ?? null) : null;

            return $companyId !== null && $companyId === $user->company_id;
        });

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
