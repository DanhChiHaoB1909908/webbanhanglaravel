@extends('layout')
@section('content')
<h2 class="title text-center">Tất cả sản phẩm </h2>
<div class="features_items">
    <!--features_items-->
    @foreach ($show_product as $key => $product_frontend)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product_frontend->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'.$product_frontend->product_image)}}" alt="" />
                        <h2>{{number_format($product_frontend->product_price).' '.'VNĐ'}}</h2>
                        <p>{{$product_frontend->product_name}}</p>
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product_frontend->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                    </div>
                    
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                    </ul>
                </div>
            </div>
        </div> 
    </a>
    @endforeach
    

</div>
<!--features_items-->



@endsection