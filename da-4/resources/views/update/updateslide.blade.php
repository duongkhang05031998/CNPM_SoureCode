@extends('quantri.masterQT')
@section('title','Sửa slide header')
@section('quanly')

<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Sửa Slide</h3>

<form method="post" action="{{ route('updateslide',$slide->id) }}" enctype="multipart/form-data">
	{{csrf_field()}}
	
	<div style="margin-left: 15px; margin-right: 15px">
		<label style="margin-top: 10px;">Tên</label>
		<input type="text" name="name"  class="form-control" style="margin-bottom: 30px;"value="{{$slide->name}}">
		<table>
			<tr>
				<td colspan="3">
					<label style="margin-top: 10px;">Ảnh</label><br>
					<input id="ckfinder-input-1" type="text" name="image" class="form-control" style="margin-bottom: 30px;" value="{{$slide->image}}" >
					<button type="button" id="ckfinder-popup-1" class="button-a button-a-background" style="margin-top: -15px">Browse</button>
				</td>
				
			</tr>
			<br><br>
		</table>
	
		<br><br>
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

