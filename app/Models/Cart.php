<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
     // Add 'name' and other mass-assigned attributes to the $fillable array
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'product_title',
        'price',
        'quantity',
        'image',
        'product_id',
        'user_id',
        'totalprice',
    ];
}
