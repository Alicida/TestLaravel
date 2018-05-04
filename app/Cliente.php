<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'cliente';
    protected $fillable = ['nombre'];

    public function venta()
    {
        return $this->hasMany('App\Venta', 'id');
    }
}
