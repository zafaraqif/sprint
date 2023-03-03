<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'community_id';
    protected $fillable = [
        'community_name', 'locality', 'district', 'state'
    ];
}
