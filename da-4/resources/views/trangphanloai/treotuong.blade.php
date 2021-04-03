@extends('giaodien.master')
@section('title','Đồng Hồ Treo Tường')
@section('content')
<br><br>
<div style="width: 100%; height: 65px; background-color: #ECE7E7">
	<p style="font-size: 28px;text-align: center;">ĐỒNG HỒ TREO TƯỜNG</p>
</div>
<br>
<br>
<div class="row">
 	@foreach($ncc as $th)
 	<div class="col-lg-1" style="margin-left: 35px; margin-top: 20px; margin-bottom: 10px">
 		<a href="{{ route('thuonghieu',$th->id) }}"><img src="{{$th->image_producer}}" width="100" height="66"></a>
 	</div>
 	@endforeach
 </div>
  <br>
  <br>
  <br>
  <div>
  	<p style="margin-left: 100px; font-size: 14px;">Trang Chủ &nbsp;/&nbsp; Đồng TREO TƯỜNG &nbsp;/&nbsp;Hiển thị {{count($dhtreotuong)}} kết quả</p>
  	
  </div>
  <br>
  <br>
  <div class="row">
    @foreach($dhtreotuong as $dhtt)
  	
    <div class="col-lg-3">
      <a href="{{ route('chitiet',$dhtt->id) }}"> <img src="{{$dhtt->image_link}}" width="250" height="300" style="margin-left: 80px"></a>
      <p style="font-size: 14px;text-align: center; margin-left: 100px; ">{{$dhtt->name_product}}</p>
@if($dhtt->discount == 0)      
<p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange">{{$dhtt->price}} đ</p>
@else
<p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange"><strike style="color: grey; margin-right: 10px;">{{$dhtt->price}} đ</strike>{{$dhtt->discount}} đ</p>
@endif
    </div>
   @endforeach
    
  </div>
  <!-- <div>
    <button style="margin-top: 30px; margin-left: 640px; margin-bottom: 30px">XEM THÊM</button>
  </div> -->
  <div class="row">
  	<p style="margin-left: 120px">{{$dhtreotuong->links()}}</p>
  </div>

@endsection