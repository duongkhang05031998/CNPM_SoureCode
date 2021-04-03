@extends('quantri.masterQT')
@section('title','Quản Lý Sản Phẩm')
@section('quanly')


<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px; margin-top: 0px" >Quản Lý Sản Phẩm &nbsp;/&nbsp;{{count($sanpham)}} Sản Phẩm</h3>
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
	<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px"><a href="{{ route('addproduct') }}" target="_blank" style="color: white;text-decoration: none;float: left;">Thêm</a></button>
	{{-- <button class="btn btn-danger float-right" style="margin-right: 7px"><a href="{{ route('qlsp') }}" style="color: white;text-decoration: none;">Làm mới</a></button> --}}
	<br><br>
	<table class="table table-bordered  table-hover "  id="" style="margin:10px;">

		<tr class="bg-danger ">

			<th>Stt</th>
			<th >Mã</th>
			<th>Tên</th>
			<th>Ảnh</th>
			<th>Giá</th>
			<th>Giảm giá</th>
			<th>Giới tính</th>
			<th>Xuất xứ</th>
			<th>View</th>
			<th colspan="2">Chức năng</th>
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
		@foreach($sp as $sanpham)
		@php
		$stt++;	
		@endphp
		<tr>
			<td>{{$stt}}</td>
			<td>{{$sanpham -> ma}}</td>
			<td>{{$sanpham -> name_product}}</td> 		 
			<td><img src="{{$sanpham -> image_link}}" width="50px" height="50px"></td>
			<td>{{number_format($sanpham -> price)}} </td>
			<td>{{number_format($sanpham -> discount)}} </td>
			<td>{{$sanpham -> gioi_tinh}}</td>
			<td>{{$sanpham -> xuat_xu}}</td>
			<td>{{$sanpham -> view}}</td>
			<td>
				<button class="btn btn-primary" ><a href="{{ route('updateproduct',$sanpham->id) }}"  
					style="color:white">Sửa</a></button>
			</td>
			 <td>
				<form action="" method="get" onsubmit="return confirm('Bạn có chắc chắn xóa không ?')">
					{{csrf_field()}}
					<button class="btn btn-primary"  style="color: white" type="submit">Xóa</button>
				</form>
			</td> 
		</tr>
		@endforeach
		
		</tbody>

	</table>

</div>
<div  style="margin-left: 10px">
	<tr>
			{{$sp->links()}}
		</tr>
</div>
  	
 
<script type="text/javascript">
	
	$('#search').on('keyup',function(){
		$value = $(this).val();
		$.ajax({

			type : 'get',
			url  :  '{{route('searchQT')}}',
			data : {'search':$value},
			success:function(data){
				$('.danhsach').html(data);
			}
		});
	})

</script>

@endsection
