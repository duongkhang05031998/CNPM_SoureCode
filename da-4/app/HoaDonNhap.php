<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    protected $table='bill_import';

    public function cthdn()
    {
        return $this->hasMany('App\CTHDnhap','id_bill_import','id');
    }
     public function nhanvien()
    {
        return $this->belongsTo('App\NhanVien','id_NV','id');
    }
}
