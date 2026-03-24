<?php

namespace App\Services\Tenancy;

use App\Services\Tenancy\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Builder;

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
        static::creating(function ($model): void {
            if (auth()->check() && auth()->user()->company_id && empty($model->company_id)) {
                $model->company_id = auth()->user()->company_id;
            }
        });

        static::addGlobalScope('company', function (Builder $builder): void {
            if (! auth()->check()) {
                return;
            }

            $user = auth()->user();

            if ($user->isSuperAdmin()) {
                return;
            }

            $builder->where($builder->getModel()->getTable().'.company_id', $user->company_id);
        });
    }
}
