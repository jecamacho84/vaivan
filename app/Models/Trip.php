<?php

namespace App\Models;

use App\Enums\TripStatus;
use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'route_id', 'driver_id', 'vehicle_id', 'trip_date', 'status', 'started_at', 'finished_at', 'notes',
    ];

    protected function casts(): array
    {
        return [
            'trip_date' => 'date',
            'started_at' => 'datetime',
            'finished_at' => 'datetime',
            'status' => TripStatus::class,
        ];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function route(): BelongsTo { return $this->belongsTo(Route::class); }
    public function driver(): BelongsTo { return $this->belongsTo(Driver::class); }
    public function vehicle(): BelongsTo { return $this->belongsTo(Vehicle::class); }
    public function passengers(): BelongsToMany
    {
        return $this->belongsToMany(Passenger::class, 'trip_passengers')
            ->withPivot(['company_id', 'status', 'status_notes', 'boarded_at', 'unboarded_at'])
            ->withTimestamps();
    }
    public function locations(): HasMany { return $this->hasMany(VehicleLocation::class); }
}
