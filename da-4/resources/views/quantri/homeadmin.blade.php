@extends('quantri.masterQT')
@section('title','Trang quản trị')
@section('quanly')

<section class="content-header" style="margin-bottom: 30px">

	<h1>
		Administration
		<small>KTShop</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('trangchu') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>



<div class="row" style="margin-left: 15px; margin-right: 15px">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-eye-open" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Views</span>
				<span class="info-box-number">0</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-google-plus" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Comments</span>
				<span class="info-box-number">{{count($comment)}}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix visible-sm-block"></div>

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Sales</span>
				<span class="info-box-number">{{count($hoadon)}}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Members</span>
				<span class="info-box-number">{{count($user)}}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>

<div class="row" style="margin-top: 50px; margin-left: 15px;margin-right: 15px">
	<div class="col-lg-8">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Latest Orders</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table class="table no-margin">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Customer</th>
								<th>Payment</th>
								<th>TotalPrice</th>
								<th>DateOrder</th>
							</tr>
						</thead>
						<tbody>
							@foreach($bill as $od)
							<tr>
								<td><a href="">{{$od->id}}</a></td>
								<td>{{$od->customer->name}}</td>
								<td style="padding-top: 12px"><span class="label label-success">{{$od->payment}}</span></td>
								<td style="padding-top: 12px"><span class="label label-success">{{number_format($od->total)}} VNĐ</span></td>
								<td style="padding-top: 12px"><span class="label label-success">{{$od->date_order}}</span></td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer clearfix">
				<a href="{{ route('qlhd') }}" class="btn btn-sm btn-info btn-flat pull-left">View All Orders</a>
				
			</div>
			<!-- /.box-footer -->
		</div>
	</div>

	<div class="col-lg-4">
		<!-- Info Boxes Style 2 -->
		<div class="info-box bg-yellow" style="margin-bottom: 21px">
			<span class="info-box-icon"><i class="glyphicon glyphicon-time" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text" style="font-size: 22px">Đồng Hồ</span>
				<span class="info-box-number">{{count($sp)}} Sản Phẩm</span>

				
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
		<div class="info-box bg-green" style="margin-bottom: 22px">
			<span class="info-box-icon"><i class="glyphicon glyphicon-inbox" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text" style="font-size: 22px">Thương Hiệu</span>
				<span class="info-box-number">{{count($th)}} Thương Hiệu</span>

				
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
		<div class="info-box bg-red" style="margin-bottom: 22px">
			<span class="info-box-icon"><i class="glyphicon glyphicon-road" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text" style="font-size: 22px">Loại Máy</span>
				<span class="info-box-number">{{count($lm)}} Loại</span>

				
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
		<div class="info-box bg-aqua">
			<span class="info-box-icon"><i class="glyphicon glyphicon-cd" style="margin-top: 23px"></i></span>

			<div class="info-box-content">
				<span class="info-box-text" style="font-size: 22px">Loại Dây</span>
				<span class="info-box-number">{{count($ld)}} Loại</span>

				
			</div>
			<!-- /.info-box-content -->
		</div>	
	</div>
@endsection
