<?php

namespace App\Models;

use App\Enums\SubscriptionStatus;
use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'guardian_id', 'passenger_id', 'plan_name', 'amount', 'billing_day', 'starts_at', 'ends_at', 'status',
    ];

    protected function casts(): array
    {
        return ['amount' => 'decimal:2', 'starts_at' => 'date', 'ends_at' => 'date', 'status' => SubscriptionStatus::class];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function guardian(): BelongsTo { return $this->belongsTo(Guardian::class); }
    public function passenger(): BelongsTo { return $this->belongsTo(Passenger::class); }
    public function payments(): HasMany { return $this->hasMany(Payment::class); }
}
