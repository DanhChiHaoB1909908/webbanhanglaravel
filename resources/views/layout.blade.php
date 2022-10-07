<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laptop-Store</title>
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0349 177 7409</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> laptopstore@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ URL::to('/trang-chu') }}"><img
                                src="{{ asset('public/frontend/images/logo.png') }}" style="" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    Tỉnh
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Kiên giang</a></li>
                                    <li><a href="#">Cần thơ</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    Thành Phố
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Rạch Giá</a></li>
                                    <li><a href="#">Ninh Kiều</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php 
									$customer_id = Session::get('customer_id');
									if($customer_id != NULL){
								?>
                                <li><a href="{{ URL::to('/view-ordered') }}"><i class="fa fa-eye"></i>Xem đơn
                                        hàng</a></li>
                                <?php 
									}else{
								?>

                                <?php 
								}
								?>
                                {{-- <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li> --}}

                                <?php 
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id != NULL && $shipping_id == NULL){
								?>
                                <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i> Thanh
                                        toán</a></li>
                                <?php 
								}elseif($customer_id != NULL && $shipping_id != NULL){
								?>
                                <li><a href="{{ URL::to('/payment') }}"><i class="fa fa-crosshairs"></i> Thanh
                                        toán</a></li>
                                <?php 
								}else{
								?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Thanh
                                        toán</a></li>
                                <?php 
								}
								?>

                                <li><a href="{{ URL::to('/show-cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ
                                        hàng</a></li>


                                <?php 
									$customer_id = Session::get('customer_id');
									if($customer_id != NULL){
								?>
                                <li><a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-lock"></i> Đăng
                                        xuất</a></li>
                                <?php 
								}else{
								?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i> Đăng
                                        nhập</a></li>
                                <?php 
								}
								?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li ><a href="{{ URL::to('/trang-chu') }}" class="active">Trang chủ</a></li>
                                <li><a href="{{ URL::to('/show-product') }}">Sản phẩm</a></li>

                                <li><a href="{{ URL::to('/show-news') }}">Tin tức</a>

                                </li>
                                <li><a href="{{ URL::to('/show-cart') }}">Giỏ hàng</a></li>

                                <li><a href="{{ URL::to('/show-contact') }}">Liên hệ</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{ URL::to('/tim-kiem') }}" method="post">
                            {{ csrf_field() }}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm" />
                                <input type="submit" style="margin-top:0; color:#fff" name="search_items"
                                    class="btn btn-primary btn-sm" value="Tìm kiếm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#slider-carousel" data-slide-to="1"></li>
                    <li data-target="#slider-carousel" data-slide-to="2"></li>
                    <li data-target="#slider-carousel" data-slide-to="3"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ asset('public/frontend/images/banner1.jpg') }}"
                            class="girl img-responsive center-block" alt="" />
                    </div>

                    <div class="item ">
                        <img src="{{ asset('public/frontend/images/banner2.jpg') }}"
                            class="girl img-responsive center-block" alt="" />
                    </div>

                    <div class="item">
                        <img src="{{ asset('public/frontend/images/banner3.jpg') }}"
                            class="girl img-responsive center-block" alt="" />
                    </div>

					<div class="item">
                        <img src="{{ asset('public/frontend/images/banner4.jpg') }}"
                            class="girl img-responsive center-block" alt="" />
                    </div>
                </div>

                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>

            </div>
            
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach ($category as $key => $cate)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                href="{{ URL::to('/danh-muc-san-pham/' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($brand as $key => $brand)
                                        <li><a href="{{ URL::to('/thuong-hieu-san-pham/' . $brand->brand_id) }}">
                                                <span class="pull-right">(50)</span>{{ $brand->brand_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--/brands_products-->

                        {{-- <div class="shipping text-center"><!--shipping-->
							<img src="{{('public/frontend/images/shipping.jpg')}}" alt="" />
						</div><!--/shipping--> --}}
                        <br>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    @yield('content')

                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->


        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch Vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Trợ giúp</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Đơn hàng</a></li>
                                <li><a href="#">Vị trí</a></li>
                                {{-- <li><a href="#">FAQ’s</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Cửa hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Macbook</a></li>
                                <li><a href="#">Dell</a></li>
                                <li><a href="#">Hp</a></li>
                                <li><a href="#">Asus</a></li>
                                {{-- <li><a href="#">Shoes</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Chính sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách cá nhân</a></li>
                                <li><a href="#">Chính sách hoàn tiền</a></li>
                                <li><a href="#">Hệ thống thanh toán</a></li>
                                {{-- <li><a href="#">Ticket System</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Giới thiệu</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin cửa hàng</a></li>
                                <li><a href="#">Công việc</a></li>
                                <li><a href="#">Chi nhánh</a></li>
                                <li><a href="#">Chương trình</a></li>
                                {{-- <li><a href="#">Copyright</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Góp ý</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Địa chỉ email..." />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Trang web sẽ cập nhật những sản <br /> phẩm mới nhât.</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2022 LAPTOP-STORE Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a style="color: #fff" target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
</body>

</html>
