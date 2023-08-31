<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    /**
     * Get the sale associated with the sale detail.
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    /**
     * Get the product associated with the sale detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Define 'subtotal' as an attribute accessor to calculate it.
     */
    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->unit_price;
    }
}
