<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table='product';

    protected $fillable = [
        'name_product','id_producer','id_loai','id_day','ma','content','price','discount','image_link','image_list','created_product','gioi_tinh','size_mat_so','dang_mat_so','loai_kinh','bao_hanh','chong_nuoc','xuat_xu','trang_thai','updated_at','created_at'
    ];

    protected $hidden = [
        'id'
    ];
    
     public function loaiday()
    {
    	return $this->belongsTo('App\LoaiDay','id_day','id');
    }
     public function loaimay()
    {
    	return $this->belongsTo('App\LoaiMay','id_loai','id');
    }
     public function nsx()
    {
    	return $this->belongsTo('App\NSX','id_producer','id');
    }
    public function cthd()
    {
        return $this->hasMany('App\cthd','id_product','id');
    }
    public function product()
    {
        return $this->hasMany('App\comment','id_product','id');
    }
}
