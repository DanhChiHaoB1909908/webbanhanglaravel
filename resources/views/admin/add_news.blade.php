@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm bài viết
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
                        <form role="form" action="{{URL::to('/save-news')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên bài viết</label>
                            <input data-validation="length" 
                            data-validation-length="min3" data-validation-error-msg="Vui long dien ten bai viet"
                            type="text" name="tintuc_name" class="form-control" id="exampleInputEmail1" placeholder="Tên bài viết">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                            <input type="file" name="tintuc_image" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả bài viết</label>
                            <textarea style="resize: none" rows="8" name="tintuc_desc" class="form-control" id="ckeditor" placeholder="Mô tả bài viết">

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung bài viết</label>
                            <textarea style="resize: none" rows="8" name="tintuc_content" class="form-control" id="ckeditor1" placeholder="Nội dung bài viết">

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục bài viết</label>
                            <select name="tintuc_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_news as $key => $cate)
                                    <option value="{{$cate->news_id}}">{{$cate->news_name}}</option>
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

                        
                        <button type="submit" name="add_news" class="btn btn-info">Thêm bài viết</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>   
@endsection
