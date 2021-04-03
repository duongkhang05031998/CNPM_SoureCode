<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cthd extends Model
{
    
    protected $table='bill_detail';

     public function sanpham()
    {
        return $this->belongsTo('App\SanPham','id_product','id');
    }
     public function hoadon()
    {
        return $this->belongsTo('App\HoaDon','id_bill','id');
    }
}
