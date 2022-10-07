<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
// use App\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CustomerController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function all_customer(){
        $this->AuthLogin();
        $all_customer = DB::table('tbl_customers')
        ->orderby('tbl_customers.customer_id','desc')->get();
        $manager_customer = view('admin.all_customer')->with('all_customer',$all_customer);
        return view('admin_layout')->with('admin.all_customer', $manager_customer);
        
    }
}
