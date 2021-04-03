@extends('giaodien.master')
@section('title','Đặt hàng')
@section('content')

<br><br>
<div style="width: 100%; height: 65px; background-color: #ECE7E7">
	<p style="font-size: 28px;text-align: center;margin-right: 35px; padding-top: 10px">ĐẶT HÀNG</p>
</div>
<br>
<br>

{{-- body --}}

<div class="container" style="margin-bottom: 100px;font-weight: lighter">
	{{-- expr --}}

  <div id="content">

    <form action="{{ route('dathang') }}" method="post" class="beta-form-checkout">
     {{csrf_field()}}
     <div class="row" style="margin-top: 20px">

      @if(Session::has('thongbao'))
      <div class="alert alert-success">
        {{Session::get('thongbao')}}
      </div>
      @endif
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h4 >Đặt hàng</h4>
        <div class="space20">&nbsp;</div>

        <div class="form-block" style="margin-bottom: 25px">
          <label for="name" >Họ tên*</label>
          <input type="text" style="width: 307px; height: 35px;margin-left: 150px;padding: 10px" name="name" placeholder="Họ tên" required>
        </div>
        <div class="form-block" style="margin-bottom: 25px">
          <label>Giới tính </label>
          <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%; margin-left: 150px"><span style="margin-right: 10%">Nam</span>
          <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

        </div>

        <div class="form-block" style="margin-bottom: 25px">
          <label for="email">Email*</label>
          <input type="email" style="width: 307px; height: 35px;margin-left: 161px;padding: 10px" name="email" required placeholder="expample@gmail.com">
        </div>

        <div class="form-block" style="margin-bottom: 25px">
          <label for="adress">Địa chỉ*</label>
          <input type="text" style="width: 307px; height: 35px;margin-left: 151px;padding: 10px" name="adress" placeholder="Street Address" required>
        </div>


        <div class="form-block" style="margin-bottom: 25px">
          <label for="phone">Điện thoại*</label>
          <input type="number" style="width: 307px; height: 35px;margin-left: 126px;padding: 10px" name="phone" placeholder="Number" required>
        </div>

        <div class="form-block" style="margin-bottom: 25px">
          <label for="notes">Ghi chú</label>
          <textarea name="notes"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="your-order" style="" >
          <div class="your-order-head" style=""><h5>Đơn hàng của bạn</h5></div>
          @if(Session::has('cart'))
          <div class="your-order-body" style="padding: 0px 10px">
            <div class="your-order-item">
              <div>
                <!--  one item   -->
                @foreach($product_cart as $product)
                <div class="media" style="margin-top: 20px">
                  <img width="25%" src="{{$product['item']['image_link']}}" alt="" class="pull-left">
                  <div class="media-body">
                    <p class="font-large">{{$product['item']['name_product']}}</p>
                    <span>SL: {{$product['qty']}}  *  @if($product['item']['discount'] ==0) {{number_format($product['item']['price'])}} đ
                    @else {{number_format($product['item']['discount'])}} đ  @endif</span>

                  </div>
                </div>
                <br>
                <hr>
                @endforeach
                <!-- end one item -->
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="your-order-item">
              <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
              <div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice) }} đ</h5></div>
              <div class="clearfix"></div>
            </div>
          </div>
          @endif
          <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

          <div class="your-order-body">
            <ul class="payment_methods methods">
              <li class="payment_method_bacs">
                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                <div class="payment_box payment_method_bacs" style="display: block;">
                  Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                </div>            
              </li>

              <li class="payment_method_cheque">
                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
                <label for="payment_method_cheque" style="padding-top: 40px">Chuyển khoản </label>
                <div class="payment_box payment_method_cheque" style="display: block;">
                  Chuyển tiền đến tài khoản sau:
                  <br>- Số tài khoản: 123 456 789
                  <br>- Chủ TK: KTShop
                  <br>- Ngân hàng ACB, Chi nhánh TP Long Xuyên
                </div>            
              </li>

            </ul>
          </div>

          <div class="text-center"><button type="submit" class="btn btn-primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
        </div> <!-- .your-order -->
      </div>
    </div>
  </form>
</div> <!-- #content -->
</div> <!-- .container -->

@endsection
