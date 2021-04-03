@extends('quantri.masterQT')
@section('title','Quản Lý Hóa Đơn')
@section('quanly')


<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px; margin-top: 0px" >Quản Lý Đơn Hàng {{-- &nbsp;/&nbsp;{{count($hd)}} Đơn Hàng --}}</h3>
	<div style="margin-top: 20px">

		@if(Session::has('thanhcong'))
			<div class="alert alert-success">
				{{Session::get('thanhcong')}}
			</div>
			@endif
		</div>
	<br><br>
	<form class="form-inline">
		<input class="timkiem form-control " id="search" name="search" type="text" placeholder="Tìm kiếm" style="width: 600px; margin-left: 220px	">
	</form>
	</div>
	<br><br><br>
	<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px"><a href="{{ route('qlhuyhang') }}"  style="color: white;text-decoration: none;float: left;">Hóa đơn đã hủy</a></button>
	{{-- <button class="btn btn-danger float-right" style="margin-right: 7px"><a href="{{ route('qlhd') }}" style="color: white;text-decoration: none;">Làm mới</a></button> --}}
	<br><br>
	<table class="table table-bordered  table-hover "  id="" style="margin:10px;">

		<tr class="bg-danger ">

			<th>Stt</th>
			<th >Tên khách hàng</th>
			<th>Tổng tiền</th>
			<th>Payment</th>
			<th>Ghi chú</th>
			<th>Trạng thái</th>
			<th>Ngày tạo</th>
			
			<th colspan="3" style="text-align: center;">Chức năng</th>
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
		@foreach($hoadon as $h_d)
			@php
			$stt++;	
			@endphp
		<tr>
			<td>{{$stt}}</td>
			<td>{{$h_d->customer->name}}</td>
			<td>{{number_format($h_d->total)}} VNĐ</td>
			<td>{{$h_d->payment}}</td>
			<td>{{$h_d->note}}</td>
			<td>{{$h_d->trang_thai}}</td>
			<td>{{$h_d->date_order}}</td>
			<td>
				<form method="post" action="{{ route('ban_hang',$h_d->id) }}"  onsubmit="return confirm('Đã giao hàng ?')">
					{{csrf_field()}}
					<button class="btn btn-primary"  style="color: white" type="submit">Đã GH</button>
				</form>
			</td>
			<td>
				<form method="post" action="{{ route('huy_hang',$h_d->id) }}"  onsubmit="return confirm('Bạn có chắc chắn hủy đơn hàng không ?')">
					{{csrf_field()}}
					<button class="btn btn-primary"  style="color: white" type="submit">Hủy đơn</button>
				</form>
			</td>
			<td><button type="button" class="btn btn-primary" ><a href="{{ route('cthd',$h_d->id) }}"  style="color:white">CT</a></button></td>
		</tr>
		@endforeach
		
		</tbody>

	</table>

</div>
<div  style="margin-left: 10px">
	<tr>
			{{$hoadon->links()}}
		</tr>
</div>
  	
 
<script type="text/javascript">
	
	$('#search').on('keyup',function(){
		$value = $(this).val();
		$.ajax({

			type : 'get',
			url  :  '{{route('searchDH')}}',
			data : {'search':$value},
			success:function(data){
				$('.danhsach').html(data);
			}
		});
	})

</script>

@endsection