<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'guardian_id', 'passenger_id', 'subscription_id', 'amount', 'due_date', 'paid_at',
        'status', 'payment_method', 'external_reference', 'notes',
    ];

    protected function casts(): array
    {
        return ['amount' => 'decimal:2', 'due_date' => 'date', 'paid_at' => 'date', 'status' => PaymentStatus::class];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function guardian(): BelongsTo { return $this->belongsTo(Guardian::class); }
    public function passenger(): BelongsTo { return $this->belongsTo(Passenger::class); }
    public function subscription(): BelongsTo { return $this->belongsTo(Subscription::class); }
}
