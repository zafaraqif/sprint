<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'order_id', 'payment_type', 'payment_amount', 'remaining_payment', 'session_id'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\Order::class,
            'order_id'
        );
    }
}
