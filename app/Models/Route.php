<?php

namespace App\Models;

use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = ['company_id', 'name', 'shift', 'description', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }

    public function passengers(): BelongsToMany
    {
        return $this->belongsToMany(Passenger::class, 'route_passengers')
            ->withPivot(['company_id', 'stop_order', 'pickup_address', 'dropoff_address', 'is_active'])
            ->withTimestamps()
            ->orderBy('route_passengers.stop_order');
    }

    public function trips(): HasMany { return $this->hasMany(Trip::class); }
}
