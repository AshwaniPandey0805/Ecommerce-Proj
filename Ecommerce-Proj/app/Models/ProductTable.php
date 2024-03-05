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
            'quantity',
            'weight',
            'maufacture',
            'discription',
            'category', // Assuming 'category_id' is also a field in the table
        ];

    

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }


}
