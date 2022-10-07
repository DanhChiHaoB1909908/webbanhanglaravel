@extends('layout')
@section('content')

<section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Chi tiết lịch sử đơn hàng</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Tên sản phẩm</td>
                        <td class="image">Số lượng</td>
                        <td class="price">Giá</td>
                        <td class="description">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordered_by_id as $key => $ordered_frontend_details)
                    <tr>
                        <td class="">
                            <p>{{$ordered_frontend_details->product_name}}</p>
                        </td>
                        <td class="">
                            <p>{{$ordered_frontend_details->product_sales_quantity}}</p>
                        </td>

                        <td class="">
                            <p>{{number_format($ordered_frontend_details->product_price).' '.'VNĐ'}}</p>
                        </td>
                        
                        <td class="">
                            <p>{{number_format($ordered_frontend_details->product_price * $ordered_frontend_details->product_sales_quantity).' '.'VNĐ'}}</p>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</section> <!--/#cart_items-->

@endsection