@extends('layout')
@section('content')

<section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Lịch sử đơn hàng</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Tên người đặt</td>
                        <td class="description">Tổng tiền</td>
                        <td class="price">Tình trạng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_ordered as $key => $ordered_frontend)
                    <tr>
                        <td class="cart_description">
                            <p>{{$ordered_frontend->shipping_name}}</p>
                        </td>
                        <td class="">
                            <p>{{$ordered_frontend->order_total.' '.'VNĐ'}}</p>
                        </td>

                        <td>
                            <span class="text-ellipsis">
                                <?php 
                                    if ($ordered_frontend -> order_status == 0){
                                ?>
                                <p>Đang chờ xử lý...</p>
                                <?php        
                                    }else{
                                ?>
                                <p>Đã đặt hàng</p>
                                <?php
                                    }
                                ?>
                            </span>
                          </td>
                        
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('view-ordered-details/'.$ordered_frontend->order_id)}}"><i class="fa fa-eye text-success text-active"></i></a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</section> <!--/#cart_items-->

@endsection