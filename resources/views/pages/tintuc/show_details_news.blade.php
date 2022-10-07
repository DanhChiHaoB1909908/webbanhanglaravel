@extends('layout')
@section('content')

@foreach ($news_details as $key => $value_news)

<div class="blog-post-area">
    <h2 class="title text-center">Chi tiết tin tức</h2>
    <div class="single-blog-post">
        <h3 style="text-align: center">{{$value_news->tintuc_name}}</h3>
        
        
        <p>{!!$value_news->tintuc_content!!}</p> 
        
    </div>
</div><!--/blog-post-area-->

@endforeach

<div class="rating-area">
    <ul class="ratings">
        <li class="rate-this">Rate this item:</li>
        <li>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </li>
        <li class="color">(6 votes)</li>
    </ul>
    <ul class="tag">
        <li>TAG:</li>
        <li><a class="color" href="">Pink <span>/</span></a></li>
        <li><a class="color" href="">T-Shirt <span>/</span></a></li>
        <li><a class="color" href="">Girls</a></li>
    </ul>
</div><!--/rating-area-->

<div class="socials-share">
    <a href=""><img src="{{URL::to('/public/frontend/images/socials.png')}}" alt=""></a>
</div><!--/socials-share-->


@foreach ($relate as $key => $news_lienquan)

<div class="media commnets">
    <a class="pull-left" href="#">
        <img class="media-object" src="{{URL::to('/public/uploads/tintuc/'.$news_lienquan->tintuc_image)}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$news_lienquan->tintuc_name}}</h4>
        <p>{!!$news_lienquan->tintuc_desc!!}</p>
        <div class="blog-socials">
            <ul>
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <a class="btn btn-primary" href="{{URL::to('/chi-tiet-tin-tuc/'.$news_lienquan->tintuc_id)}}">Chi tiết</a>
        </div>
    </div>
</div><!--Comments-->

@endforeach


@endsection