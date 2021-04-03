@extends('giaodien.master')
@section('title','Trang Chủ')
@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel" s>

  <ul class="carousel-indicators">
   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
   <li data-target="#myCarousel" data-slide-to="1"></li>
   <li data-target="#myCarousel" data-slide-to="2"></li>
 </ul>
 <div class="carousel-inner">

  <div class="carousel-item active">

    <img src="public\image\slide1\e.jpg" alt="Los Angeles" width="100%" height="400px">

  </div>
  @foreach($slide as $sl)
  <div class="carousel-item">

    <img src="{{$sl->image}}" alt="Los Angeles" width="100%" height="400px">

  </div>
  @endforeach
</div>
<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#myCarousel" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>
<div class="container" id="slide2" >
  <h3>ĐỒNG HỒ CHÍNH HÃNG CAO CẤP</h3>
  <p >Chúng tôi cam kết mang lại những giá trị cao nhất, chế độ hậu mãi tốt nhất & đồng </p>
  <p style="margin-top: -13px;">hồ chính hãng cho khách hàng khi đến với SHOPDONGHO.com</p>
</div>
<div class="row" style="margin-left: 50px;
margin-right: 50px;" id="thongtin">
<div class="col-lg-2" >
  <img src="public\image\slide2\baohanh.jpg" width="100" height="100" >
  <p >BẢO HÀNH MÁY VÀ PIN 5 NĂM</p>
</div>
<div class="col-lg-2">
  <img src="public\image\slide2\giamgia.png" width="100" height="100" >
  <p >GIẢM GIÁ 10% GIÁ CHÍNH HÃNG</p>
</div>
<div class="col-lg-2">
  <img src="public\image\slide2\cod.jpg" width="100" height="100" >
  <p >CHUYỂN HÀNG COD MIỄN PHÍ TOÀN QUỐC</p>
</div>
<div class="col-lg-2">
  <img src="public\image\slide2\1v1.png" width="100" height="100" >
  <p>CHẾ ĐỘ 1 ĐỔI 1 TRONG 7 NGÀY ĐẦU</p>
</div>
<div class="col-lg-2">
  <img src="public\image\slide2\qua.png" width="100" height="100" >
  <p>TẶNG KHĂN LAU ĐỒNG HỒ CAO CẤP</p>
</div>
<div class="col-lg-2">
  <img src="public\image\slide2\giamgia.png" width="100" height="100" >
  <p >THAY GIÂY DA GIẢM GIÁ 50%</p>
</div>
</div>
<div>
  <h2 style="text-align: center;margin-top: 30px; color: orange; font-family: cursive;">Sản Phẩm Đồng Hồ Mới</h2>
  {{-- <Marquee scrollamount="20"> --}}<p style="margin-left: 135px;font-size: 13px">Đồng Hồ Bán Chạy &nbsp;/&nbsp; Hiển Thị {{count($banchay)}} Sản Phẩm</p>{{-- </Marquee> --}}
  <hr width="80%">
  <br>
</div>
<div class="row" style="margin-right: 50px; margin-left: 50px" id="banchay1">
 @foreach($banchay as $bc)
 
 <div class="col-lg-3">
  <a href="{{ route('chitiet',$bc->id) }}"><img class="image"  src="{{$bc->image_link}}" width="250" height="300"></a>
  <div class="middle">
    <div class="text"><button type="button" class="btn btn-secondary"><a style="color:white;text-decoration: none;" href="{{ route('themgiohang',$bc->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Mua ngay</a></button></div>
  </div>
  <p style="font-size: 14px;margin-top: 10px "><a href="{{ route('chitiet',$bc->id) }}" style="color:black;text-decoration: none;">{{$bc->name_product}}</a></p>
  @if($bc->discount == 0)      
  <p style="font-size: 15px;  color: orange">{{number_format($bc->price)}} đ</p>
  @else
  <p style="font-size: 15px;  color: orange"><strike >{{number_format($bc->price)}} đ</strike>{{number_format($bc->discount)}} đ</p>
  @endif

</div>

@endforeach

</div>




<div>
  <button  style="margin-top: 30px; margin-left: 640px; margin-bottom: 30px"><a style="color: black;text-decoration: none" href="{{ route('hot') }}">XEM THÊM</a></button>
</div>
<div>
 <h2 style="text-align: center;margin-top: 30px; color: orange; font-family: cursive;">ĐỒNG HỒ NỮ</h2>
 <p style="margin-left: 135px; font-size: 13px">Đồng Hồ Nữ &nbsp;/&nbsp; Hiển Thị {{count($dhnu)}} Sản Phẩm</p>
 <hr width="80%"><br>
</div>
<div class="row" style="margin-right: 50px; margin-left: 50px" id="dhnu">
  @foreach($dhnu as $nu)
  
  <div class="col-lg-3">
   <a href="{{ route('chitiet',$nu->id) }}"><img class="image" src="{{$nu->image_link}}" width="250" height="300" ></a>
   <div class="middle">
    <div class="text"><button type="button" class="btn btn-secondary"><a style="color:white;text-decoration: none;" href="{{ route('themgiohang',$nu->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Mua ngay</a></button></div>
  </div>
  <p style="font-size: 14px;text-align: center; margin-left: 100px;margin-top: 10px ">
   <a style="color:black;text-decoration: none;" href="{{ route('chitiet',$nu->id) }}"> {{$nu->name_product}}</a>
 </p>
 @if($nu->discount == 0)      
 <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange">{{number_format($nu->price)}} đ</p>
 @else
 <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange"><strike style="color: grey; margin-right: 10px;">{{number_format($nu->price)}} đ</strike>{{number_format($nu->discount)}} đ</p>
 @endif
</div>
@endforeach

</div>



<div>
  <button style="margin-top: 30px; margin-left: 640px; margin-bottom: 30px"><a style="color: black;text-decoration: none" href="{{ route('donghonu') }}">XEM THÊM</a></button>
</div>
<div>
  <h2 style="text-align: center;margin-top: 30px; color: orange; font-family: cursive;">ĐỒNG HỒ NAM</h2>
  <p style="margin-left: 135px; font-size: 13px">Đồng Hồ Nam &nbsp;/&nbsp; Hiển Thị {{count($dhnam)}} Sản Phẩm</p>
  <hr width="80%"><br>
</div>
<div class="row" style="margin-right: 50px; margin-left: 50px">
  @foreach($dhnam as $nam)
  
  <div class="col-lg-3">
    <a href="{{ route('chitiet',$nam->id) }}"><img class="image" src="{{$nam->image_link}}" width="250" height="300" ></a>
    <div class="middle">
      <div class="text"><button type="button" class="btn btn-secondary"><a style="color:white;text-decoration: none;" href="{{ route('themgiohang',$nam->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Mua ngay</a></button></div>
    </div>
    <p style="font-size: 14px;text-align: center; margin-left: 100px;margin-top: 10px ">
      <a href="{{ route('chitiet',$nam->id) }}" style="color: black;text-decoration: none;">{{$nam->name_product}}</a>
    </p>
    @if($nam->discount == 0)      
    <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange">{{number_format($nam->price)}} đ</p>
    @else
    <p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange"><strike style="color: grey; margin-right: 10px;">{{number_format($nam->price)}} đ</strike>{{number_format($nam->discount)}} đ</p>
    @endif
  </div>
  @endforeach
  
</div>
<div>
  <button style="margin-top: 30px; margin-left: 640px; margin-bottom: 30px" ><a style="color: black;text-decoration: none" href="{{ route('donghonam') }}">XEM THÊM</a></button>
</div>
<div>
 <h2 style="text-align: center;margin-top: 30px; color: orange; font-family: cursive;">THƯƠNG HIỆU ĐỒNG HỒ</h2>
 <hr width="80%">
 <br>
</div>
<div class="row" id="thuonghieu">
  @foreach($ncc as $th)
  <div class="col-lg-1" style="margin-left: 35px; margin-top: 20px; margin-bottom: 10px" id="tintuc">
   <a href="{{ route('thuonghieu',$th->id) }}"><img src="{{$th->image_producer}}"  width="100" height="66"></a>
 </div>
 @endforeach
</div>
<br><br>
<div>
 <h2 style="text-align: center;margin-top: 30px; color: orange; font-family: cursive;">BLOG</h2>
 <hr width="80%">
 <br>
</div>
<div class="container">
<div class="row ">
  @foreach($tt as $tintuc)
	<div class="col-sm-3" id="tintuc">
		 <a href="{{ route('tintuc',$tintuc->id) }}"><img class="image" src="{{$tintuc->image}}" style="margin-left: 0px"  ></a>
     <p style="font-size: 14px;text-align: content: '';margin-top: 10px ">
      <a href="{{ route('tintuc',$tintuc->id) }}" style="color: black;text-decoration: none;"><p style="text-align: center;">{{$tintuc->ten_tin}}</p></a>
    </p>
	</div>
  @endforeach
</div>
</div>
<br><br>
@endsection





