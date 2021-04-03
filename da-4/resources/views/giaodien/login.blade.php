@extends('giaodien.master')
@section('title','Login  ')
@section('content')

<div class="container" style="margin-bottom: 100px; margin-top: 100px">
	<form action="{{ route('dangnhap') }}" method="post" class="beta-form-checkout">
		{{csrf_field()}}
		<div>
		@if(count($errors)>0)
			<div class="alert alert-danger"> 
				@foreach($errors->all() as $err)
				{{$err}}
				@endforeach
			</div>
			@endif

		@if(Session::has('flag'))
		<div class="alert alert-{{Session::get('flag')}}">
			{{Session::get('message')}}
		</div>
		@endif
		</div>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4 style="font-family: sans-serif;font-size: 28px">Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block" style="margin-top: 10px">
							<label for="email">Email address*</label>
							<input type="email" name="Email" style="margin-left: 99px; width: 333px;height: 37px" required placeholder="&nbsp;Email">
						</div>
						<div class="form-block" style="margin-top: 20px">
							<label for="phone">Password*</label>
							<input type="Password" name="Password"  required style="margin-left: 129px;width: 333px; height: 37px" placeholder="&nbsp;Password">
						</div>
						<div class="form-block" style="margin-top: 20px">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
</div>

@endsection