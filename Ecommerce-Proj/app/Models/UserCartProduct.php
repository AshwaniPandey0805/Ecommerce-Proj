<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCartProduct extends Model
{
    use HasFactory;
    protected $table = 'user_cart_products';

    protected $fillable = [
        'cart_id',
        'product_id',
        'wish_list',
        'qunatity'
    ];
}
