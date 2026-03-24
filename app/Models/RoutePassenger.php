<?php

namespace App\Models;

use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoutePassenger extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'route_id', 'passenger_id', 'stop_order', 'pickup_address', 'dropoff_address', 'is_active',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function route(): BelongsTo { return $this->belongsTo(Route::class); }
    public function passenger(): BelongsTo { return $this->belongsTo(Passenger::class); }
}
