@extends('quantri.masterQT')
@section('title','Quản Lý Loại Dây')
@section('quanly')

<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Quản Lý Loại Dây &nbsp;/&nbsp;{{count($loaiday)}} Loại</h3>
	<br><br>
	<form class="form-inline">
		<input class="timkiem form-control " type="text" id="search" name="search" placeholder="Tìm kiếm" style="width: 600px; margin-left: 220px	">
	</form>
	</div>
	<br><br><br>
	<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px" data-toggle="modal" data-target="#myModal">Thêm</button>
	
	<div style="margin-top: 20px; margin-left: 10px">
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
	<br><br>
	<table class="table table-bordered  table-hover "  style="margin:10px;">

		<tr class="bg-danger ">

			<th>Stt</th>
			<th >Tên</th>
			<th>Mô tả</th>
			
			<th colspan="2">Chức năng</th>
		</tr>
		
		<tbody class="danhsach">
		@foreach($ld as $loaiday)
		<tr>
			<td>{{$loaiday -> id}}</td>
			<td>{{$loaiday -> name_day}}</td>
			<td>{{$loaiday -> mota}}</td>
			
				<td>
					<button class="btn btn-primary" ><a href="{{ route('updateloaiday',$loaiday->id) }}"  
					style="color:white" >Sửa</a></button>
				</td>
				
			<td><form action="{{ route('deleteloaiday',$loaiday->id) }}" method="get" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
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
			{{$ld->links()}}
		</tr>
</div>
  

{{-- thêm --}}

<form method="POST" action="{{ route('addloaiday') }}" enctype="multipart/form-data">	
{{csrf_field()}}	
			<div class="modal fade " id="myModal" role="dialog">
				<div class="modal-dialog">


					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<table style=" width: 100%" >
								<tr>
									<td colspan="2" class="text-center"><h3>Thêm loại dây</h3></td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label>Tên loại dây:</label>
											<input type="text" class="form-control" name="name" placeholder="Tên loại dây"  >
										</div>
									</td>
								</tr>
								
									
									<tr>


										<td>
											<div class="form-group ">
												<label>Mô tả:</label>
												<textarea type="text" name="mota" class="form-control" placeholder="Mô tả" hidden="100px"></textarea>
												
											</div>
										</td>
										
									</tr>
											
								</table>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-default"  >Save</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								
							</div>
						</div>

					</div>
				</div>
			</form>


{{-- Sửa --}}

<form method="POST" action="" enctype="multipart/form-data">	
{{csrf_field()}}	
			<div class="modal fade " id="edit" role="dialog">
				<div class="modal-dialog">


					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<table style=" width: 100%" >
								<tr>
									<td colspan="2" class="text-center"><h3>Sửa loại dây</h3></td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label>Tên loại dây:</label>
											<input type="text" class="form-control" name="ten" placeholder="tên thương hiệu"  >
										</div>
									</td>
								</tr>
								
									
									<tr>


										<td>
											<div class="form-group ">
												<label>Mô tả:</label>
												<textarea type="text" name="mo_ta" class="form-control" placeholder="mô tả" hidden="100px"></textarea>
											</div>
										</td>
										
									</tr>
											
								</table>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-default"  >Save</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								
							</div>
						</div>

					</div>
				</div>
			</form>





<script type="text/javascript">
	
	$('#search').on('keyup',function(){
		$value = $(this).val();
		$.ajax({

			type : 'get',
			url  :  '{{route('searchQLLD')}}',
			data : {'search':$value},
			success:function(data){
				$('.danhsach').html(data);
			}
		});
	})

</script>

@endsection
