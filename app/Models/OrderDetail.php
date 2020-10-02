<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'order_id',
        'order_product_name',
        'order_product_totalprice',
        'quantity',
    ];

    public function order()
    {

        return $this->belongTo(User::class);
    }

    public function product()
    {

        return $this->belongTo(Product::class);
    }
}
