<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiDay extends Model
{
    protected $table='loai_day';
    
    
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_day','id');
    }

    public function loaimay()
    {
    	return $this->hasManyThrough('App\LoaiMay','App\SanPham','id_loai','id_day','id');
    }
}
