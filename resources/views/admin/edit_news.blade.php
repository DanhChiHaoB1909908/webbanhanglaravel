@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật bài viết
                </header>
                <?php 
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>' ;
                            Session::put('message',null);
                        }
                    ?>
                <div class="panel-body">
                    
                    <div class="position-center">
                        @foreach ($edit_news as $key =>$ed_tin)
                            
                        <form role="form" action="{{URL::to('/update-news/'.$ed_tin->tintuc_id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên bài viết</label>
                            <input type="text" name="tintuc_name" class="form-control" id="exampleInputEmail1" value="{{$ed_tin->tintuc_name}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                            <input type="file" name="tintuc_image" class="form-control" id="exampleInputEmail1" >
                            <img src="{{URL::to('public/uploads/tintuc/'.$ed_tin->tintuc_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả bài viết</label>
                            <textarea style="resize: none" rows="8" name="tintuc_desc" class="form-control" id="ckeditor">{{$ed_tin->tintuc_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung bài viết</label>
                            <textarea style="resize: none" rows="8" name="tintuc_content" class="form-control" id="ckeditor1">{{$ed_tin->tintuc_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục bài viết</label>
                            <select name="tintuc_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_news as $key => $cate)
                                @if ($cate->news_id == $ed_tin->news_id)
                                    <option selected value="{{$cate->news_id}}">{{$cate->news_name}}</option>
                                @else
                                    <option value="{{$cate->news_id}}">{{$cate->news_name}}</option>
                                @endif
                                @endforeach
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="tintuc_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        
                        <button type="submit" name="add_news" class="btn btn-info">Cập nhật bài viết</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
</div>   
@endsection
