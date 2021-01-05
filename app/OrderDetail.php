<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    
    protected $fillable =['order_id', 'movie_id', 'quantity'];
    protected $hidden = ['created_at', 'updated_at'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function movies()
    {
        return $this->belongsTo('App\Movie');
    }
}
