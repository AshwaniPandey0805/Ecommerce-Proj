<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    use HasFactory;

    protected $table  = 'order_tables';

    protected $fillable = [
        'customer_id',
        'order_date',   
        'total_amount',
        'tax',
        'status'

    ];
}
