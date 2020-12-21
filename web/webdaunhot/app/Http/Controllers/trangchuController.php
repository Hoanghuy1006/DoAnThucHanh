<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class trangchuController extends Controller
{
    public function index(){
        $loainhot = DB::table('loainhot')->get();
        

        $sanpham= DB::table('sanpham')->get();
        return view('hienthisanpham')->with('loainhot', $loainhot)->with('sanpham',$sanpham);
    }

   
}
