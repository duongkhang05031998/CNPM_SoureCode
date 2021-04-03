@extends('giaodien.master')
@section('title','Thương Hiệu  ')
@section('content')
<br><br>
<div style="width: 100%; height: 65px; background-color: #ECE7E7">
	<p style="font-size: 28px;text-align: center;padding-top: 10px">ĐỒNG HỒ {{$ten_th->name_producer}} </p>
</div>
<br>
<br>
<br>
<div>
 <p style="margin-left: 100px; font-size: 14px;">Trang Chủ &nbsp;/&nbsp; Đồng Hồ {{$ten_th->name_producer}}  &nbsp;/&nbsp;Hiển thị {{count($sp_thuonghieu)}} kết quả</p>
 
</div>
<br>
<br>
<div class="row" style="margin-left: 50px; margin-right: 50px">
  @foreach($sp_thuonghieu as $sp_th)
  
  <div class="col-lg-3">
    <a href="{{ route('chitiet',$sp_th->id) }}"><img class="image" src="{{$sp_th->image_link}}" width="250" height="300" style="margin-left: 50px"></a>
    <div class="middle">
      <div class="text"><button type="button" class="btn btn-secondary"><a style="color:white;text-decoration: none;" href="{{ route('themgiohang',$sp_th->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Mua ngay</a></button></div>
    </div>
    <p style="font-size: 14px;text-align: center; margin-left: 100px;margin-top: 10px ">
     <a style="color:black;text-decoration: none;" href="{{ route('chitiet',$sp_th->id) }}"> {{$sp_th->name_product}}</a>
   </p>
   @if($sp_th->discount == 0)      
   <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange">{{number_format($sp_th->price)}} đ</p>
   @else
   <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange"><strike style="color: grey; margin-right: 10px;">{{number_format($sp_th->price)}} đ</strike>{{number_format($sp_th->discount)}} đ</p>
   @endif
 </div>
 @endforeach
 
</div>

<div class="row">
  <p style="margin-left: 150px">{{$sp_thuonghieu->links()}}</p>
</div>
  <!-- <div>
    <button style="margin-top: 30px; margin-left: 640px; margin-bottom: 30px">XEM THÊM</button>
  </div> -->
  

  @endsection