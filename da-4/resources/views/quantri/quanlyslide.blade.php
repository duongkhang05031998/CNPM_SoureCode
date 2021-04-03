@extends('quantri.masterQT')
@section('title','Quản Lý Slide')
@section('quanly')

<div>
	<div>
	<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Quản Lý Slide Header</h3>
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
			<th >Tên Slide</th>
			<th>Ảnh Slide</th>
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
		@foreach($sl as $s_l)
			@php
				$stt++;
			@endphp
		<tr>
			<td>{{$stt}}</td>
			<td>{{$s_l ->name}}</td>
			<td><img src="{{$s_l ->image}}" width="110px" height="50px"></td>
			<td><button class="btn btn-primary" ><a href="{{ route('updateslide',$s_l->id) }}"  style="color:white">Sửa</a></button></td>	
			<td><form action="{{ route('deleteslide',$s_l->id) }}" method="get" onsubmit="return confirm('Bạn có chắc chắn xóa không ?')">
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
			{{$sl->links()}}
		</tr>
</div>
  	
  
<form method="POST" action="{{ route('addslide',$s_l->id) }}" enctype="multipart/form-data">	
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
									<td colspan="2" class="text-center"><h3>Thêm slide</h3></td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label>Tên slide:</label>
											<input type="text" class="form-control" name="name" placeholder="tên slide"  >
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group ">
											<label>Ảnh</label>
											<input id="ckfinder-input-1" type="text" name="image" class="form-control" style="margin-bottom: 30px;" value="{{$s_l->image}}" required >
<button type="button" id="ckfinder-popup-1" class="button-a button-a-background" style="margin-top: -15px">Browse</button>
										</div>
									</td>
											
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