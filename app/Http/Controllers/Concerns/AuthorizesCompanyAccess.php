<?php

namespace App\Http\Controllers\Concerns;

use App\Services\Tenancy\CompanyAccessService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait AuthorizesCompanyAccess
{
    protected function scopeByCompany(Builder $query): Builder
    {
        return app(CompanyAccessService::class)->scope($query);
    }

    protected function authorizeCompanyModel(Model $model): void
    {
        app(CompanyAccessService::class)->authorizeModel($model);
    }
}
