<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
        'name',
        'description',
        'current_stock',
        'measurement_unit',
        'purchase_price',
        'selling_price',
        'slug',
        'status',
        'expiration',
        'observations',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the purchase details of the product.
     */
    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    /**
     * Get the sale details of the product.
     */
    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}