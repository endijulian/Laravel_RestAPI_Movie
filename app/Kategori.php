<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $hidden = ['pivot','created_at', 'updated_at'];

    public function movies()
    {
        return $this->belongsToMany('App\Movie');
    }
}
