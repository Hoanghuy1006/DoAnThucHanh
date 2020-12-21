<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class sanphamController extends Controller
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
    public function themSanPham   (){
        // lấy ra danh mục sản phẩm
        $this->baomat();
        $loainhot = DB::table('loainhot')->get();
     

        // trả danh mục sản phẩm về trang sản phẩm
        return view ('sanpham.themsanpham')->with('loainhot',$loainhot);
    }
    public function tatCaSanPham   (){
        // lấy tất cả danh mục từ trên DB về
        $laytatcasanpham=DB::table('sanpham')->join('loainhot','loainhot.maloai','=','sanpham.maloai')->get();
        // hiển thị tất cả danh mục ra tấc cả danh mục từ dữ liệu đã lấy ở trên
        $hienthisanpham= view('sanpham.tatcasanpham')->with('hienthisanpham',$laytatcasanpham);
        return view('admin_layout')->with('sanpham.tatcasanpham',$hienthisanpham);
    }
    public function luuSanPham(Request $request){
        $data=array();
        // lấy biến loại nhớt ở  form gán vào biến mảng data
        // và đặt tên trong mảng data trùng tên với cột trong DB nha
        $data['masp']= $request->ma_san_pham;
        $data['tensp']= $request->ten_san_pham;
        $data['gia']= $request->gia_san_pham;
        $data['thongso']= $request->thong_so;
        $data['maloai']= $request->loai_nhot;
        $data['phuhopxe']= $request ->phu_hop_xe;
        $data['mota']=$request ->mo_ta;
        


        // thêm hình ảnh

        $get_image=$request-> file('hinhanh');

        // thêm ảnh
        if($get_image){
            $get_name_image= $get_image->getClientOriginalName();
            $name_image= current(explode('.',$get_name_image));
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move('public/images',$new_image);
            $data['hinhanh']= $new_image;
            DB::table('sanpham')->insert($data);
            Session::put('thongbao','Thêm sản phẩm thành công');
            return Redirect::to('/them-san-pham');
        }
        $data['hinhanh']= '';
        // sau đó lấy data này gán vào cơ sở dữ liệu thoy

        DB::table('sanpham')->insert($data);
        Session::put('thongbao','Thêm sản phẩm thành công');
        return Redirect::to('/them-san-pham');
    }
        public function suaSanPham($masp){
            $loainhot=DB::table('loainhot')->get();
         // lấy tất cả danh mục từ trên DB về
         $suasanpham=DB::table('sanpham')->where('masp',$masp)->get();
         // hiển thị tất cả danh mục ra tấc cả danh mục từ dữ liệu đã lấy ở trên
         $hienthisanpham= view('sanpham.suasanpham')->with('suasanpham',$suasanpham)->with('loainhot',$loainhot);
         return view('admin_layout')->with('sanpham.suasanpham',$hienthisanpham);
    }
     public function luuSuaSanPham(Request $request,$masp){
    $data =array();

   
    $data['tensp']= $request->ten_san_pham;
    $data['gia']= $request->gia_san_pham;
    $data['thongso']= $request->thong_so;
    $data['maloai']= $request->loai_nhot;
    $get_image=$request-> file('hinhanh');

    if($get_image){
        $get_name_image= $get_image->getClientOriginalName();
        $name_image= current(explode('.',$get_name_image));
        $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); 
        $get_image->move('public/images',$new_image);
        $data['hinhanh']= $new_image;
        DB::table('sanpham')->where('masp', $masp)->update($data);
        Session::put('thongbao','cập nhật sản phẩm thành công');
        return Redirect::to('/tat-ca-san-pham');
    }

    // sau đó lấy data này gán vào cơ sở dữ liệu thoy

    DB::table('sanpham')->where('masp',$masp)->update($data);
    Session::put('thongbao','Thêm sản phẩm thành công');
    return Redirect::to('/tat-ca-san-pham');
   }

   public function xoaSanPham($masp){
    
    DB::table('sanpham')->where('masp',$masp)->delete();
    Session::put('thongbao','XÓA danh muc san pham thanh cong');
    return Redirect::to('/tat-ca-san-pham');
   }

   public function chitietsanpham($masp){
   ;

    $loainhot = DB::table('loainhot')->get();
    $ttsanpham= DB::table('sanpham')->where('sanpham.masp', $masp)->limit(1)->get();
    
    return view('viewsanpham.chitietsanpham')->with('loainhot', $loainhot)->with('ttsanpham',$ttsanpham);

   }

   public function test(){

   }
}
