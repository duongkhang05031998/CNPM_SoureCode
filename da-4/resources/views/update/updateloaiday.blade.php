@extends('quantri.masterQT')
@section('title','Sửa loại dây')
@section('quanly')
<br>
<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Sửa Loại Dây</h3>
 <hr class="sidebar-divider">
<form enctype="multipart/form-data" method="post" action="{{ route('updateloaiday',$loaiday->id) }}" enctype="multipart/form-data">
	{{csrf_field()}}
	
			<div style="margin-left: 15px; margin-right: 15px" class="form-group row">
				<label class="col-sm-2 col-form-label">Tên loại dây</label>
				<br><br>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="ten" placeholder="Tên loại dây" value="{{$loaiday->name_day}}" required>
					<br>
				</div>
			</div>
	
	
			<div style="margin-left: 15px; margin-right: 15px" class="form-group row">
					<label class="col-sm-2 col-form-label">Mô tả</label>
					<br><br>
					<div class="col-sm-8">
						<textarea type="text" class="form-control" id="mota" name="mota" rows="10" cols="30" style="margin-bottom: 30px" required>{{ $loaiday->mota}}</textarea>
					</div>
			</div>
	
				<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px" data-toggle="modal" data-target="#myModal">Sửa</button>
			
	
</form>


<script >
	

	var button1 = document.getElementById( 'ckfinder-popup-1' );
	
	button1.onclick = function() {
		selectFileWithCKFinder( 'ckfinder-input-1' );
	};
	

	function selectFileWithCKFinder( elementId ) {
		CKFinder.popup( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {	
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}

</script>

@endsection

