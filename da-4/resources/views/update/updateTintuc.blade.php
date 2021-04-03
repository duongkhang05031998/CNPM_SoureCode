@extends('quantri.masterQT')
@section('title','Sửa tin tức')
@section('quanly')

<h3 style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Sửa Tin Tức</h3>

<form method="POST" action="{{ route('updateTintuc',$tintuc->id) }}" enctype="multipart/form-data">
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
		<input type="text" name="ten"  class="form-control" style="margin-bottom: 10px;width: 500px;font-size: 13px" value="{{$tintuc->ten_tin}}" required>
		
		<label style="margin-top: 10px;">Ảnh</label>
		<input type="text" name="image"  class="form-control" style="margin-bottom: 30px;width: 500px;font-size: 13px" value="{{$tintuc->image}}" required>

		<label style="margin-top: 10px;">Người Đăng</label>
		<input type="text" name="nguoidang"  class="form-control" style="margin-bottom: 10px;width: 500px;font-size: 13px" value="{{$tintuc->nguoi_dang}}" required>

		Nội dung:
		<textarea id="editor1" class="ckeditor" name="noidung" rows="10" cols="100" style="margin-bottom: 30px" required>{{$tintuc->noi_dung}}</textarea>
 		
		<script type="text/javascript">
		CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
		</script>
		<br><br>
		<button class="btn btn-danger float-right" style="margin-right: 20px; margin-left: 15px" data-toggle="modal" data-target="#myModal">Sửa</button>
	</div>
</form>

@endsection

