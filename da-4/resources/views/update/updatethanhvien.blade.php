@extends('quantri.masterQT')
@section('title','Sửa sản phẩm')
@section('quanly')


<br><br>
<h3  style="font-family: cursive;margin-left: 10px;margin-top: 0px" >Sửa Thành Viên </h3>
 <hr class="sidebar-divider">
<form enctype="multipart/form-data" method="post" action="{{ route('updatethanhvien',$thanhvien->id) }}" enctype="multipart/form-data">
	{{csrf_field()}}
	
	<div style="margin-left: 15px; margin-right: 15px" class="form-group row">
            <label class="col-sm-2 col-form-label">Tên</label>
			<br><br>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="name" placeholder="Tên" value="{{$thanhvien->name}}" required>
				<br>
            </div>
    </div>
	
	<div style="margin-left: 15px; margin-right: 15px" class="form-group row">
            <label class="col-sm-2 col-form-label">Address</label>
			<br><br>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{$thanhvien->address}}" required>
				<br>
            </div>
    </div>
	
	<div style="margin-left: 15px; margin-right: 15px" class="form-group row">
            <label class="col-sm-2 col-form-label">Phone</label>
			<br><br>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$thanhvien->phone}}" required>
				<br><br>
            </div>
    </div>

    <div style="margin-left: 15px; margin-right: 15px" class="form-group row">
            <label class="col-sm-2 col-form-label">Quyền</label>
			<br><br>
            <div class="col-sm-4">
            	<select class="form-control" name="access">
                      <option value="0" 
                      	@if($thanhvien->access == 0)
                      	{{"selected"}} 
                      	@endif > Người dùng thường</option>
                      <option value="1" 
                      	@if($thanhvien->access == 1)
                      	{{"selected"}} 
                      	@endif >Admin</option>
                  </select>
                
				<br><br>
            </div>
    </div>
		<br><br><br><br>
		<button class="btn btn-danger float-right" style="margin-right: 20px; margin-left: 15px" data-toggle="modal" data-target="#myModal">Sửa</button>
	
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

