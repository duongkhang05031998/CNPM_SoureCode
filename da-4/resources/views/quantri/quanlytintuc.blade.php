@extends('quantri.masterQT')
@section('title','Quản Lý Tin Tức')
@section('quanly')

<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px; margin-top: 0px" >Quản Lý Tin Tức &nbsp;/&nbsp;{{count($tt)}} Bản Tin</h3>
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
	<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px"><a href="{{ route('addtintuc') }}" target="_blank" style="color: white;text-decoration: none;float: left;">Thêm</a></button>
	{{-- <button class="btn btn-danger float-right" style="margin-right: 7px"><a href="" style="color: white;text-decoration: none;">Làm mới</a></button> --}}
	<br><br>
	<table class="table table-bordered  table-hover "  id="" style="margin:10px;">

		<tr class="bg-danger ">

			<th>Stt</th>
			<th>Ảnh</th>
			<th >Tên tin</th>	
			<th>Người đăng</th>
			<th>Ngày đăng</th>
			<th colspan="2">Chức năng</th>
		</tr>
		
		<tbody class="danhsach">
		@foreach($tintuc as $t_t)
		<tr>
			<td>{{$t_t ->id}}</td>
			<td><img src="{{$t_t ->image}}" width="75px" height="50px"></td>
			<td>{{$t_t ->ten_tin}}</td>
			<td>{{$t_t ->nguoi_dang}}</td>
			<td>{{$t_t ->created_at}}</td>
			
			<td><button class="btn btn-primary" ><a href="{{ route('updateTintuc',$t_t->id) }}"  style="color:white">Sửa</a></button></td>
			<td>
				<form action="{{ route('deleteTin',$t_t->id) }}" method="get" onsubmit="return confirm('Bạn có chắc chắn xóa không ?')">
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
			{{$tintuc->links()}}
		</tr>
</div>
  	
 
{{-- <script type="text/javascript">
	
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

</script> --}}

@endsection