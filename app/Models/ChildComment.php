<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildComment extends Model
{
    protected $table = 'childcomment';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
