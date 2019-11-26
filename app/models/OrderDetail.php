<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'product_id',
        'unit_price',
        'status',
        'quantity',
        'total',
        'order_no'
        ];
    protected $dates = ['created_At', 'updated_At', 'deleted_at'];

}

