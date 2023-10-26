<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'name',
        'email',
        'address',
        'phone',
        'slug',
        'status',
        'image',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
