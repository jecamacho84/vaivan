<?php

namespace App\Services\Tenancy;

use App\Enums\UserRole;
use App\Models\User;

class TenantContext
{
    private ?User $user = null;

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    public function user(): ?User
    {
        return $this->user;
    }

    public function hasUser(): bool
    {
        return $this->user !== null;
    }

    public function isSuperAdmin(): bool
    {
        return $this->user?->role === UserRole::SuperAdmin;
    }

    public function companyId(): ?int
    {
        return $this->user?->company_id;
    }

    public function canAccessCompany(?int $companyId): bool
    {
        if (! $this->hasUser()) {
            return false;
        }

        if ($this->isSuperAdmin()) {
            return true;
        }

        return $companyId !== null && $companyId === $this->companyId();
    }
}
