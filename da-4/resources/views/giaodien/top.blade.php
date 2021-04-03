
<div id="nav">
  <div>
    <img src="public\image\icon\a.png" width="15px" height="15px" style="margin-left: 80px; margin-top: 15px; float: left;margin-right: 10px">
    <a style=" color: white; font-size: 13px; margin-left: 10px;float: left;margin-top: 13px" href="#" >Hotline : 012.345.678 &nbsp;|</a>
    {{csrf_field()}}
    @if(Auth::check())
     
    <a class="dropdown-toggle" data-toggle="dropdown" style=" color: white; font-size: 13px; margin-left: 10px;float: left;margin-top: 13px" href="" >Chào Bạn:&nbsp;{{Auth::user()->name}}</a>
       @if(Auth::user()->access == 1)
     <ul class="dropdown-menu" style="width: 260px; height: auto; padding-top: 0px;">
              
              <li class="user-header1">
                <img src="{{Auth::user()->image}}" style="z-index: 5; height: 90px; width: 90px;border: 3px solid;border-color: transparent;border-color: rgba(255,255,255,0.2);" class="rounded-circle" alt="User Image">

                <p style="color: white">
                  {{Auth::user()->name}}
                </p>
              </li>
             
              <li class="user-footer" style="background-color: white">
                <div class="pull-left">
                  <a href="#" class="btn" style=" border:1px solid #D0CACA; margin-top: 5px; margin-left: 10px; font-size: 13px">Profile</a>
                </div>
                <div class="pull-left">
                  <a href="{{ route('homeadmin') }}" class="btn" style=" border:1px solid #D0CACA; margin-top: 5px; margin-left: 20px; font-size: 13px">Admin</a>
                </div>
                <div class="">
                  <a href="{{ route('dangxuat') }}" class="btn" style="border:1px solid #D0CACA; margin-top: 5px; margin-left: 20px;font-size: 13px ">Sign out</a>
                </div>
              </li>
            </ul>

      @else

      <ul class="dropdown-menu" style="width: 260px; height: auto; padding-top: 0px;">
              
              <li class="user-header1">
                <img src="{{Auth::user()->image}}" style="z-index: 5; height: 90px; width: 90px;border: 3px solid;border-color: transparent;border-color: rgba(255,255,255,0.2);" class="rounded-circle" alt="User Image">

                <p style="color: white">
                  {{Auth::user()->name}}

                </p>
              </li>
             
              <li class="user-footer" style="background-color: white">
                <div class="pull-left">
                  <a href="#" class="btn" style=" border:1px solid #D0CACA; margin-top: 5px; margin-left: 10px; font-size: 13px">Profile</a>
                </div>
                <div class="">
                  <a href="{{ route('dangxuat') }}" class="btn" style="border:1px solid #D0CACA; margin-top: 5px; margin-left: 100px;font-size: 13px ">Sign out</a>
                </div>
              </li>
            </ul>
        @endif

    @else

    <a style=" color: white; font-size: 13px; margin-left: 10px;float: left;margin-top: 13px" href="{{ route('dangnhap') }}" >Đăng Nhập &nbsp;|</a>

    <a style=" color: white; font-size: 13px; margin-left: 10px;float: left;margin-top: 13px" href="{{ route('dangky') }}" >Đăng Ký </a>
    {{-- <a style=" color: white; font-size: 13px; margin-left: 10px;float: left;margin-top: 13px" href="#" ><i class="fa fa-user" style="color: white"></i>&nbsp;Tài Khoản</a> --}}
    @endif
  </div>
  <div style="padding-top: 5px">
    <form method="get" action="{{ route('search') }}">

      <input style="font-size: 11px;" class="form-control" type="text" name="key" placeholder="Nhập từ khóa...">
      <button type="submit" class="btn" name="ok" ><img src="public\image\icon\timkiem.png" width="25" height="24"></button>

    </form>
  </div>
  <div class="beta-comp">
   
    <div class="cart">
      <div class="beta-select"><i class="fa fa-shopping-cart"></i><p> Giỏ hàng 
        (@if(Session::has('cart')){{Session('cart')->totalQty}}
      @else trống @endif) </p> <i class="fa fa-chevron-down"></i></div>
      <div class="beta-dropdown cart-body" >

       @if(Session::has('cart'))
       @foreach($product_cart as $product)
       <div class="cart-item">
        <a class="cart-item-delete" href="{{ route('xoagiohang',$product['item']['id']) }}"><i class="fa fa-times"></i></a>
        <div class="media">
          <a class="pull-left" href="#"><img src="{{$product['item']['image_link']}}" width="50px" height="50px" ></a>
          <div class="media-body" style="margin-left: 20px; font-size: 13px">
            <p class="cart-item-title">{{$product['item']['name_product']}}</p>

            <p class="cart-item-amount">SL: {{$product['qty']}}&nbsp; * &nbsp;
              <span>@if($product['item']['discount'] ==0) {{number_format($product['item']['price'])}} đ
              @else {{number_format($product['item']['discount'])}} vnđ  @endif </span></p>
            </div>
          </div>
        </div>
        @endforeach
        @endif
        @if(Session::has('cart'))
        <div class="cart-caption">
          <div class="cart-total text-right" style="font-size: 13px">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice) }} vnđ</span></div>
          <div class="clearfix"></div>

          <div>
            <div class="space10">&nbsp;</div>
            <button type="submit" class="btn btn-danger" style="margin-left: 140px"  ><a href="{{ route('dathang') }}" style="color: white; text-decoration: none;font-size: 13px">Đặt hàng <i class="fa fa-chevron-right"></i></a></button>
          </div>
        </div>
        @endif 
      </div>
    </div>
    
  </div>
</div>
<div>
  <nav class="navbar navbar-expand-sm  navbar-dark">


    <!-- Links -->
    <ul class="navbar-nav">
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle " href="#" id="navbar1" data-toggle="dropdown" >
        THƯƠNG HIỆU
      </a>
      <div class="dropdown-menu" style="margin-left: 66px">
        @foreach($nha_sx as $ncc)
        <a class="dropdown-item" href="{{ route('thuonghieu',$ncc->id) }}"><img src="{{$ncc -> image_producer}}" width="20px" height="20px"> &nbsp; {{$ncc -> name_producer}}</a>


        @endforeach

      </div>
    </li>
    <li class="nav-item dropdown" >
      <a class="nav-link dropdown-toggle " href="#"  style="margin-left: 0px;color: black" data-toggle="dropdown" >
        LOẠI MÁY
      </a>
      <div class="dropdown-menu">
       @foreach($loai_may as $lm)
       <a class="dropdown-item" href="{{ route('loaimay',$lm->id) }}">{{$lm -> name_loai}}</a>
       @endforeach
     </div>
   </li>

   <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle " href="#" style="margin-left: 0px;color: black" data-toggle="dropdown" >
      LOẠI DÂY
    </a>
    <div class="dropdown-menu">
     @foreach($loai_day as $ld)
     <a class="dropdown-item" href="{{ route('loaiday',$ld->id) }}">{{$ld -> name_day}}</a>
     @endforeach
   </div>
 </li>

 <li class="nav-item">
  <a class="nav-link"  style="color: orange; margin-left:130px; font-size: 27px; font-weight: bold; font-family:cursive; " href="{{ route('trangchu') }}">SHOP ĐỒNG HỒ</a>
</li>
<li class="nav-item">
  <a class="nav-link"  style="color: black; margin-left: 200px" href="{{ route('hot') }}">TOP </a>
</li>
<li class="nav-item">
  <a class="nav-link" style="color: black"  href="{{ route('donghonam') }}">NAM</a>
</li>
<li class="nav-item">
  <a class="nav-link"  style="color: black" href="{{ route('donghonu') }}">NỮ</a>
</li>
<li class="nav-item">
  <a class="nav-link"  style="color: black;" href="{{ route('treotuong') }}">TREO TƯỜNG</a>
</li>
<li class="nav-item">
  <a class="nav-link"  style="color: black" href="{{ route('donghodoi') }}">ĐÔI</a>
</li>


</ul>
</nav>
</div>
