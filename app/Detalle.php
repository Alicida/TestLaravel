<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    //
    protected $table = 'detalle';
    protected $fillable = ['venta', 'producto', 'cantidad'];

    public function venta_id()
    {
        return $this->belongsTo('App\Venta', 'venta');
    }

    public function producto_id()
    {
        return $this->belongsTo('App\Producto', 'producto');
    }
}
