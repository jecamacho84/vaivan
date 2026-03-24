<?php

namespace App\Models;

use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleLocation extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'vehicle_id', 'trip_id', 'latitude', 'longitude', 'speed_kmh', 'heading', 'accuracy_meters', 'recorded_at',
    ];

    protected function casts(): array
    {
        return ['recorded_at' => 'datetime'];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function vehicle(): BelongsTo { return $this->belongsTo(Vehicle::class); }
    public function trip(): BelongsTo { return $this->belongsTo(Trip::class); }
}
