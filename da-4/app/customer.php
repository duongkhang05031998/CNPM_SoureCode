<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
     protected $table='customer';

      public function hoadon()
    {
        return $this->belongsTo('App\HoaDon','id_customer','id');
    }
}
