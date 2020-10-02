<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_name',
        'product_name_slug',
        'product_img',
        'description',
        'price',
        'condition',
        'warranty',
        'accessories',
        'promotion',
        'status',
        'featured',
        'categories_id',
        'classify',
    ];

    public function product_cate()
    {

        return $this->belongsTo(Categories::class);
    }

    public function orderdetail()
    {

        return $this->hasMany(OrderDetail::class);
    }

    public function comments()
    {

       return $this->hasMany(Comment::class);
    }

    function orders()
    {

        return $this->belongsToMany(Order::class);
    }
}
