@extends('layout')
@section('content')

<section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Xem lại giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="table-responsive cart_info">
            <?php
                $content = Cart::content();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content)
                    <tr>
                        <td class="">
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="100" alt=""></a>
                        </td>
                        <td class="">
                            <p>{{$v_content->name}}</p>
                            
                        </td>
                        <td class="">
                            <p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
                        </td>
                        <td class="">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-quantity') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" size="5"><br><br>
                                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                    <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                </form>
                            </div>
                        </td>
                        <td class="">
                            <p class="">
                                <?php 
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal).' '.'VNĐ' ;
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="review-payment">
            <h2>Chọn hình thức thanh toán</h2>
        </div><br>
        <form action="{{URL::to('/order-place') }}" method="post">
            {{ csrf_field() }}
            <div class="payment-options">
                <span>
                    <label><input name="payment_options" value="1" type="checkbox"> Trả qua ATM</label>
                </span>
                <span>
                    <label><input name="payment_options" value="2" type="checkbox"> Thanh toán tiền mặt</label>
                </span>
                <span>
                    <label><input name="payment_options" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
                </span>

                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
            </div>
        </form>
</section> <!--/#cart_items-->

@endsection