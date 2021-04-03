@extends('quantri.masterQT')
@section('title','Quản lý comment')
@section('quanly')

<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px; margin-top: 0px" >Quản Lý Comment &nbsp;/&nbsp;{{count($cm)}} Thành Viên</h3>
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
			<th >Ảnh đại diện</th>
			<th>Tên tài khoản</th>
			<th>Tên sản phẩm</th>
			<th>Comment</th>
			<th>Duyệt</th>
			<th>created-at</th>		
			<th>Chức năng</th>
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
		@foreach($comment as $bl)
		@php
			$stt++;	
			@endphp
		<tr>
			<td>{{$stt}}</td>
			<td><img src="{{$bl->user->image}}" width="50px" height="50px"></td>
			<td>{{$bl->user->name}}</td>			
			<td>{{$bl->product->name_product}}</td>
			<td>{{$bl->noidung}}</td>
			<td>{{$bl->kiemtra}}</td>
			<td>{{$bl->created_at}}</td>	
			<td class="center"><a href="delete/{{$bl->id}}"><i class="icon icon-bin"></i>
			<button class="btn btn-primary"  style="color: white" type="submit">Xóa</button></a>
			</td>
				
		</tr>
		@endforeach
		
		</tbody>

	</table>

</div>
<div  style="margin-left: 10px">
	<tr>
			{{$comment->links()}}
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