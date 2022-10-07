@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin khách hàng
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
              
              <th>Tên người khách hàng</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>{{$order_by_id->shipping_name}}</td>
              <td>{{$order_by_id->shipping_address}}</td>
              <td>{{$order_by_id->shipping_phone}}</td>
              <td>{{$order_by_id->shipping_email}}</td> 
            </tr>
            
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
@endsection
