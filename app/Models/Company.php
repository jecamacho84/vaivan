<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'trade_name', 'document', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function users(): HasMany { return $this->hasMany(User::class); }
    public function drivers(): HasMany { return $this->hasMany(Driver::class); }
    public function vehicles(): HasMany { return $this->hasMany(Vehicle::class); }
    public function guardians(): HasMany { return $this->hasMany(Guardian::class); }
    public function passengers(): HasMany { return $this->hasMany(Passenger::class); }
    public function routes(): HasMany { return $this->hasMany(Route::class); }
    public function trips(): HasMany { return $this->hasMany(Trip::class); }
    public function payments(): HasMany { return $this->hasMany(Payment::class); }
    public function subscriptions(): HasMany { return $this->hasMany(Subscription::class); }
    public function notifications(): HasMany { return $this->hasMany(Notification::class); }
}
