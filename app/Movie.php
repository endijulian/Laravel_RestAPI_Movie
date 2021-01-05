<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'star', 'price', 'imageUrl'];
    protected $hidden = ['pivot','created_at', 'updated_at'];

    public function kategoris()
    {
        return $this->belongsToMany('App\Kategori');
    }

    public function orderdetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function getImageUrlAttribute($imageURl)
    {
        $imageURl = 'uploads/movieImages/'. $imageURl;
        return $imageURl;
    }
}
