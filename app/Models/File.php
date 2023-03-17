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
        'order_id', 'page_number', 'pages_per_sheet', 'pages_to_print', 'sheets_to_print', 'orientation', 'print_color', 'print_method', 'print_method', 'paper_weight', 'file_path',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\Order::class,
            'order_id'
        );
    }
}
