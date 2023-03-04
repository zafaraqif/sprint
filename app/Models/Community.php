<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'community_id';
    protected $fillable = [
        'community_name', 'locality', 'district', 'state'
    ];

    public function service(): HasMany
    {
        return $this->hasMany(
            \App\Models\Service::class,
            'community_id'
        );
    }
}
