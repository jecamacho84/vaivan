<?php

namespace App\Services\Tenancy;

use App\Services\Tenancy\Scopes\CompanyScope;

trait BelongsToCompany
{
    public static function bootBelongsToCompany(): void
    {
        static::addGlobalScope(new CompanyScope());

        static::creating(function ($model): void {
            /** @var TenantContext $tenant */
            $tenant = app(TenantContext::class);

            if ($tenant->hasUser() && ! $tenant->isSuperAdmin() && empty($model->company_id)) {
                $model->company_id = $tenant->companyId();
            }
        });
    }
}
