@extends('quantri.masterQT')
@section('title','Thêm sản phẩm')
@section('quanly')

<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Thêm Sản Phẩm</h3>

<form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div>
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
	<div style="margin-left: 15px; margin-right: 15px">
		<label style="margin-top: 10px;">Tên</label>
		<input type="text" name="ten"  class="form-control" style="margin-bottom: 30px;" required>
		<table>
			<tr>
				<td>
					Loại máy: <select class="form-control" style="margin-bottom: 30px;" name="loaimay">
						<option value="1">Cơ</option>
						<option value="2">Pin</option>
						<option value="4">Eco</option>
						<option value="3">Treo tường</option>
						<option value="5">Automatic</option>
						<option value="6">Năng lượng mặt trời</option>
						<option value="7">Salar</option>
						<option value="8">Kinetic</option>

					</select>		
				</td>
				<td>
					NSX:<select class="form-control" style="margin-bottom: 30px;" name="nsx">
						<option value="1">CASIO</option>
						<option value="2">CALVIN KLEIN</option>
						<option value="3">ALEXANDRE CHRISTIE</option>
						<option value="4">CANDINO</option>
						<option value="5">CITIZEN</option>
						<option value="6">COVER</option>
						<option value="7">DANIEL WELLINGTON</option>
						<option value="8">ELLE</option>
						<option value="9">FOSSIL</option>
						<option value="10">G_SHOCK</option>
						<option value="11">LOUIS ERARD</option>
						<option value="12">OLYMPIA STAR</option>
						<option value="13">OLYM PIANUS</option>
						<option value="14">ORIENT</option>
						<option value="15">TISSOT</option>
						<option value="16">SEIKO</option>
						<option value="17">SUNRISE</option>
					</select>		
				</td>
				<td>
					Loại dây:<select class="form-control" style="margin-bottom: 30px;" name="loaiday">
						<option value="1">Dây da</option>
						<option value="2">Dây inox</option>
						<option value="3">Dây cao su</option>
						<option value="4">Dây lưới</option>
						<option value="5">Dây vải</option>
						<option value="6">Dây titanium</option>

					</select>	
				</td>
				<td>
					Mã:<input type="text" name="madh"  class="form-control" style="margin-bottom: 30px;" required>
				</td>

			</tr>
			<tr>
				<td colspan="3">
					Ảnh:<br>
					<input id="ckfinder-input-1" type="text" name="imagelink" class="form-control" style="margin-bottom: 30px;" required >
					<button type="button" id="ckfinder-popup-1" class="button-a button-a-background" style="margin-top: -15px">Browse</button>
				</td>
				
			</tr>

		</table>
		<br><br>
		Mô tả:
		<textarea id="editor1" class="ckeditor" name="mota" rows="10" cols="100" style="margin-bottom: 30px" required></textarea>

		<script type="text/javascript">
			CKEDITOR.replace( 'editor1', {
				filebrowserBrowseUrl: '{{ asset('public/editor/ckfinder/ckfinder.html') }}',
				filebrowserImageBrowseUrl: '{{ asset('public/editor/ckfinder/ckfinder.html?type=Images') }}',
				filebrowserFlashBrowseUrl: '{{ asset('public/editor/ckfinder/ckfinder.html?type=Flash') }}',
				filebrowserUploadUrl: '{{ asset('public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
				filebrowserImageUploadUrl: '{{ asset('public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
				filebrowserFlashUploadUrl: '{{ asset('public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
			} );
		</script>
		<table >
			<tr>
				<td>
					Giá:
					<input type="number" name="gia"  class="form-control" style="margin-bottom: 30px;" required>
				</td>
				<td>
					Giảm giá:

					<input type="number" name="giamgia"  class="form-control" style="margin-bottom: 30px;">	
				</td>
				
				<td>
					Size:<input type="text" name="size"  class="form-control" style="margin-bottom: 30px;">	
				</td>
				<td>
					Dạng:<input type="text" name="dang"  class="form-control" style="margin-bottom: 30px;">	
				</td>
			</tr>
			<tr>
				<td>
					Ngày nhập hàng:
					<input type="date" name="ngaydang"  class="form-control" style="margin-bottom: 30px;">
				</td>
				{{-- <td>
					Urlanh:
					<input type="text" name="imagelist"  class="form-control" style="margin-bottom: 30px;">
				</td> --}}
				<td>
					Giới tính:
					<select class="form-control" style="margin-bottom: 30px;" name="gioitinh">
						<option value="nam">Nam</option>
						<option value="nữ">Nữ</option>
						<option value="đôi">Đôi</option>


					</select>	
				</td>
				<td>
					Loại kính:<input type="text" name="loaikinh"  class="form-control" style="margin-bottom: 30px;">	
				</td>
				<td>
					Bảo hành: <input type="text" name="baohanh"  class="form-control" style="margin-bottom: 30px;" required>
				</td>
			</tr>
			<tr>
				<td>
					Chống nước:<input type="text" name="chongnuoc"  class="form-control" style="margin-bottom: 30px;">
				</td>
				<td>
					Xuất xứ:<input type="text" name="xuatxu"  class="form-control" style="margin-bottom: 30px;" required>
				</td>
				<td>
					Trạng thái:<input type="text" name="trangthai"  class="form-control" style="margin-bottom: 30px;">
				</td>
				
			</tr>
		</table>
		<button class="btn btn-danger float-right" style="margin-right: 7px; margin-left: 10px" data-toggle="modal" data-target="#myModal">Thêm</button>
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

