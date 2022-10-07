<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
// use App\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ContactController extends Controller
{
    public function show_contact(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.lienhe.show_contact')->with('category', $cate_product)->with('brand', $brand_product);
    }
}
