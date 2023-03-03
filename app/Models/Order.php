<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id', 'service_id', 'order_pickup_date', 'order_pickup_time', 'total_price', 'order_status',
    ];
}
