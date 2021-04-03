<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table='bills';
     public function cthd()
    {
        return $this->hasMany('App\cthd','id_bill','id');
    }
     public function customer()
    {
        return $this->belongsTo('App\customer','id_customer','id');
    }
   
}
