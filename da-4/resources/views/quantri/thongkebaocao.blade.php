@extends('quantri.masterQT')
@section('title','Thống Kê - Báo Cáo')
@section('quanly')


<div>
	
	<h3 style="text-align: center; margin-top: 0px; padding-top: 20px">BÁO CÁO THÁNG: 
	<select  >
		<option>1 (01/01/2019 - 31/01/2019)</option>
		<option>2 (01/02/2019 - 28/02/2019)</option>
		<option>3 (01/03/2019 - 31/03/2019)</option>
		<option>4 (01/04/2019 - 30/04/2019)</option>
		<option>5 (01/05/2019 - 31/05/2019)</option>
		
	</select>
	</h3>
	
</div>
<div style="margin-top: 50px; margin-left: 20px">
	<div style="margin-top: 30px">
					<ul class="nav nav-tabs">
						<li class="active" ><a data-toggle="tab" href="#home">Dữ liệu bán hàng</a></li>
						<li ><a data-toggle="tab" href="#menu1">Top sản phẩm bán chạy</a></li>
						<li ><a data-toggle="tab" href="#menu2">Dữ liệu nhập hàng</a></li>
						<li><a data-toggle="tab" href="#menu3">Dữ liệu quảng cáo </a></li>
						<li><a data-toggle="tab" href="#menu4">Thống kê doanh thu tháng </a></li>
					</ul>

					<div class="tab-content">
						<div id="home" class="tab-pane fade in active">
							<br>
							<!-- <button class="btn btn-danger float-right" style="margin-right: 7px"><a href="thembh.php" target="_blank" style="color: white;text-decoration: none;">Thêm</a></button> -->
							<br><br>
							<table class="table table-bordered  table-hover "  id="bangbh">
								
							<tr class="bg-danger ">
									
									<th>Stt</th>
									<th >Mã Sản Phẩm</th>
									<th>Tên Sản Phẩm</th>
									<th>Đơn giá</th>
									<th>Số Lượng bán ra</th>
									<th>Tổng tiền</th>
									
							</tr>
							
							<tbody class="danhsach">
							
							</tbody>
							</table>
						</div>
						<div id="menu1" class="tab-pane fade">
							<br>
							<br>
							<table class="table table-bordered  table-hover" id="bangcs">
								<tr class="bg-danger text-white">
									<th >Stt</th>
									<th>Mã Sản Phẩm</th>
									<th >Tên Sản phẩm</th>
									<th>Số Lượng Bán ra</th>	          		
									
								</tr>
								
							</table>
						</div>
						<div id="menu2" class="tab-pane fade">
							<br>
							<br>
							<table class="table table-bordered  table-hover" id="bangns">
								<tr class="bg-danger text-white">
									<th >Stt</th>
									<th>Mã Sản Phẩm</th>
									<th >Tên Sản Phẩm</th>
									<th>Đơn Giá Nhập</th>
									<th>Số Lượng Nhập</th>
									<th>Tổng tiền</th>
									
								</tr>
								
							</table>
						</div>
						<div id="menu3" class="tab-pane fade">
							<br>
							<br>
							<table class="table table-bordered  table-hover" id="bangtl">
								<tr class="bg-danger text-white">
									<th >Stt</th>
									<th >Tên Người Quảng Cáo</th>
									<th>Vị Trí</th>
									<th>Giá Tiền</th>	          		
									
								</tr>
								
							</table>
						</div>
						<div id="menu4" class="tab-pane fade">
							<br>
							
							<table class="table table-bordered  table-hover" id="bangtk">
								<tr class="bg-danger text-white">
									<th >Tiền Bán Hàng</th>
									<th>Tiền Nhập Hàng</th>
									<th >Doanh Thu Quảng Cáo</th>
									<th>...</th> 		
									
								</tr>
								<tbody class="danhsach">
								
							  </tbody>
							</table>
						</div>
					</div>
				</div>
</div>
@endsection