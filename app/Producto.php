<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'producto';
    protected $fillable = ['nombre', 'precio'];

    public function producto()
    {
        return $this->hasMany('App\Producto', 'id');
    }
}
