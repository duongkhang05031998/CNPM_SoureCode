<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTHDnhap extends Model
{
    protected $table='bill_import_detail';

    public function sanpham()
    {
        return $this->belongsTo('App\SanPham','id_product','id');
    }
     public function hoadonnhap()
    {
        return $this->belongsTo('App\HoaDonNhap','id_bill_import','id');
    }
}
