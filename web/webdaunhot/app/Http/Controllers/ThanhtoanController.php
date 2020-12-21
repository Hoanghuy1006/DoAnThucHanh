<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class ThanhtoanController extends Controller
{
    public function dangnhapThanhToan(){
        $loainhot = DB::table('loainhot')->get();
        

        $sanpham= DB::table('sanpham')->get();
    
        return view('khachhang.dangnhap')->with('loainhot', $loainhot)->with('sanpham',$sanpham);
    }

    public function themKH(Request $request){
        $data=array();

        $data['TenKH']= $request ->ten_khach_hang;
        $data['EmailKH']= $request ->email_khach_hang;
        $data['MatKhauKH']= $request ->mat_khau_khach_hang;

        $mathemKH = DB::table('tb_khachhang')->insertGetId($data);

        Session::put('MaKH', $mathemKH);
        Session::put('TenKH', $request ->ten_khach_hang);
        return Redirect('/thanh-toan');
    }
    public function thanhtoan(){
        $loainhot = DB::table('loainhot')->get();
        return view('khachhang.thongtindathang')->with('loainhot', $loainhot);
    }
    public function luuThongTinDatHang(Request $request){
        $data=array();

        $data['SoDTDH']= $request ->ten_KH;
        $data['TenKH']= $request ->so_dt;
        $data['DiaChiDH']= $request ->dia_chi_DH;

        $MaDonDH = DB::table('tb_dondathang')->insertGetId($data);

        Session::put('MaDonDH', $MaDonDH);
      
        return Redirect('/thanh-toan');
    }
    public function dangxuat(){
        Session::put('MaKH',null);
        return Redirect('dang-nhap-thanh-toan');
    }
    public function dangnhap(Request $request){
        $email=$request ->email_dang_nhap;
        $pass= $request ->pass_dang_nhap;
        $result = DB::table('tb_khachhang')->where('EmailKH', $email)->where('MatKhauKH', $pass)->first();
        
        if($result){
            Session::put('MaKH', $result->MaKH);
            return Redirect('/trang-chu');
            
        }else{
            return Redirect('/dang-nhap-thanh-toan');
        }
        
       
    }
}
