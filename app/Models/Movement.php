<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'customer_id',
        'movement_type',
        'quantity',
        'unit_price',
        'total_price',
        'location',
        'notes',
    ];


    /**
     * Get the product associated with the movement.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the supplier who is the source of the movement.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the customer who is the destination of the movement.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
