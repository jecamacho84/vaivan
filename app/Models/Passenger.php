<?php

namespace App\Models;

use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Passenger extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'guardian_id', 'name', 'birth_date', 'pickup_address', 'dropoff_address', 'notes', 'is_active',
    ];

    protected function casts(): array
    {
        return ['birth_date' => 'date', 'is_active' => 'boolean'];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function guardian(): BelongsTo { return $this->belongsTo(Guardian::class); }
    public function scheduleDays(): HasMany { return $this->hasMany(PassengerScheduleDay::class); }
    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class, 'route_passengers')
            ->withPivot(['company_id', 'stop_order', 'pickup_address', 'dropoff_address', 'is_active'])
            ->withTimestamps();
    }
    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trip::class, 'trip_passengers')
            ->withPivot(['company_id', 'status', 'status_notes', 'boarded_at', 'unboarded_at'])
            ->withTimestamps();
    }
}
