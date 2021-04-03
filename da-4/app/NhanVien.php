<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table='nhan_vien';

    public function hoadonnhap()
    {
        return $this->belongsTo('App\HoaDonNhap','id_NV','id');
    }
}
