<?php

namespace App\Http\Controllers;
use App\slide;
use App\SanPham;
use App\NSX;
use App\LoaiMay;
use App\LoaiDay;
use App\User;
use App\Admin;
use App\Cart;
use App\customer;
use App\HoaDon;
use App\cthd;
use App\TinTuc;
use App\comment;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;


class homecontroller extends Controller
{

//home

public function home(){
    $slide = slide::all();
   	$banchay = SanPham::where('id_producer', '>', 5)->paginate(8);
   	$dhnu = SanPham::where('gioi_tinh','nữ')->paginate(8);
   	$dhnam = SanPham::where('gioi_tinh','nam')->paginate(8);
    $tt = TinTuc::where('id','>',0)->paginate(4);
   	$ncc = NSX::all();
    $loaimay = LoaiMay::all();
	return view('giaodien.home',compact('slide','banchay','dhnu','dhnam','ncc','loaimay','tt'));
}
public function dhnam(){
	$loaimay = LoaiMay::all();
	$ncc = NSX::all();
	$dhnam = SanPham::where('gioi_tinh','nam')->paginate(8);
	return view('trangphanloai.dhnam',compact('ncc','dhnam','loaimay'));
}
public function dhnu(){
  $loaimay = LoaiMay::all();
  $ncc = NSX::all();
  $dhnu = SanPham::where('gioi_tinh','nữ')->paginate(8);
  return view('trangphanloai.dhnu',compact('ncc','dhnu','loaimay'));
}
public function dhdoi(){
  $loaimay = LoaiMay::all();
  $ncc = NSX::all();
  $dhdoi = SanPham::where('gioi_tinh','đôi')->paginate(8);
  return view('trangphanloai.dhdoi',compact('ncc','dhdoi','loaimay'));
}

public function dhtreotuong(){
  $loaimay = LoaiMay::all();
  $ncc = NSX::all();
  $dhtreotuong = SanPham::where('id_loai',3)->paginate(8);
  return view('trangphanloai.treotuong',compact('ncc','dhtreotuong','loaimay'));
}

public function dhhot(){
  $loaimay = LoaiMay::all();
  $ncc = NSX::all();
  $dhhot = SanPham::where('view','>',0)->paginate(20);
  return view('trangphanloai.tophot',compact('ncc','dhhot','loaimay'));
}

//tìm kiếm

public function getSearch(Request $req){
  $sanpham = SanPham::where('name_product','like','%'.$req->key.'%')->get();
  return view('giaodien.search',compact('sanpham'));
}

//giỏ hàng

public function getAddtoCart(Request $req,$id){
  $sanpham = SanPham::find($id);
  $oldCart = Session('cart')?Session::get('cart'):null;
  $cart = new Cart($oldCart);
  $cart->add($sanpham, $id);
  $req->session()->put('cart',$cart);
  return redirect()->back();
}

public function deleteToCart($id){
  $sanpham = SanPham::find($id);
  $oldCart = Session('cart')?Session::get('cart'):null;
  $cart = new Cart($oldCart);
  $cart->removeItem($id);
  session()->put('cart',$cart);
  return redirect()->back();
}


// Comment

public function postComment($id, Request $req){

  $id_product = $id;
  $comment = new comment;
  $comment->id_product = $id_product;
  $comment->id_user = Auth::User()->id;
  $comment->noidung = $req->noidung;
  $comment->save();
  return redirect()->back()->with('thanhcong','bình luận thành công!');;
}

public function xoabinhluan($id)
	{
		$comment = comment::find($id);
        $comment->delete();
        return redirect('ql-comment')->with('thongbao','Xóa thành công!');
	}

// đặt hàng

public function getCheckout(){
  return view('giaodien.checkout');
}

public function postCheckout(Request $req){

  $cart = Session::get('cart');

  $customer = new customer;
  $customer->name = $req->name;
  $customer->gender = $req->gender;
  $customer->email = $req->email;
  $customer->address = $req->adress;
  $customer->phone_number = $req->phone;
  $customer->note = $req->notes;
  $customer->save();


  $bill = new HoaDon;
  $bill->id_customer = $customer->id;
  $bill->date_order = date('Y-m-d');
  $bill->total = $cart->totalPrice;
  $bill->payment = $req->payment;
  $bill->note = $req->notes;
  $bill->trang_thai = 'Đang sử lý';
  $bill->save();

  foreach ($cart->items as $key => $value) {
    $bill_detail = new cthd;
    $bill_detail->id_bill = $bill->id;
    $bill_detail->id_product = $key;
    $bill_detail->so_luong = $value['qty'];
    $bill_detail->don_gia = ($value['price']/$value['qty']);
    $bill_detail->save();
  }

  Session::forget('cart');
  return redirect()->back()->with('thongbao','Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn qua SĐT và email.');
  
}



//login



public function login(){
  return view('giaodien.login');
}

public function postLogin(Request $req){

  $this->validate($req,
    [
      'password'=>'min:6|max:20'
    ],
    [
      'pass.min'=>'Password phải lớn hơn 6 ký tự !',
      'pass.max'=>'Password nhỏ hơn 20 ký tự !'
    ]);
    
    $credentials = array('email'=>$req->Email,'password'=>$req->Password);
    if(Auth::attempt($credentials)){
      return redirect('show');
    }
    else{
      return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản hoặc mật khẩu không chính xác !']);
    }

}
 
public function getLogout(){
  Auth::logout();
  return redirect()->route('trangchu');
}

public function signup(){
  return view('giaodien.signup');
}

public function postSignup(Request $req){
  $this->validate($req,
    [
      'email'=>'unique:users,email',
      'pass'=>'min:6|max:20',
      'repass'=>'same:pass'

    ],
    [
      'email.unique'=>'Email đã có người sử dụng !',
      'pass.min'=>'Password phải lớn hơn 6 ký tự !',
      'pass.max'=>'Password nhỏ hơn 20 ký tự !',
      'repass.same'=>'Nhập mật khẩu không khớp !'
    ]);
  $user = new User();
  $user->name = $req->name;
  $user->email = $req->email;
  $user->password =Hash::make($req->pass);
  $user->address = $req->diachi;
  $user->phone = $req->phone;
  $user->save();
  return redirect()->back()->with('thanhcong','Tạo tài khoản thành công!');

}


// Trang phụ


public function getthuonghieu($type){
  $sp_thuonghieu = SanPham::where('id_producer',$type)->paginate(20);
  $t_h = NSX::all();
  $ten_th = NSX::where('id',$type)->first();
  return view('trangphanloai.thuonghieu',compact('sp_thuonghieu','t_h','ten_th'));
}

public function getloaimay($type){
$sp_loaimay = SanPham::where('id_loai',$type)->paginate(20);
$l_m = LoaiMay::all();
$ten_l = LoaiMay::where('id',$type)->first();
return view('trangphanloai.loaimay',compact('sp_loaimay','l_m','ten_l'));
}

public function getloaiday($type){
$sp_loaiday = SanPham::where('id_day',$type)->paginate(20);
$l_d = LoaiDay::all();
$ten_d = LoaiDay::where('id',$type)->first();
return view('trangphanloai.loaiday',compact('sp_loaiday','l_d','ten_d'));
}

public function getchitiet(Request $req){
  $sanpham = SanPham::where('id',$req->id)->first();
  $sp_khac = SanPham::where('id_producer',$sanpham->id_producer)->where('id','<>',$req->id)->paginate(4);
  $th = NSX::where('id',$sanpham->id_producer)->first();
  $l_m = LoaiMay::where('id',$sanpham->id_loai)->first();
  $l_d = LoaiDay::where('id',$sanpham->id_day)->first();
  $comment = comment::where('id_product',$sanpham->id)->orderBy('id','desc')->paginate(5);
  return view('trangphanloai.chitiet',compact('sanpham','sp_khac','th','l_m','l_d','comment'));
}

public function gettintuc(Request $req){
  $tintuc = TinTuc::where('id',$req->id)->first();
  return view('trangphanloai.tintuc',compact('tintuc'));
}


}
