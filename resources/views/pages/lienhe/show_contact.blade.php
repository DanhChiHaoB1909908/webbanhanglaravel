@extends('layout')
@section('content')

<div class="row">  	
    <div class="col-sm-8">
        <div class="contact-form">
            <h2 class="title text-center">Góp ý</h2>
            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                <div class="form-group col-md-6">
                    <input type="text" name="name" class="form-control" required="required" placeholder="Tên">
                </div>
                <div class="form-group col-md-6">
                    <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                    <input type="text" name="subject" class="form-control" required="required" placeholder="Số điện thoại">
                </div>
                <div class="form-group col-md-12">
                    <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Phản hồi của bạn"></textarea>
                </div>                        
                <div class="form-group col-md-12">
                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi">
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="contact-info">
            <h2 class="title text-center">Thông tin liên hệ</h2>
            <address>
                <p>Laptop store.</p>
                <p>Đường 3/2, Quận Ninh Kiều, TP Cần Thơ</p>
                <p>Cần thơ</p>
                <p>Mobile: 0341977407</p>
                
                <p>Email: info@lapstore.com</p>
            </address>

            <h2 class="title text-center">Mạng Xã Hội</h2>
            <div class="social-networks">
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>    			
</div> 

@endsection