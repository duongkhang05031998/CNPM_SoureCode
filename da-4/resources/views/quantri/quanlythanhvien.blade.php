@extends('quantri.masterQT')
@section('title','Quản Lý Sản Phẩm')
@section('quanly')


<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px; margin-top: 0px" >Quản Lý Thành Viên &nbsp;/&nbsp;{{count($thanhvien)}} Thành Viên</h3>
	<br><br>
	<form class="form-inline">
		<input class="timkiem form-control " type="text" id="search" name="search" placeholder="Tìm kiếm" style="width: 600px; margin-left: 220px	">
	</form>
	</div>
	<br><br><br>
	{{-- <button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px"><a href="" target="_blank" style="color: white;text-decoration: none;float: left;">Thêm</a></button> --}}
	
	<br><br>
	<div style="margin-top: 20px">
		@if(count($errors)>0)
		<div class="alert alert-danger"> 
			@foreach($errors->all() as $err)
			{{$err}}
			@endforeach
		</div>
		@endif
		@if(Session::has('thanhcong'))
		<div class="alert alert-success">
			{{Session::get('thanhcong')}}
		</div>
		@endif
	</div>
	<table class="table table-bordered  table-hover "  id="" style="margin:10px;">

		<tr class="bg-danger ">

			<th>Stt</th>
			<th>Name</th>
			<th>Image</th>
			<th>Email</th>
			<th>Address</th>
			<th>Phone</th>	
			<th>Quyền hạn</th>	
			<th colspan="3">Chức năng</th>
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
		@foreach($thanhvien as $TV)
		@php
			$stt++;	
			@endphp
		<tr>
			<td>{{$stt}}</td>
			<td>{{$TV -> name}}</td>
			<td><img src="{{$TV -> image}}" width="50px" height="50px"></td>
			<td>{{$TV -> email}}</td>
			<td>{{$TV -> address}}</td>
			<td>{{$TV -> phone}}</td>
			<td>{{$TV -> access}}</td>

			<td>
			<td>
				<button class="btn btn-primary" ><a href="{{ route('updatethanhvien',$TV->id) }}"  style="color:white">Sửa</a></button></td>
			</td>


			<td><form action="{{ route('deletethanhvien',$TV->id) }}" method="get" onsubmit="return confirm('Bạn có chắc chắn xóa không ?')">
					{{csrf_field()}}
					<button class="btn btn-primary"  style="color: white" type="submit">Xóa</button>
				</form></td>
		</tr>
		@endforeach
		
		</tbody>

	</table>

</div>
<div  style="margin-left: 10px">
	<tr>
			{{$thanhvien->links()}}
		</tr>
</div>
  	
 




<script type="text/javascript">
	
	$('#search').on('keyup',function(){
		$value = $(this).val();
		$.ajax({

			type : 'get',
			url  :  '{{route('searchQLTV')}}',
			data : {'search':$value},
			success:function(data){
				$('.danhsach').html(data);
			}
		});
	})

</script>
@endsection
