<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    /**
     * Get the purchase associated with the purchase detail.
     */
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    /**
     * Get the product associated with the purchase detail.
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
