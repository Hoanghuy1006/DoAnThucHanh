<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class danhMucSanPham extends Controller
{
    public function themDanhMucSanPham   (){

        return view('sanpham.themdanhmuc');
    }
    public function tatCaDanhMucSanPham   (){
        // lấy tất cả danh mục từ trên DB về
        $laytatcadanhmuc=DB::table('loainhot')->get();
        // hiển thị tất cả danh mục ra tấc cả danh mục từ dữ liệu đã lấy ở trên
        $hienthidanhmuc= view('sanpham.tatcadanhmuc')->with('hienthidanhmuc',$laytatcadanhmuc);
        return view('admin_layout')->with('sanpham.tatcadanhmuc',$hienthidanhmuc);
    }
    public function luuDanhMuc(Request $request){
        $data=array();
        // lấy biến loại nhớt ở  form gán vào biến mảng data
        // và đặt tên trong mảng data trùng tên với cột trong DB nha
        $data['maloai']= $request->ma_loai_nhot;
        $data['tenhangnhot']= $request->ten_loai_nhot;
        $data['nhacungcap']= $request->nha_cung_cap;
        // sau đó lấy data này gán vào cơ sở dữ liệu thoy

        DB::table('loainhot')->insert($data);
        Session::put('thongbao','them danh muc san pham thanh cong');
        return Redirect::to('/them-danh-muc');
    }
        public function suaDanhMuc($maloai){
         // lấy tất cả danh mục từ trên DB về
         $suadanhmuc=DB::table('loainhot')->where('maloai',$maloai)->get();
         // hiển thị tất cả danh mục ra tấc cả danh mục từ dữ liệu đã lấy ở trên
         $hienthidanhmuc= view('sanpham.suadanhmuc')->with('suadanhmuc',$suadanhmuc);
         return view('admin_layout')->with('sanpham.suadanhmuc',$hienthidanhmuc);
    } 
    
    public function luuSuaDanhMuc(Request $request,$maloai){
    $data =array();

    $data['maloai']= $request->ma_loai_nhot;
    $data['tenhangnhot']= $request->ten_loai_nhot;
    $data['nhacungcap']= $request->nha_cung_cap;


    DB::table('loainhot')->where('maloai',$maloai)->update($data);
    Session::put('thongbao','sua danh muc san pham thanh cong');
    return Redirect::to('/tat-ca-danh-muc');
   }

   public function xoaDanhMuc($maloai){
    
    DB::table('loainhot')->where('maloai',$maloai)->delete();
    Session::put('thongbao','XÓA danh muc san pham thanh cong');
    return Redirect::to('/tat-ca-danh-muc');
   }

///////////////////////////////////////////////////////////////
public function sptheoloai($maloai){
    
    $loainhot = DB::table('loainhot')->get();
    $sptheoloai= DB::table('sanpham')->join('loainhot','sanpham.maloai','=','loainhot.maloai')->where('sanpham.maloai', $maloai)->get();
    $tenhangnhot=DB::table('loainhot')->where('loainhot.maloai',$maloai)->limit(1)->get();
    

    return view('viewsanpham.sptheoloai')->with('loainhot', $loainhot)->with('sptheoloai',$sptheoloai)
    ->with('tenhangnhot',$tenhangnhot);
}




    }


    


