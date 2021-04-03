@extends('quantri.masterQT')
@section('title','Quản Lý Loại máy')
@section('quanly')

<div>
	<div>
		<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Quản Lý Loại Máy &nbsp;/&nbsp;{{count($loaimay)}} Loại</h3>
		<br><br>
		<form class="form-inline">
			<input class="timkiem form-control " type="text" id="search" name="search" placeholder="Tìm kiếm" style="width: 600px; margin-left: 220px	">
		</form>
	</div>
	<br><br><br>
	<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px" data-toggle="modal" data-target="#themlm">Thêm</a></button>
	
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
			<th>Mô tả</th>
			
			<th colspan="2">Chức năng</th>
		</tr>
		
		<tbody class="danhsach">
			@foreach($lm as $loaimay)
			<tr>
				<td>{{$loaimay -> id}}</td>
				<td>{{$loaimay -> name_loai}}</td>
				<td>{{$loaimay -> mota}}</td>
				
				<td>
					<button class="btn btn-primary" ><a href="{{ route('updateloaimay',$loaimay->id) }}"  
					style="color:white">Sửa</a></button>
				</td>
				
				
				<td><form action="{{ route('deleteloaimay',$loaimay->id) }}" method="get" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
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
		{{$lm->links()}}
	</tr>
</div>


<form method="POST" action="{{ route('addloaimay') }}" enctype="multipart/form-data">	
	{{csrf_field()}}	
	<div class="modal fade " id="themlm" role="dialog">
		<div class="modal-dialog">


			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<table style=" width: 100%" >
						<tr>
							<td colspan="2" class="text-center"><h3>Thêm loại máy</h3></td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<label>Tên loại máy:</label>
									<input type="text" class="form-control" name="name" placeholder="Tên loại máy"  >
								</div>
							</td>
						</tr>
						
						
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
			url  :  '{{route('searchQLLM')}}',
			data : {'search':$value},
			success:function(data){
				$('.danhsach').html(data);
			}
		});
	})

</script>

@endsection
