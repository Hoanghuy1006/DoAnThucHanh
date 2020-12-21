<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;


class adminController extends Controller
{
    public function baomat(){
        $admin_login= Session::get('admin_ma');
        if($admin_login){
            return Redirect::to('/admin');}
        else
        {
            return Redirect::to('/admin-login')->send();
        }
    }
    public function index()
    {
        $this->baomat();
        // trỏ về giao diện đăng nhập dùng hàm: return view('trang cần trỏ về')
        return view('admin_giaodien');
    }
    public function adminLogin(){
        return view('admin_dangnhap');
    }
    public function checkLogin(Request $request )
    {
        $admin_email= $request ->admin_email;
        $admin_matkhau= md5($request ->admin_matkhau);
        
        // khai báo biến result để trả về kết quả so sánh giữa DB và biến vừa truyền lên từ form
        // first là trả về 1 cái
        $result= DB::table('admin')->where('email',$admin_email)->where('matkhau',$admin_matkhau)->first();
        // sau khi đăng nhập thành công trả về trang admin
        // return view('admin_giaodien');
        // ------------------------
        // nếu kết quả tổn tại
        if($result){
        // gán admin name ở form thành tên của admin trong DB
        Session::put('admin_name', $result->ten) ;
        Session::put('admin_ma', $result->maadmin);
        return Redirect::to('/admin');
        }
        else{
            Session::put('thongbao','Mat khau hoac tai khoan bi sai');
            return Redirect::to('/admin-login');
        }
    }
    public function dangXuat()
    {
        Session::put('admin_name', null) ;
        Session::put('admin_ma', null);
        return Redirect::to('/admin-login');
    }

}