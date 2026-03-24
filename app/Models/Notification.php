<?php

namespace App\Models;

use App\Enums\NotificationStatus;
use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = [
        'company_id', 'user_id', 'channel', 'type', 'title', 'body', 'payload', 'status', 'sent_at', 'read_at',
    ];

    protected function casts(): array
    {
        return ['payload' => 'array', 'sent_at' => 'datetime', 'read_at' => 'datetime', 'status' => NotificationStatus::class];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}
