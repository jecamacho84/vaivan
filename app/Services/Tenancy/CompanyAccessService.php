<?php

namespace App\Services\Tenancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CompanyAccessService
{
    public function scope(Builder $query): Builder
    {
        /** @var TenantContext $tenant */
        $tenant = app(TenantContext::class);

        if (! $tenant->hasUser() || $tenant->isSuperAdmin()) {
            return $query;
        }

        return $query->where($query->getModel()->getTable().'.company_id', $tenant->companyId());
    }

    public function authorizeModel(Model $model): void
    {
        /** @var TenantContext $tenant */
        $tenant = app(TenantContext::class);

        if (! $tenant->canAccessCompany($model->company_id ?? null)) {
            abort(403, 'Recurso fora do escopo da empresa.');
        }
    }
}
