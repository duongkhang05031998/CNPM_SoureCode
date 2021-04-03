@extends('quantri.masterQT')
@section('title','Chi Tiết Hóa Đơn')
@section('quanly')

<div>
	<br>
	<h3 style="font-family: cursive;margin-left: 10px; margin-top: 0px;text-align: center;" >Chi tiết hóa đơn số {{$donhang->id}} </h3>
	<br>
	
	<div >
		<h3 style="margin-left: 30px; ">Khách hàng</h3>
		<br>
		<table class="table" style="margin-left: 30px">
			<tr>
				<td>Họ tên:</td>
				<td>{{$donhang->customer->name}}</td>
			</tr>
			<tr>
				<td>Giới tính:</td>
				<td>{{$donhang->customer->gender}}</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>{{$donhang->customer->email}}</td>
			</tr>
			<tr>
				<td>Địa chỉ:</td>
				<td>{{$donhang->customer->address}}</td>
			</tr>
			<tr>
				<td>Số điện thoại:</td>
				<td>0{{$donhang->customer->phone_number}}</td>
			</tr>
			<tr>
				<td>Ghi chú:</td>
				<td>{{$donhang->customer->note}}</td>
			</tr>
			<tr>
				<td>Ngày tạo:</td>
				<td>{{$donhang->created_at}}</td>
			</tr>
		</table>
	</div>
	<br>
	<div>
		<h3 style="margin-left: 30px; ">Sản phẩm</h3>
		<br>
		<table class="table table-bordered  table-hover "  id="" style="margin:10px;margin-left: 30px">

			<tr class="bg-danger ">

				<th>Stt</th>
				<th >Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Ảnh</th>
				<th>Đơn giá</th>
				<th>Xuất xứ</th>
				<th>Số lượng</th>


			</tr>

			<tbody class="danhsach">
				@php
				$stt=0;
				if(isset($_GET['page'])){
					$a=$_GET['page'];
				}
				else{
					$a=1;
				}
				$stt=($a-1)*20;
				@endphp
				@foreach($sanpham as $sp)
				@php
				$stt++;	
				@endphp
				<tr>
					<td>{{$stt}}</td>
					<td>{{$sp->sanpham->ma}}</td>
					<td>{{$sp->sanpham->name_product}} </td>
					<td><img src="{{$sp->sanpham->image_link}}" width="50px" height="50px"></td>
					<td>{{number_format($sp->don_gia)}} Vnđ</td>
					<td>{{$sp->sanpham->xuat_xu}}</td>
					<td>{{$sp->so_luong}}</td>

				</tr>
				@endforeach

			</tbody>

		</table>
	</div>
	<br>
	<div>
		<h3 style="margin-left: 30px; ">Tổng tiền:&nbsp;<span style="color: red">{{number_format($donhang->total)}} Vnđ</span></h3>
		<br>
	</div>

	
</div>


@endsection