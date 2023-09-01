<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'sale_date',
        'invoice_number',
        'total_amount',
    ];
    
    /**
     * Get the customer who made the sale to.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the details associated with the sale.
     */
    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    /**
     * Get the user who made the sale.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
