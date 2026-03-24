<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCompanyContext
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return $next($request);
        }

        if ($user->role !== UserRole::SuperAdmin && ! $user->company_id) {
            abort(403, 'Usuário sem vínculo de empresa.');
        }

        return $next($request);
    }
}
