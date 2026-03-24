<?php

namespace App\Policies;

use App\Models\User;

class CompanyScopedPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isSuperAdmin() || $user->hasCompanyScope();
    }

    public function view(User $user, $model): bool
    {
        return $user->isSuperAdmin() || $model->company_id === $user->company_id;
    }

    public function create(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isCompanyAdmin() || $user->isCompanyOperator();
    }

    public function update(User $user, $model): bool
    {
        return $user->isSuperAdmin() || $model->company_id === $user->company_id;
    }

    public function delete(User $user, $model): bool
    {
        return $user->isSuperAdmin() || $model->company_id === $user->company_id;
    }
}
