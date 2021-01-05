<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id','order_date'];
    protected $hidden = ['created_at', 'updated_at'];

    public function customers()
    {
        return $this->belongsTo('App\Customer');
    }

    public function orderdetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
