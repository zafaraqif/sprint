<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id', 'service_id', 'order_pickup_date', 'order_pickup_time', 'total_price', 'order_status',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'user_id'
        );
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\Service::class,
            'service_id'
        );
    }

    public function file(): HasMany
    {
        return $this->hasMany(
            \App\Models\File::class,
            'order_id'
        );
    }
}
