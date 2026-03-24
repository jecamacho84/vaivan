<?php

namespace App\Models;

use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'user_id', 'name', 'document', 'license_number', 'license_expiration_date', 'phone', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'license_expiration_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function trips(): HasMany { return $this->hasMany(Trip::class); }
}
