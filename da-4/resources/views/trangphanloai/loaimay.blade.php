@extends('giaodien.master')
@section('title','Loại máy  ')
@section('content')
<br><br>
<div style="width: 100%; height: 65px; background-color: #ECE7E7">
	<p style="font-size: 28px;text-align: center;margin-right: 55px;padding-top: 10px">ĐỒNG HỒ {{$ten_l->name_loai}} </p>
</div>

<br>
<br>
<br>
<div>
 <p style="margin-left: 100px; font-size: 14px;">Trang Chủ &nbsp;/&nbsp; Đồng Hồ {{$ten_l->name_loai}}  &nbsp;/&nbsp;Hiển thị {{count($sp_loaimay)}} kết quả</p>
 
</div>
<br>
<br>
<div class="row" style="margin-right: 50px;margin-left: 50px">
  @foreach($sp_loaimay as $sp_loai)
  
  <div class="col-lg-3">
   <a href="{{ route('chitiet',$sp_loai->id) }}"><img class="image" src="{{$sp_loai->image_link}}" width="250" height="300" ></a>
   <div class="middle">
    <div class="text"><button type="button" class="btn btn-secondary"><a style="color:white;text-decoration: none;" href="{{ route('themgiohang',$sp_loai->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Mua ngay</a></button></div>
  </div>
  <p style="font-size: 14px;text-align: center; margin-left: 100px;margin-top: 10px ">
   <a style="color:black;text-decoration: none;" href="{{ route('chitiet',$sp_loai->id) }}"> {{$sp_loai->name_product}}</a>
 </p>
 @if($sp_loai->discount == 0)      
 <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange">{{number_format($sp_loai->price)}} đ</p>
 @else
 <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange"><strike style="color: grey; margin-right: 10px;">{{number_format($sp_loai->price)}} đ</strike>{{number_format($sp_loai->discount)}} đ</p>
 @endif
</div>
@endforeach

</div>
<div class="row">
 <p style="margin-left: 150px">{{$sp_loaimay->links()}}</p>
</div>
  <!-- <div>
    <button style="margin-top: 30px; margin-left: 640px; margin-bottom: 30px">XEM THÊM</button>
  </div> -->
  

  @endsection