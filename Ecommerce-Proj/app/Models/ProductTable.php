<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTable extends Model
{
    use HasFactory;
    protected $table = 'product_tables';

    protected $fillable = [
        'product_name',
        'sku_number',
        'selling_price',
        'cost_price',
        'product_id',
        'category_id',

    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }


}
