<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $primaryKey = 'service_id';
    protected $fillable = [
        'sprinter_id', 'community_id', 'service_name', 'start_time', 'end_time', 'start_pickup_time', 'end_pickup_time', 'service_status', 'pickup_address', 'page_limit', 'price_bnw', 'price_color', 'charge_80gsm'
    ];
}
