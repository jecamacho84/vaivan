<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use App\Services\Tenancy\TenantContext;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCompanyContext
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        /** @var TenantContext $tenant */
        $tenant = app()->bound(TenantContext::class) ? app(TenantContext::class) : new TenantContext();
        app()->instance(TenantContext::class, $tenant);
        $tenant->setUser($user);

        if (! $user) {
            return $next($request);
        }

        if ($user->role === UserRole::SuperAdmin) {
            return $next($request);
        }

        if (! in_array($user->role, [UserRole::CompanyAdmin, UserRole::CompanyOperator, UserRole::Driver, UserRole::Guardian], true)) {
            abort(403, 'Perfil sem permissão para acessar a plataforma.');
        }

        if (! $user->company_id) {

        if ($user->role !== UserRole::SuperAdmin && ! $user->company_id) {
            abort(403, 'Usuário sem vínculo de empresa.');
        }

        return $next($request);
    }
}
