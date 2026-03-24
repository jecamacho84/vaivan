<?php

namespace App\Models;

use App\Enums\TripPassengerStatus;
use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripPassenger extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'trip_id', 'passenger_id', 'status', 'status_notes', 'boarded_at', 'unboarded_at',
    ];

    protected function casts(): array
    {
        return ['status' => TripPassengerStatus::class, 'boarded_at' => 'datetime', 'unboarded_at' => 'datetime'];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function trip(): BelongsTo { return $this->belongsTo(Trip::class); }
    public function passenger(): BelongsTo { return $this->belongsTo(Passenger::class); }
}
