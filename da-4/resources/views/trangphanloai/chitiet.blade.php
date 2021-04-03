@extends('giaodien.master')
@section('title','Chi tiết sản phẩm  ')
@section('content')

<div style="width: 100%; height: 65px; background-color: #ECE7E7">
	<p style="font-size: 14px;margin-left:83px;padding-top: 22px"><a style="color: black" href="{{ route('trangchu') }}">Trang Chủ</a> &nbsp;/&nbsp;<a style="color: black" href="{{ route('thuonghieu',$th->id) }}">Đồng hồ {{$th->name_producer}}</a>&nbsp;/&nbsp;{{$sanpham->name_product}}</p>
</div>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-6" id="image_chitiet" >
			<img src="{{$sanpham->image_link}}" width="450" height="550"> 
		</div>
		<div class="col-lg-6">
			<p style="font-size: 30px; text-align: center;margin-right: 50px; margin-left: 50px">{{$sanpham->name_product}}</p>
			<p style="font-size: 25px; text-align: center; color: orange"><strike style="color: grey; margin-right: 10px">{{number_format($sanpham->price)}} đ</strike>{{number_format($sanpham->discount)}} đ</p>
			{{-- <input type="number" name="" value="1" style="float: left;width: 50px; margin-left: 230px;margin-top: 4px"> --}}
			<button class="btn btn-success" style="margin-left: 140px"><a style="color: white; text-decoration: none" href="{{ route('themgiohang',$sanpham->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Giỏ hàng</a></button>
			<button class="btn btn-danger" style="margin-left: 20px"><a style="color: white; text-decoration: none" href="{{ route('dathang') }}">Đặt hàng &nbsp;<i class="fa fa-chevron-right"></i></a></button>
			
			<br>
			<hr>
			<br>
			<p style="font-size: 14px; margin-left: 50px;">Mã Đồng Hồ:&nbsp; {{$sanpham->ma}}</p>
			<p style="font-size: 14px; margin-left: 50px;">Danh Mục:&nbsp; <a style="color: black" href="{{ route('thuonghieu',$th->id) }}">ĐỒNG HỒ {{$th->name_producer}}</a>,&nbsp;<a href="{{ route('loaimay',$l_m->id) }}" style="color: black">LOẠI MÁY {{$l_m->name_loai}}</a>,&nbsp;<a href="{{ route('loaiday',$l_d->id) }}" style="color: black">LOẠI DÂY {{$l_d->name_day}}</a></p>
			<p style="font-size: 14px; margin-left: 50px;">Tag: &nbsp; <a style="color: black" href="{{ route('thuonghieu',$th->id) }}">ĐỒNG HỒ {{$th->name_producer}}</a>,&nbsp;<a href="{{ route('loaimay',$l_m->id) }}" style="color: black">LOẠI MÁY {{$l_m->name_loai}}</a>,&nbsp;<a href="{{ route('loaiday',$l_d->id) }}" style="color: black">LOẠI DÂY {{$l_d->name_day}}</a></p>
			<p style="font-size: 14px; margin-left: 50px;">Share:  </p>
		</div>
	</div>
</div>
<br><br>

{{-- thông tin sản phẩm --}}

<div  style="background-color: #F5F2F2" >
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<table class="table" >
					<tr>
						<td style="font-weight: bold;">Bảo hành chính hãng</td>
						<td style="text-align: right;">{{$sanpham->bao_hanh}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Chống nước</td>
						<td style="text-align: right;">{{$sanpham->chong_nuoc}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Dạng mặt số</td>
						<td style="text-align: right;">{{$sanpham->dang_mat_so}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Giới tính</td>
						<td style="text-align: right;">{{$sanpham->gioi_tinh}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Loại dây</td>
						<td style="text-align: right;">{{$l_d->name_day}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Loại kính</td>
						<td style="text-align: right;">{{$sanpham->loai_kinh}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Loại máy</td>
						<td style="text-align: right;">{{$l_m->name_loai}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Size mặt số</td>
						<td style="text-align: right;">{{$sanpham->size_mat_so}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Thương hiệu</td>
						<td style="text-align: right;">{{$th->name_producer}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Xuất xứ</td>
						<td style="text-align: right;">{{$sanpham->xuat_xu}}</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Bảo hành tại cửa hàng</td>
						<td style="text-align: right;">5 năm</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					
				</table>
			</div>
			<div class="col-lg-6">
				<img src="public\f.jpg" width="500" height="550" style="margin-left: 50px">
			</div>
		</div>
		<br><br><br>

		<div style="font-size: 13px;">
			<?php echo $sanpham->content ?> 
			
			
		</div>
		<br>

	</div>
</div>

{{-- commnet --}}


<div class="container" style="margin-top: 30px">
	@if(Auth::check())
	<div class="row">
		<div class="col-lg-9" >
			<h3>Viết bình luận ...<i class="fa fa-pen"></i></h3>
			@if(Session::has('thanhcong'))
			<div class="alert alert-success">
				{{Session::get('thanhcong')}}
			</div>
			@endif
			<form method="post"  action="{{ route('binhluan',$sanpham->id) }}" role="form">
				{{csrf_field()}}
				<textarea class="form-control" name="noidung" style="width: 100%; height: 100px; margin-top: 10px; margin-left: 0" ></textarea>
				<button type="submit" class="btn btn-primary" style="margin-top: 20px; width: 70px">Gửi</button>
			</form>

		</div>
		<div class="col-lg-3">
			
		</div>
	</div>

	<hr style=" width: 826px; margin-left: 0px">
	@endif
</div>

{{-- danh sách comment --}}

<div class="container" style="margin-top: 30px" >
	<h4>Bình luận ( {{count($comment)}} )</h4>
	<br>
	<div>
		<div class="col-lg-9">
			@foreach($comment as $cm)
			<div>
			<img src="{{$cm->user->image}}" width="50px" height="50px" style="border: 0.5px solid #E3D8D8; float: left; margin-right: 20px">
			<h5 style="padding-top: 12px">{{$cm->user->name}} <span style="font-size: 10px; color: red">({{$cm->created_at}})</span></h5>
			<br>
			<p>{{$cm->noidung}}</p>
			</div>
			<hr style=" width: 812px; margin-left: 0px">
			@endforeach

		</div>
		<div class="col-lg-3">
			
		</div>
	</div>
	<div>
		{{$comment->links()}}
	</div>
</div>

{{-- sản phẩm tương tự --}}

<div>
	<div>
		<br><br><br>
		<h3 style="margin-left: 117px">Bạn có thể sẽ thích ?</h3>
	</div>
	<br><br>
	<div class="row" style="margin-right: 50px; margin-left: 50px">

		@foreach($sp_khac as $spk)

		<div class="col-lg-3">
			<a href="{{ route('chitiet',$spk->id) }}"><img class="image" src="{{$spk->image_link}}" width="250" height="300" style="margin-left: 50px"></a>
			<div class="middle">
				<div class="text"><button type="button" class="btn btn-secondary"><a style="color:white;text-decoration: none;" href="{{ route('themgiohang',$spk->id) }}"><i class="fas fa-cart-plus"></i>&nbsp;Mua ngay</a></button></div>
			</div>
			<p style="font-size: 14px;text-align: center; margin-left: 100px;margin-top: 10px ">
				<a style="color:black;text-decoration: none;" href="{{ route('chitiet',$spk->id) }}"> {{$spk->name_product}}</a>
			</p>
			@if($spk->discount == 0)      
			<p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange">{{number_format($spk->price)}} đ</p>
			@else
			<p style="font-size: 15px;text-align: center; margin-left: 100px;  color: orange"><strike style="color: grey; margin-right: 10px;">{{number_format($spk->price)}} đ</strike>{{number_format($spk->discount)}} đ</p>
			@endif
		</div>
		@endforeach
	</div>
</div>
<br><br>

@endsection