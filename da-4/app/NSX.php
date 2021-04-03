<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NSX extends Model
{
    //
    protected $table='producer';
    
     public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_producer','id');
    }
}
