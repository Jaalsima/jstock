<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'slug',
        'status',
        'image',
    ];

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }
}
 