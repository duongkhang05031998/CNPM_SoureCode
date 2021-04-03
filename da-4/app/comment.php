<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table='comment';

    public function product()
    {
    	return $this->belongsTo('App\SanPham','id_product','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
