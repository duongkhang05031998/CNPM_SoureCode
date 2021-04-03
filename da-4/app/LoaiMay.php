<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMay extends Model
{
    protected $table='loai';
    
    
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_loai','id');
    }
     public function loaiday()
    {
    	return $this->hasManyThrough('App\LoaiDay','App\SanPham','id_product','id_day','id_loai');
    }
}
