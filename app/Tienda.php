<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    //
    protected $table = 'tienda';
    protected $fillable = ['nombre'];

    public function venta()
    {
        return $this->hasMany('App\venta', 'id');
    }
}
