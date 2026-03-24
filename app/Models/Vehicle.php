<?php

namespace App\Models;

use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = ['company_id', 'name', 'plate', 'model', 'color', 'capacity', 'is_active'];

    protected function casts(): array
    {
        return [
            'capacity' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function trips(): HasMany { return $this->hasMany(Trip::class); }
    public function locations(): HasMany { return $this->hasMany(VehicleLocation::class); }
}
