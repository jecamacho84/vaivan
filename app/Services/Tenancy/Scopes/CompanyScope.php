<?php

namespace App\Services\Tenancy\Scopes;

use App\Services\Tenancy\TenantContext;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CompanyScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        /** @var TenantContext $tenant */
        $tenant = app(TenantContext::class);

        if (! $tenant->hasUser() || $tenant->isSuperAdmin()) {
            return;
        }

        if (! $tenant->companyId()) {
            return;
        }

        $builder->where($model->getTable().'.company_id', $tenant->companyId());
    }
}
