<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
// use App\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class NewsController extends Controller

{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_category_news(){
        return view('admin.add_category_news');
    }

    public function all_category_news(){
        $this->AuthLogin();
        $all_category_news = DB::table('tbl_category_news')->get();
        $manager_category_news = view('admin.all_category_news')->with('all_category_news',$all_category_news);
        return view('admin_layout')->with('admin.all_category_news', $manager_category_news);
        
    }

    public function save_category_news(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['news_name'] = $request->category_news_name;
        $data['news_desc'] = $request->category_news_desc;
        $data['news_status'] = $request->category_news_status;

        DB::table('tbl_category_news')->insert($data);
        Session::put('message','Thêm danh mục bài viết thành công');
        return Redirect::to('add-category-news');
    }

    public function unactive_category_news($category_news_id){
        $this->AuthLogin();
        DB::table('tbl_category_news')->where('news_id',$category_news_id)->update(['news_status'=>1]);
        Session::put('message','Không kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-category-news');

    }

    public function active_category_news($category_news_id){
        $this->AuthLogin();
        DB::table('tbl_category_news')->where('news_id',$category_news_id)->update(['news_status'=>0]);
        Session::put('message','Kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-category-news');
    }

    public function edit_category_news($category_news_id){
        $this->AuthLogin();
        $edit_category_news = DB::table('tbl_category_news')->where('news_id',$category_news_id)->get();
        $manager_category_news = view('admin.edit_category_news')->with('edit_category_news',$edit_category_news);
        return view('admin_layout')->with('admin.edit_category_news', $manager_category_news);
    }

    public function update_category_news(Request $request,$category_news_id){
        $this->AuthLogin();
        $data = array();
        $data['news_name'] = $request->category_news_name;
        $data['news_desc'] = $request->category_news_desc;
        DB::table('tbl_category_news')->where('news_id',$category_news_id)->update($data);
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return Redirect::to('all-category-news');
    }

    public function delete_category_news($category_news_id){
        $this->AuthLogin();
        DB::table('tbl_category_news')->where('news_id',$category_news_id)->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect::to('all-category-news');
    }



    // Code thêm bài viết
    public function add_news(){
        $this->AuthLogin();
        $cate_news = DB::table('tbl_category_news')->orderby('news_id','desc')->get();
        
        return view('admin.add_news')->with('cate_news', $cate_news);

    }

    public function all_news(){
        $this->AuthLogin();
        $all_news = DB::table('tbl_news')
        ->join('tbl_category_news','tbl_category_news.news_id','=','tbl_news.news_id')
        
        ->orderby('tbl_news.tintuc_id','desc')->get();
        $manager_news = view('admin.all_news')->with('all_news',$all_news);
        return view('admin_layout')->with('admin.all_news', $manager_news);
        
    }


    public function save_news(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['tintuc_name'] = $request->tintuc_name;
        
        $data['tintuc_desc'] = $request->tintuc_desc;
        $data['tintuc_content'] = $request->tintuc_content;
        $data['news_id'] = $request->tintuc_cate;
        
        $data['tintuc_status'] = $request->tintuc_status;
        $data['tintuc_image'] = $request->tintuc_image;

        $get_image = $request->file('tintuc_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/tintuc',$new_image);
            $data['tintuc_image'] = $new_image;
            DB::table('tbl_news')->insert($data);
            Session::put('message','Thêm bài viết thành công');
            return Redirect::to('all-news');
        }
        $data['tintuc_image'] = '';
        DB::table('tbl_news')->insert($data);
        Session::put('message','Thêm bài viết thành công');
        return Redirect::to('all-news');
    }

    public function unactive_news($tintuc_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('tintuc_id',$tintuc_id)->update(['tintuc_status'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-news');

    }

    public function active_news($tintuc_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('tintuc_id',$tintuc_id)->update(['tintuc_status'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-news');
    }

    public function edit_news($tintuc_id){
        $this->AuthLogin();
        $cate_news = DB::table('tbl_category_news')->orderby('news_id','desc')->get();
        
        $edit_news = DB::table('tbl_news')->where('tintuc_id',$tintuc_id)->get();
        $manager_news = view('admin.edit_news')->with('edit_news',$edit_news)
        ->with('cate_news',$cate_news);

        return view('admin_layout')->with('admin.edit_news', $manager_news);
    }

    public function update_news(Request $request,$tintuc_id){
        $this->AuthLogin();
        $data = array();
        $data['tintuc_name'] = $request->tintuc_name;
        
        $data['tintuc_desc'] = $request->tintuc_desc;
        $data['tintuc_content'] = $request->tintuc_content;
        $data['news_id'] = $request->tintuc_cate;
        
        $data['tintuc_status'] = $request->tintuc_status;

        $get_image = $request->file('tintuc_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/tintuc',$new_image);
            $data['tintuc_image'] = $new_image;
            DB::table('tbl_news')->where('tintuc_id',$tintuc_id)->update($data);
            Session::put('message','Cập nhật bài viết thành công');
            return Redirect::to('all-news');
        }
        DB::table('tbl_news')->where('tintuc_id',$tintuc_id)->update($data);
        Session::put('message','Cập nhật bài viết thành công');
        return Redirect::to('all-news');
    }

    public function delete_news($tintuc_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('tintuc_id',$tintuc_id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('all-news');
    }
    // End Admin Pages


    // Show news frontend
    
    public function details_news($tintuc_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $details_news = DB::table('tbl_news')
        ->join('tbl_category_news','tbl_category_news.news_id','=','tbl_news.news_id')
        
        ->where('tbl_news.tintuc_id',$tintuc_id)->get();

        foreach ($details_news as $key => $value) {
            $news_id = $value->news_id;
        }

        $related_news = DB::table('tbl_news')
        ->join('tbl_category_news','tbl_category_news.news_id','=','tbl_news.news_id')
        
        ->where('tbl_category_news.news_id',$news_id)
        ->whereNotIn('tbl_news.tintuc_id',[$tintuc_id])
        ->limit(3)
        ->get();

        return view('pages.tintuc.show_details_news')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('news_details', $details_news)
        ->with('relate', $related_news);
    }

    public function show_news(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $show_news = DB::table('tbl_news')->where('tintuc_status','0')->orderby('tintuc_id','desc')->limit(9)->get();

        return view('pages.tintuc.show_news')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('show_news', $show_news);
    }


}
