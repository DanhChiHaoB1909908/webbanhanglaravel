@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục bài viết
                </header>
                <?php 
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>' ;
                            Session::put('message',null);
                        }
                    ?>
                <div class="panel-body">
                    @foreach ($edit_category_news as $key => $edit_value_news)
                        
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category-news/'.$edit_value_news->news_id)}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục bài viết</label>
                            <input type="text" value="{{$edit_value_news->news_name}}" name="category_news_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" name="category_news_desc" class="form-control" id="exampleInputPassword1">{{$edit_value_news->news_desc}}</textarea>
                        </div>
                        
                        
                        <button type="submit" name="update_category_news" class="btn btn-info">Cập nhật danh mục bài viết</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>   
@endsection
