<?php

namespace App\Models;

use App\Services\Tenancy\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PassengerScheduleDay extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $fillable = ['company_id', 'passenger_id', 'weekday', 'going', 'returning', 'is_active'];

    protected function casts(): array
    {
        return ['weekday' => 'integer', 'going' => 'boolean', 'returning' => 'boolean', 'is_active' => 'boolean'];
    }

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function passenger(): BelongsTo { return $this->belongsTo(Passenger::class); }
}
