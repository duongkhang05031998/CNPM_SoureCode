@extends('quantri.masterQT')
@section('title','Quản Lý Thương Hiệu')
@section('quanly')

<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Quản Lý Thương Hiệu &nbsp;/&nbsp;{{count($thuonghieu)}} Thương Hiệu</h3>
	<br><br>
	<form class="form-inline">
		<input class="timkiem form-control " type="text" id="search" name="search" placeholder="Tìm kiếm" style="width: 600px; margin-left: 220px	">
	</form>
	</div>
	<br><br><br>
	<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px" data-toggle="modal" data-target="#myModal">Thêm</a></button>
	

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
	<br><br>
	<table class="table table-bordered  table-hover "  id="" style="margin:10px;">

		<tr class="bg-danger ">

			<th>Stt</th>
			<th >Tên</th>
			<th>Ảnh Đại Diện</th>
			<th>Mô tả</th>
			
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
		@foreach($th as $thuonghieu)
			@php
				$stt++;
			@endphp
		<tr>
			<td>{{$stt}}</td>
			<td>{{$thuonghieu -> name_producer}}</td>
			<td><img src="{{$thuonghieu -> image_producer}}" width="75px" height="50px"></td>
			<td>{{$thuonghieu -> mota}}</td>
			
				<td>
					<button class="btn btn-primary" ><a href="{{ route('updatethuonghieu',$thuonghieu->id) }}"  
					style="color:white">Sửa</a></button>
				</td>
				
			
			<td><form action="{{ route('deletethuonghieu',$thuonghieu->id) }}" method="get" onsubmit="return confirm('Bạn có chắc chắn xóa không ?')">
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
			{{$th->links()}}
		</tr>
</div>
  	
  
<form method="POST" action="{{ route('addproducer') }}" enctype="multipart/form-data">	
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
									<td colspan="2" class="text-center"><h3>Thêm thương hiệu</h3></td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label>Tên thương hiệu:</label>
											<input type="text" class="form-control" name="name" placeholder="Tên thương hiệu"  >
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group ">
											<label>Ảnh đại diện:</label>
											<input type="text" name="image" class="form-control" placeholder="Link ảnh" >
										</div>
									</td>
									
									<tr>


										<td>
											<div class="form-group ">
												<label>Mô tả:</label>
												<input type="text" name="mota" class="form-control" placeholder="Mô tả" >
											</div>
										</td>
										
									</tr>
											
								</table>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-default"  >Thêm</button>
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
			url  :  '{{route('searchQLTH')}}',
			data : {'search':$value},
			success:function(data){
				$('.danhsach').html(data);
			}
		});
	})

</script>
@endsection
