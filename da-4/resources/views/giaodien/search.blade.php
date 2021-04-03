@extends('giaodien.master')
@section('title','Tìm kiếm')
@section('content')

<div>
  <h2 style="margin-top: 30px;margin-left:115px ;">Tìm Kiếm</h2>
  <p style="margin-left: 120px; font-size: 13px"><a href="#" style="color: black"></a>Tìm Thấy: {{count($sanpham)}} Sản Phẩm</p>
  <br>
</div>
<div class="row" style="margin-right: 50px; margin-left: 50px; margin-bottom: 300px;" id="banchay1">
 @foreach($sanpham as $bc)
 
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

@endsection
