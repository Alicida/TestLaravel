<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table = 'venta';
    protected $fillable = ['fecha'];

    public function tienda_id()
    {
        return $this->belongsTo('App\Tienda', 'tienda');
    }

    public function cliente_id()
    {
        return $this->belongsTo('App\Cliente', 'cliente');
    }

    public function detalle()
    {
        return $this->hasMany('App\Detalle', 'id');
    }
}
