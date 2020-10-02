<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable = [
        'com_rating',
        'com_email',
        'com_name',
        'com_content',
        'com_product',
        'product_name',
    ];

    public function comment_product()
    {

        return $this->belongsTo(Product::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}

