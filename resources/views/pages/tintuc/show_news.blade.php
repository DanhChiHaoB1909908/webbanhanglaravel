@extends('layout')
@section('content')

<h2 class="title text-center">Tin tức mới nhất</h2>
@foreach ($show_news as $key => $news_frontend)
<div class="media commnets">
    <a class="pull-left" href="#">
        <img class="media-object" src="{{URL::to('public/uploads/tintuc/'.$news_frontend->tintuc_image)}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$news_frontend->tintuc_name}}</h4>
        <p>{!!$news_frontend->tintuc_desc!!}</p>
        <div class="blog-socials">
            <ul>
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <a class="btn btn-primary" href="{{URL::to('/chi-tiet-tin-tuc/'.$news_frontend->tintuc_id)}}">Chi tiết</a>
        </div>
    </div>
</div><!--Comments-->
@endforeach

@endsection