<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

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


    /**
     * One to one relation within UserCartProduct model - ProductTable model
     */
    public function productTabel(){
        return $this->hasOne(ProductTable::class, 'sku_number', 'product_id');
    }

    public Function productWithImages(){

        return  $this->productTabel()->with('productImages');
    }
}
