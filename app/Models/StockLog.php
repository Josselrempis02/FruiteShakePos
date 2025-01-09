<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'previous_stock',
        'added_stock',
        'new_stock',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
