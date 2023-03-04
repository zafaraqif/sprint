<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;
    protected $primaryKey = 'file_id';
    protected $fillable = [
        'order_id', 'file_name', 'page_no', 'pages_per_sheet', 'print_color', 'print_method', 'print_method', 'paper_weight', 'file_path', 'file_size'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\Order::class,
            'order_id'
        );
    }
}
