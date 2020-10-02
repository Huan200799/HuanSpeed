<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'total_price',
        'name_user',
        'email',
        'address',
        'phone',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function orderdetail()
    {

        return $this->hasMany(OrderDetail::class);
    }
}
