<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\AuthorizesCompanyAccess;
use App\Models\Passenger;
use App\Models\Route;
use App\Models\Trip;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class DashboardController extends Controller
{
    use AuthorizesCompanyAccess;

    public function __invoke(): View
    {
        Gate::authorize('manage-operations');

        $stats = [
            'passengers' => $this->scopeByCompany(Passenger::query())->count(),
            'routes' => $this->scopeByCompany(Route::query())->count(),
            'trips' => $this->scopeByCompany(Trip::query())->count(),
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
