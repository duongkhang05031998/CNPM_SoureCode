@extends('quantri.masterQT')
@section('title','Sửa Thương Hiệu')
@section('quanly')

<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Sửa Thương Hiệu </h3>

<form method="post" action="{{ route('updatethuonghieu',$thuonghieu->id) }}" enctype="multipart/form-data">
	{{csrf_field()}}
	
	<div style="margin-left: 15px; margin-right: 15px">
		<label style="margin-top: 10px;">Tên</label>
		<input type="text" name="tenthuonghieu"  class="form-control" style="margin-bottom: 30px;"value="{{$thuonghieu->name_producer}}">
		<table>
			<tr>
				<td colspan="3">
					<label style="margin-top: 10px;">Ảnh</label><br>
					<input id="ckfinder-input-1" type="text" name="imagelink" class="form-control" style="margin-bottom: 30px;" value="{{$thuonghieu->image_link}}" >
					<button type="button" id="ckfinder-popup-1" class="button-a button-a-background" style="margin-top: -15px">Browse</button>
				</td>
				
			</tr>
		</table>
		<br><br>
		<label style="margin-top: 10px;">Mô tả</label>
		<textarea class="form-control" id="mota" name="mota" rows="10" cols="100" style="margin-bottom: 30px" >{{$thuonghieu->mota}}</textarea>
		
		<button class="btn btn-danger float-right" style="margin-center: 7px; margin-left: 10px" data-toggle="modal" data-target="#myModal">Sửa</button>
	</div>
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

