<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    protected $primaryKey = 'service_id';
    protected $fillable = [
        'user_id', 'community_id', 'service_name', 'start_time', 'end_time', 'start_pickup_time', 'end_pickup_time', 'service_status', 'pickup_address', 'contact_number', 'page_limit', 'price_bnw', 'price_color', 'charge_80gsm'
    ];

    public function sprinter(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'user_id'
        );
    }

    public function community(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\Community::class,
            'community_id'
        );
    }

    public function order(): HasMany
    {
        return $this->hasMany(
            \App\Models\Order::class,
            'service_id'
        );
    }
}
