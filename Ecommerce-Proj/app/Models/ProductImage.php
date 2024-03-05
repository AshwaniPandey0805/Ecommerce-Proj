<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_image';

    protected $fillable = [
        'product_id',
        'image_path'
    ];

    /**
     * belong to one : Product Image -> Product Details
     */
    public function product(){
        return $this->belongsTo(ProductTable::class,'product_id','sku_number');
    }
}
