<?php

namespace App\Http\Controllers;
use App\SanPham;
use App\NSX;
use App\LoaiMay;
use App\LoaiDay;
use App\User;
use App\Cart;
use App\customer;
use App\HoaDon;
use App\cthd;
use App\TinTuc;
use App\comment;
use App\slide;
use App\HoaDonNhap;
use App\CTHDnhap;
use App\NhanVien;
use App\ThuongHieu;
use Auth;
use Hash;

use Illuminate\Http\Request;

class admincontroller extends Controller
{	

	public function admin(){
		$sp = SanPham::all();
		$lm = LoaiMay::all();
		$ld = LoaiDay::all();
		$th = NSX::all();
		$user = User::all();
		$comment = comment::all();
		$hoadon = HoaDon::where('trang_thai',1)->get();
		$bill = HoaDon::orderBy('id','desc')->paginate(7);
		return view('quantri.homeadmin', compact('sp','lm','ld','th','user','bill','hoadon','comment'));
	}

	public function quanlysanpham(){
		$sanpham = SanPham::all();
		$sp = SanPham::where('id','>',0)->paginate(20);
		
		return view('quantri.quanlysanpham',compact('sp','sanpham'));
	}

	public function quanlyloaimay(){
		$loaimay = LoaiMay::all();
		$lm = LoaiMay::where('id','>',0)->paginate(20);
		return view('quantri.quanlyloaimay',compact('lm','loaimay'));
	}

	public function quanlyloaiday(){
		$loaiday = LoaiDay::all();
		$ld = LoaiDay::where('id','>',0)->paginate(20);
		return view('quantri.quanlyloaiday',compact('ld','loaiday'));
	}

	public function quanlythuonghieu(){
		$thuonghieu = NSX::all();
		$th = NSX::where('id','>',0)->paginate(20);
		return view('quantri.quanlythuonghieu',compact('th','thuonghieu'));
	}

	public function quanlythanhvien(){
		$tv = User::all();
		$thanhvien = User::where('id','>',0)->paginate(20);
		return view('quantri.quanlythanhvien',compact('thanhvien','tv'));

	}

	public function quanlyhoadon(){
		$hd = HoaDon::all();
		$hoadon = HoaDon::where('trang_thai','Đang sử lý')->paginate(20);
		return view('quantri.quanlyhoadon',compact('hoadon','hd'));

	}	

	public function quanlyhoadonnhap(){
		$hd = HoaDonNhap::all();
		$hoadon = HoaDonNhap::where('id','>',0)->paginate(20);
		return view('quantri.nhaphang',compact('hoadon','hd'));

	}	

	public function quanlybanhang(){
		$hd = HoaDon::all();	
		$hoadon = HoaDon::where('trang_thai','1')->paginate(20);
		return view('quantri.banhang',compact('hoadon','hd'));

	}	

	public function quanlyhuyhang(){
		$hd = HoaDon::all();
		$hoadon = HoaDon::where('trang_thai','0')->paginate(20);
		return view('quantri.donhanghuy',compact('hoadon','hd'));

	}	

	public function quanlytintuc(){
		$tt = TinTuc::all();
		$tintuc = TinTuc::where('id','>',0)->paginate(20);
		return view('quantri.quanlytintuc',compact('tintuc','tt'));

	}	

	public function quanlycomment(){
		$cm = comment::all();
		$comment = comment::where('id','>',0)->paginate(20);
		return view('quantri.quanlycomment',compact('comment','cm'));

	}	

	public function quanlySlide(){
		$slide = slide::all();
		$sl = slide::where('id','>',0)->paginate(20);
		return view('quantri.quanlyslide',compact('sl','slide'));
	}

	public function TKBC(){
		
		return view('quantri.thongkebaocao');
	}

//login

	// public function loginQT(){
	// 	return view('giaodien.loginQT');
	// }

	// public function postLoginQT(Request $req){

	// 	$this->validate($req,
	// 		[
	// 			'password'=>'min:6|max:20'
	// 		],
	// 		[
	// 			'pass.min'=>'Password phải lớn hơn 6 ký tự !',
	// 			'pass.max'=>'Password nhỏ hơn 20 ký tự !'
	// 		]);

	// 	$credentials = array('email'=>$req->Email,'password'=>$req->Password);
	// 	if(Auth::attempt($credentials)){
	// 		return redirect('home-admin');
	// 	}
	// 	else{
	// 		return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản hoặc mật khẩu không chính xác !']);
	// 	}

	// }

	// public function signupAdmin(){
	// 	return view('giaodien.signupAdmin');
	// }

	// public function postSignupAdmin(Request $req){
	// 	$this->validate($req,
	// 		[
	// 			'email'=>'unique:admin,email',
	// 			'pass'=>'min:6|max:20',
	// 			'repass'=>'same:pass'

	// 		],
	// 		[
	// 			'email.unique'=>'Email đã có người sử dụng !',
	// 			'pass.min'=>'Password phải lớn hơn 6 ký tự !',
	// 			'pass.max'=>'Password nhỏ hơn 20 ký tự !',
	// 			'repass.same'=>'Nhập mật khẩu không khớp !'
	// 		]);
	// 	$user = new Admin();
	// 	$user->name = $req->name;
	// 	$user->email = $req->email;
	// 	$user->password =Hash::make($req->pass);
	// 	$user->save();
	// 	return redirect()->back()->with('thanhcong','Tạo tài khoản thành công!');

	// }


//Search


	public function Search(Request $req){

		if($req->ajax())
		{
			$output="";
			$sanpham = SanPham::where('name_product','LIKE','%'.$req->search.'%')->get();
			if($sanpham)
			{

				foreach ($sanpham as $key => $value) {

					$output.=

					'<tr>'.
					'<td>'.$value->id.'</td>'.
					'<td>'.$value->ma.'</td>'.
					'<td>'.$value->name_product.'</td>'.
					'<td>'.'<img src='.$value->image_link.' width="50px" height="50px" >'.'</td>'.
					'<td>'.number_format($value->price).'</td>'.
					'<td>'.number_format($value->discount) .'</td>'.
					'<td>'.$value->gioi_tinh.'</td>'.
					'<td>'.$value->xuat_xu.'</td>'.
					'<td>'.$value->view.'</td>'.
					'<td>'.'<button class="btn btn-primary"   >'.'<a style="color: white" href="" >'.'Sửa'.'</a>'.'</button>'.'</td>'.
					'<td>'.'<button class="btn btn-primary"  style="color: white" type="submit">'.'Xóa'.'</button>'.'</td>'.
					'</tr>';
				}
				return Response($output);
			}
		}

	}


	// public function SearchDH(Request $req){

	// 	if($req->ajax())
	// 	{
	// 		$output="";
	// 		$hoadon = customer::where('name','LIKE','%'.$req->search.'%')->get();
	// 		if($hoadon)
	// 		{

	// 			foreach ($hoadon as $key => $value) {

	// 				$output.=

	// 				'<tr>'.
	// 				'<td>'.$value->hoadon->id.'</td>'.
	// 				'<td>'.$value->name.'</td>'.
	// 				'<td>'.number_format($value->hoadon->total).'</td>'.
	// 				'<td>'.$value->hoadon->payment.'</td>'.
	// 				'<td>'.$value->hoadon->note.'</td>'.
	// 				'<td>'.$value->hoadon->trang_thai.'</td>'.
	// 				'<td>'.$value->hoadon->date_order.'</td>'.
	// 				'<td>'.'<button class="btn btn-primary"   >'.'<a style="color: white" href="" >'.'Đã GH'.'</a>'.'</button>'.'</td>'.
	// 				'<td>'.'<button class="btn btn-primary"  style="color: white" type="submit">'.'Hủy đơn'.'</button>'.'</td>'.
	// 				'<td>'.'<button class="btn btn-primary"  style="color: white" type="submit">'.'CT'.'</button>'.'</td>'.
	// 				'</tr>';
	// 			}
	// 			return Response($output);
	// 		}
	// 	}

	// }


	public function SearchQLLD(Request $req){
		if($req->ajax())
		{
			$output="";
			$loaiday = LoaiDay::where('name_day','LIKE','%'.$req->search.'%')->get();
			if($loaiday)
			{
				foreach ($loaiday as $key => $value){
					$output.='<tr>'.
					'<td>'.$value->id.'</td>'.
					'<td>'.$value->name_day.'</td>'.
					'<td>'.$value->mota.'</td>'.
					'<td>'.'<button class="btn btn-primary"   >'.'<a style="color: white" href="" >'.'Sửa'.'</a>'.'</button>'.'</td>'.
					'<td>'.'<button class="btn btn-primary"  style="color: white" type="submit">'.'Xóa'.'</button>'.'</td>'.
					'</tr>';
				}
				return Response($output);
			}
		}
	}



	public function SearchQLLM(Request $req){
		if($req->ajax())
		{
			$output="";
			$loaimay = LoaiMay::where('name_loai','LIKE','%'.$req->search.'%')->get();
			if($loaimay)
			{
				foreach ($loaimay as $key => $value){
					$output.='<tr>'.
					'<td>'.$value->id.'</td>'.
					'<td>'.$value->name_loai.'</td>'.
					'<td>'.$value->mota.'</td>'.
					'<td>'.'<button class="btn btn-primary"   >'.'<a style="color: white" href="" >'.'Sửa'.'</a>'.'</button>'.'</td>'.
					'<td>'.'<button class="btn btn-primary"  style="color: white" type="submit">'.'Xóa'.'</button>'.'</td>'.
					'</tr>';
				}
				return Response($output);
			}
		}
	}


	public function SearchQLTH(Request $req){
		if($req->ajax())
		{
			$output="";
			$thuonghieu = NSX::where('name_producer','LIKE','%'.$req->search.'%')->get();
			if($thuonghieu)
			{
				foreach ($thuonghieu as $key => $value){
					$output.='<tr>'.
					'<td>'.$value->id.'</td>'.
					'<td>'.$value->name_producer.'</td>'.
					'<td>'.'<img src='.$value->image_producer.' width="75px" height="50px" >'.'</td>'.
					'<td>'.$value->mota.'</td>'.
					'<td>'.'<button class="btn btn-primary"   >'.'<a style="color: white" href="" >'.'Sửa'.'</a>'.'</button>'.'</td>'.
					'<td>'.'<button class="btn btn-primary"  style="color: white" type="submit">'.'Xóa'.'</button>'.'</td>'.
					'</tr>';
				}
				return Response($output);
			}
		}
	}


	public function SearchQLTV(Request $req){
		if($req->ajax())
		{
			$output="";
			$thanhvien = User::where('name','LIKE','%'.$req->search.'%')->get();
			if($thanhvien)
			{
				foreach ($thanhvien as $key => $value){
					$output.='<tr>'.
					'<td>'.$value->id.'</td>'.
					'<td>'.$value->name.'</td>'.
					'<td>'.'<img src='.$value->image.' width="50px" height="50px" >'.'</td>'.
					'<td>'.$value->email.'</td>'.
					'<td>'.$value->address.'</td>'.
					'<td>'.$value->phone.'</td>'.
					'<td>'.$value->created_at.'</td>'.	
					'<td>'.'<button class="btn btn-primary"  style="color: white" type="submit">'.'Xóa'.'</button>'.'</td>'.
					'</tr>';
				}
				return Response($output);
			}
		}
	}



//product

	public function themsanpham(){

		return view('add.addproduct');
	}

	

	public function postSanpham(Request $req){

		$this->validate($req,
			[
				'ten'=>'unique:product,name_product',
				'madh'=>'unique:product,ma'

			],
			[
				'ten.unique'=>'Sản phẩm đã tồn tại !',
				'madh.unique'=>'Mã sản phẩm đã tồn tại !'

			]);

		$sanpham = new SanPham();
		$sanpham->name_product = $req->ten;
		$sanpham->id_producer = $req->nsx;
		$sanpham->id_loai = $req->loaimay;
		$sanpham->id_day = $req->loaiday;
		$sanpham->ma = $req->madh;
		$sanpham->content = $req->mota;
		$sanpham->price = $req->gia;
		$sanpham->discount = $req->giamgia;
		$sanpham->image_link = $req->imagelink;
		// $sanpham->image_list = $req->imagelist;
		$sanpham->created_product = date('Y-m-d');
		$sanpham->gioi_tinh = $req->gioitinh;
		$sanpham->size_mat_so = $req->size;
		$sanpham->dang_mat_so = $req->dang;
		$sanpham->loai_kinh = $req->loaikinh;
		$sanpham->bao_hanh = $req->baohanh;
		$sanpham->chong_nuoc = $req->chongnuoc;
		$sanpham->xuat_xu = $req->xuatxu;
		$sanpham->trang_thai = $req->trangthai;
		$sanpham->save();
		return redirect()->back()->with('thanhcong','Thêm thành công!');	



	}

	public function suasanpham(Request $id){

		$sanpham = SanPham::where('id',$id->id)->first();
		return view('update.updateproduct',compact('sanpham'));
	}


	public function postupdatesanpham(Request $Request,$id){

		
		$sanpham = SanPham::find($id);
		$sanpham->name_product = $Request->input('ten');
		$sanpham->id_producer = $Request->input('nsx');
		$sanpham->id_loai = $Request->input('loaimay');
		$sanpham->id_day = $Request->input('loaiday');
		$sanpham->ma = $Request->input('madh');
		$sanpham->content = $Request->input('mota');
		$sanpham->price = $Request->input('gia');
		$sanpham->discount = $Request->input('giamgia');
		$sanpham->image_link = $Request->input('imagelink');
		$sanpham->image_list = $Request->input('imagelist');
		$sanpham->created_product = $Request->input('ngaydang');
		$sanpham->gioi_tinh = $Request->input('gioitinh');
		$sanpham->size_mat_so = $Request->input('size');
		$sanpham->dang_mat_so = $Request->input('dang');
		$sanpham->loai_kinh = $Request->input('loaikinh');
		$sanpham->bao_hanh = $Request->input('baohanh');
		$sanpham->chong_nuoc = $Request->input('chongnuoc');
		$sanpham->xuat_xu = $Request->input('xuatxu');
		$sanpham->trang_thai = $Request->input('trangthai');

		$sanpham->save();
		return redirect()->route('qlsp')->with('thanhcong','Sửa thành công!');

	}

	public function xoasanpham( $id)
	{
		$sanpham= SanPham::where('id',$id)->delete();
		
		return redirect()->back()->with('thanhcong','Xóa thành công!');
	}








//Thương hiệu

	public function postAddth(Request $req){

		$this->validate($req,
			[
				'name'=>'unique:producer,name_producer',


			],
			[
				'name.unique'=>'Sản phẩm đã tồn tại !'


			]);

		$thuonghieu = new NSX();
		$thuonghieu->name_producer = $req->name;
		$thuonghieu->image_producer = $req->image;
		$thuonghieu->mota = $req->mota;
		
		$thuonghieu->save();
		return redirect()->back()->with('thanhcong','Thêm thành công!');	

	}

	public function suathuonghieu(Request $id){

		$thuonghieu = NSX::where('id',$id->id)->first();
		return view('update.updatethuonghieu',compact('thuonghieu'));
	}


	public function postupdatethuonghieu(Request $Request,$id){

		
		$thuonghieu = NSX::find($id);
		$thuonghieu->name_producer = $Request->input('tenthuonghieu'); //2 cai nay phai giong nhau
		$thuonghieu->image_producer = $Request->input('imagelink');
		$thuonghieu->mota = $Request->input('mota');

		$thuonghieu->save();
		return redirect()->route('qlth')->with('thanhcong','Sửa thành công!');

	}


	public function xoathuonghieu( $id)
	{
		$thuonghieu= NSX::where('id',$id)->delete();
		
		return redirect()->back()->with('thanhcong','Xóa thành công!');
	}

//Loại máy

	public function postAddlm(Request $req){

		$this->validate($req,
			[
				'name'=>'unique:loai,name_loai',


			],
			[
				'name.unique'=>'Sản phẩm đã tồn tại !'


			]);

		$loaimay = new LoaiMay();
		$loaimay->name_loai = $req->name;
		$loaimay->mota = $req->mota;		
		$loaimay->save();
		return redirect()->back()->with('thanhcong','Thêm thành công!');	



	}

	public function sualoaimay(Request $id){

		$loaimay = LoaiMay::where('id',$id->id)->first();
		return view('update.updateloaimay',compact('loaimay'));
	}


	public function postupdateloaimay(Request $Request,$id){

		
		$loaimay = LoaiMay::find($id);
		$loaimay->name_loai = $Request->input('tenloaimay'); //2 cai nay phai giong nhau
		$loaimay->mota = $Request->input('mota');
		

		$loaimay->save();
		return redirect()->route('qllm')->with('thanhcong','Sửa thành công!');

	}
public function xoaloaimay( $id)
	{
		$loaimay= LoaiMay::where('id',$id)->delete();
		
		return redirect()->back()->with('thanhcong','Xóa thành công!');
	}



//Loại dây
	public function postAddld(Request $req){

		$this->validate($req,
			[
				'name'=>'unique:loai_day,name_day',


			],
			[
				'name.unique'=>'Sản phẩm đã tồn tại !'


			]);

		$loaimay = new LoaiDay();
		$loaimay->name_day = $req->name;
		$loaimay->mota = $req->mota;
		
		$loaimay->save();
		return redirect()->back()->with('thanhcong','Thêm thành công!');		

	}


	public function sualoaiday(Request $id){

		$loaiday = LoaiDay::where('id',$id->id)->first();
		return view('update.updateloaiday',compact('loaiday'));
	}


	public function postupdateloaiday(Request $Request,$id){

		
		$loaiday = LoaiDay::find($id);
		$loaiday->name_day = $Request->input('ten'); //2 cai nay phai giong nhau
		$loaiday->mota = $Request->input('mota');
		

		$loaiday->save();
		return redirect()->route('qlld')->with('thanhcong','Sửa thành công!');

	}



	public function xoaloaiday( $id)
	{
		$loaiday= LoaiDay::where('id',$id)->delete();
		
		return redirect()->back()->with('thanhcong','Xóa thành công!');
	}

	

//User

	public function xoathanhvien( $id)
	{
		$thanhvien= User::where('id',$id)->delete();
		
		return redirect()->back()->with('thanhcong','Xóa thành công!');
	}

	public function suathanhvien(Request $id){

		$thanhvien = User::where('id',$id->id)->first();
		return view('update.updatethanhvien',compact('thanhvien'));
	}


	public function postupdatethanhvien(Request $Request,$id){

		
		$thanhvien = User::find($id);
		$thanhvien->name = $Request->input('name');
	
		$thanhvien->address = $Request->input('address');
		$thanhvien->phone = $Request->input('phone');
		$thanhvien->access = $Request->input('access');
	

		$thanhvien->save();
		return redirect()->route('qltv')->with('thanhcong','Sửa thành công!');

	}

//Hóa Đơn

	public function cthd(Request $id){

		$donhang = HoaDon::where('id',$id->id)->first();
		$sanpham = cthd::where('id_bill',$donhang->id)->get();
		return view('quantri.cthoadon',compact('donhang','sanpham'));
	}

	public function postgiao_hang($id){

  	$giaohang = HoaDon::find($id);
  	$giaohang->trang_thai = '1';
  	$giaohang->save();
  	return redirect()->back()->with('thanhcong','Đã giao hàng !');

}

	public function posthuy_hang($id){

  	$giaohang = HoaDon::find($id);
  	$giaohang->trang_thai = '0';
  	$giaohang->save();
  	return redirect()->back()->with('thanhcong','Đã hủy đơn hàng !');
  	}

//Bán hàng


	public function bh(Request $id){

		$donhang = HoaDon::where('id',$id->id)->first();
		$sanpham = cthd::where('id_bill',$donhang->id)->get();
		return view('quantri.banhang',compact('donhang','sanpham'));
	}
//Hủy đơn hàng

	public function huydon(Request $id){

		$donhang = HoaDon::where('id',$id->id)->first();
		$sanpham = cthd::where('id_bill',$donhang->id)->get();
		return view('quantri.donhanghuy',compact('donhang','sanpham'));
	}

//Tin tức

	public function themtintuc(){

		return view('add.addtintuc');
	}


	public function postTintuc(Request $req){

		$this->validate($req,
			[
				'ten'=>'unique:tintuc,ten_tin'
				

			],
			[
				'ten.unique'=>'Tin tức đã tồn tại !'
				

			]);

		$tintuc = new TinTuc();
		$tintuc->ten_tin = $req->ten;
		$tintuc->image = $req->image;
		$tintuc->noi_dung = $req->noidung;
		$tintuc->nguoi_dang = $req->nguoidang;
		
		$tintuc->save();
		return redirect()->back()->with('thanhcong','Thêm thành công!');	



	}


	public function suatintuc(Request $id){

		$tintuc = TinTuc::where('id',$id->id)->first();
		return view('update.updateTintuc',compact('tintuc'));
	}

	public function postupdateTintuc(Request $req,$id){

		
		$tintuc = TinTuc::find($id);
		$tintuc->ten_tin = $req->input('ten');
		$tintuc->image = $req->input('image');
		$tintuc->noi_dung = $req->input('noidung');
		$tintuc->nguoi_dang = $req->input('nguoidang');
		

		$tintuc->save();
		return redirect()->route('qltt')->with('thanhcong','Sửa thành công!');

	}

	public function xoatintuc( $id)
	{
		$tin= TinTuc::where('id',$id)->delete();
		
		return redirect()->back()->with('thanhcong','Xóa thành công!');
	}

	/// quan ly silder header
	
	
	/*public function addslide(){

		return view('quantri.quanlyslide');
	}

	
	public function postaddslide(Request $req){

		$this->validate($req,
			[
				'ten'=>'unique:slide,name',


			]);
		$sl = new slide();
		$sl->name = $req->name;
		$sl->image = $req->image;
		$sl->save();
		return redirect()->back()->with('thanhcong','Thêm thành công!');	

	}*/
	
	
	public function addslide(){

		return view('quantri.quanlyslide');
	}

	

	public function postaddslide(Request $req){

		$this->validate($req,
			[
				'ten'=>'unique:slide,name',
				

			]);

		$sl = new slide();
		$sl->name = $req->name;
		$sl->image = $req->image;
		$sl->save();
		return redirect()->back()->with('thanhcong','Thêm thành công!');	



	}
	
	
	public function suasilde(Request $id){

		$slide = Slide::where('id',$id->id)->first();
		return view('update.updateslide',compact('slide'));
	}


	public function postupdateslide(Request $Request,$id){

		
		$slide = Slide::find($id);
		$slide->name = $Request->input('name'); //2 cai nay phai giong nhau
		$slide->image = $Request->input('image');
		

		$slide->save();
		return redirect()->route('qlSlide')->with('thanhcong','Sửa thành công!');

	}


	public function deleteslide( $id)
	{
		$slide= Slide::where('id',$id)->delete();
		
		return redirect()->back()->with('thanhcong','Xóa thành công!');
	}
	
}