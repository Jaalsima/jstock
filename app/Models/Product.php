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
        'purchase_price',
        'selling_price',
        'status',
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

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    /**
     * Get the purchases of the product.
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Get the sales of the product.
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
