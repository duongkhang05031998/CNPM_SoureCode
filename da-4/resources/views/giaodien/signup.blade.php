@extends('giaodien.master')
@section('title','Signup  ')
@section('content')

<div class="container" style="margin-bottom: 100px; margin-top: 100px">
	<form action="{{ route('dangky') }}" method="POST" class="beta-form-checkout">
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
		<div class="row">

			<div class="col-sm-3"></div>
			
			<div class="col-sm-6">
				<h4 style="font-family: sans-serif;font-size: 28px">Đăng Ký</h4>
				<div class="space20">&nbsp;</div>

				
				<div class="form-block" style="margin-top: 10px">
					<label for="email">Email address*</label>
					<input type="email" name="email" style="margin-left: 99px; width: 333px;height: 37px" required placeholder="&nbsp;nhập email">
				</div>
				<div class="form-block" style="margin-top: 20px">
					<label for="name">Fullname*</label>
					<input type="text" name="name" style="margin-left: 131px; width: 333px;height: 37px" required placeholder="&nbsp;nhập họ tên">
				</div>
				<div class="form-block" style="margin-top: 20px">
					<label for="diachi">Address*</label>
					<input type="text" name="diachi" style="margin-left: 139px; width: 333px;height: 37px" required placeholder="&nbsp;nhập địa chỉ">
				</div>
				<div class="form-block" style="margin-top: 20px">
					<label for="phone">Phone*</label>
					<input type="number" name="phone" style="margin-left: 151px; width: 333px;height: 37px" required placeholder="&nbsp;nhập số điện thoại">
				</div>
				<div class="form-block" style="margin-top: 20px">
					<label for="pass">Password*</label>
					<input type="Password" name="pass"  required style="margin-left: 129px;width: 333px; height: 37px" placeholder="&nbsp;nhập mật khẩu">
				</div>
				<div class="form-block" style="margin-top: 20px">
					<label for="repass">Re password*</label>
					<input type="Password" name="repass" style="margin-left: 107px; width: 333px;height: 37px" required placeholder="&nbsp;nhập lại mật khẩu">
				</div>
				<div class="form-block" style="margin-top: 20px">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</form>
</div>

@endsection