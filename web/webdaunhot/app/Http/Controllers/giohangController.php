<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
class giohangController extends Controller
{
    public function luuGioHang(Request $request){
        $maspmua= $request ->maspmua;
        $slmua= $request ->soluong;
        $loainhot = DB::table('loainhot')->get();
        $datalay=DB::table('sanpham')->where('masp', $maspmua)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
       

        $data ['id']=$datalay -> masp;
        $data ['qty']=$slmua;
        $data ['name']=$datalay -> tensp;
        $data ['price']=$datalay -> gia;
        $data ['weight']=$datalay -> gia;
        $data ['options']['image']= $datalay -> hinhanh;

        Cart::add($data);
         return Redirect::to('/hien-thi-gio-hang');

        
    }
    public function hienthigiohang(){
        $loainhot = DB::table('loainhot')->get();
        return view('viewsanpham.giohang')->with('loainhot', $loainhot);
    }

    public function luutam1(Request $request){
        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
    }
    public function luutam(Request $request){
       $data= $request ->all();
        
       $session_id=substr(md5(microtime()),rand(0,26),5);
       $giohang = Session::get('giohang');
       if($giohang==true){
            $tontai=0;
            foreach($giohang as $key=>$val){
                if($val['tensp']==$data['tenspgiohan']){
                    $tontai++;
                }
            }
            if($tontai==0){
                $giohang[]=array(
                    'session_id'=>$session_id,
                    'tensp'=>$data['tenspgiohan'],
                    'masp'=>$data['id'],
                   );
                   Session::put('giohang', $giohang);
            }
       }
       else{
           $giohang[]=array(
            'session_id'=>$session_id,
            'tensp'=>$data['tenspgiohan'],
            'masp'=>$data['id'],
           );
       }
       Session::put('giohang', $giohang);
       Session::save();
    }

    public function xoaGioHang($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/hien-thi-gio-hang');
    }
public function capNhatGioHang(Request $request){
    $rowId= $request->iddongcapnhat;
    $qty = $request ->soluongspcapnhat;
    Cart::update($rowId,$qty);
    return Redirect::to('/hien-thi-gio-hang');
}
    // public function hienthigiohang(Request $request){
         

    //     $meta= "gio hang cua ban";
    //     $url_re=$request->url();
    //     $loainhot = DB::table('loainhot')->get();
        

    //     $sanpham= DB::table('sanpham')->get();
    //     return view('viewsanpham.giohang')->with('loainhot', $loainhot)->with('sanpham',$sanpham)->with('url_re',$url_re);
    // }
}
