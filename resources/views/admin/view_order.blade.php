@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin đăng nhập
      </div>
      
      <div class="table-responsive">
        <?php 
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>' ;
                Session::put('message',null);
            }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              
              <th>Tên đăng nhập</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$customer->customer_name}}</td>
              <td>{{$customer->customer_phone}}</td>
              <td>{{$customer->customer_email}}</td>
            </tr>
            
          </tbody>
        </table>
      </div>
      
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin vận chuyển hàng
      </div>
      
      <div class="table-responsive">
        <?php 
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>' ;
                Session::put('message',null);
            }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Ghi chú</th>
              <th>Hình thức thanh toán</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>{{$shipping->shipping_name}}</td>
              <td>{{$shipping->shipping_address}}</td>
              <td>{{$shipping->shipping_phone}}</td>
              <td>{{$shipping->shipping_email}}</td> 
              <td>{{$shipping->shipping_notes}}</td> 
              <td>
                @if ($shipping->shipping_method == 0)
                    Thanh toán qua ATM
                @else
                    Thanh toán khi nhận hàng
                @endif
                
            </td> 
            </tr>
            
          </tbody>
        </table>
      </div>
      
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê chi tiết đơn hàng
      </div>
      
      <div class="table-responsive">
        <?php 
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>' ;
                Session::put('message',null);
            }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Mã giảm giá</th>
                <th>Phí vận chuyển</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Tổng tiền</th>
                <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @php
                $i = 0;
                $total = 0;
            @endphp
            @foreach ($order_details as $key => $details)
            @php
                $i++;
                $subtotal = $details->product_price * $details->product_sales_quantity;
                $total += $subtotal;
            @endphp
            <tr>
                
              <td>{{$i}}</td>
              <td>{{$details->product_name}}</td>
              <td>
                @if ($details->product_coupon != 'no')
                    {{$details->product_coupon}}
                @else
                    Không có mã giảm giá
                @endif
              </td>
              <td>{{number_format($details->product_feeship,0,',','.').' '.'VNĐ'}}</td>
              <td>{{$details->product_sales_quantity}}</td>
              <td>{{number_format($details->product_price,0,',','.').' '.'VNĐ'}}</td>
              <td>{{number_format($subtotal,0,',','.').' '.'VNĐ'}}</td>
              
            </tr>
            @endforeach
            <tr>
                {{-- <td>Thanh toán: {{number_format($total,0,',','.').' '.'VNĐ'}}</td> --}}
                <td colspan="3">
                    @php
                        $total_coupon = 0;
                    @endphp
                    @if ($coupon_condition==1)
                        @php
                            $total_after_coupon = ($total*$coupon_number)/100;
                            echo 'Tổng giảm: ' .number_format($total_after_coupon,0,',','.').' '.'VNĐ'.'<br>';
                            $total_coupon = $total - $total_after_coupon - $details->product_feeship;
                        @endphp
                    @else
                        @php
                            echo 'Tổng giảm: ' .number_format($coupon_number,0,',','.').' '.'VNĐ'.'<br>';
                            $total_coupon = $total - $coupon_number - $details->product_feeship;
                        @endphp
                    @endif
                    Phí vận chuyển: {{number_format($details->product_feeship,0,',','.').' '.'VNĐ'}}<br>
                    Thanh toán: {{number_format($total_coupon,0,',','.').' '.'VNĐ'}}
                </td>
                
                {{-- <td>Thanh toán: {{number_format($total_coupon,0,',','.').' '.'VNĐ'}}</td> --}}
            </tr>
          </tbody>
        </table>
        <a target="_blank" class="btn btn-default" href="{{url('/print-order/'.$details->order_code)}}">In đơn hàng</a>
      </div>
    </div>
</div>

  
@endsection
