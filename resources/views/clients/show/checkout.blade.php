@extends('clients.layout.app')


@section ('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class=" pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
@if (session('messeger'))
<div class="alert alert-success container" role="alert">
        {{  session('messeger') }}
</div>
@endif
  @if(Cart::count()> 0)
<div class="container">
    <div id="content">

        <form action="{{ route('postcheckout') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" placeholder="Họ tên"  name="name" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="0" style="width: 10%"><span>Nữ</span>
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email"  name="email" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="address"  name="address" placeholder="Street Address" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone"  name="phone" required>
                    </div>

                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="note"  name="note" ></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                @foreach ($checkout as $new)
                                <div class="media">
                                    <img width="25%" src="{{asset('/storage/images/'.$new->options->image)}}" alt="" height="100px"  class="pull-left">
                                    <div class="media-body">
                                        <p class="font-large"  name="name">{{ $new->name }}</p>
                                        <span class="cart-item-amount"  name="price" >{{ $new->qty }}*<span>{{ $new->price }} vnđ</span></span>
                                    </div>
                                </div>
                                @endforeach

                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black"  name="subtotal" >{{Cart::subtotal()}}</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <button type="submit"class="text-center"><a class="beta-btn primary" >Đặt hàng <i class="fa fa-chevron-right"></i></a></button>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@else
<div class="container"> bạn chưa đặt hàng </div>
@endif
@endsection
