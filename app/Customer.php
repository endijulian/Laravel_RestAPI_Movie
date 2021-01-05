<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = ['name','email','password','address','tlp','api_token'];
    protected $hidden =['password','created_at','updated_at'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
