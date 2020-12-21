<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','trangchuController@index' );

// Admin
Route::get('/admin','adminController@index');
Route::get('/admin-login','adminController@adminLogin');
//kiểm tra đăng nhập từ form
Route::post('/admin-checklogin','adminController@checkLogin');
// đăng xuất
Route::get('/admin-dangxuat','adminController@dangXuat');

// danh mục sản phẩm
Route::get('/them-danh-muc','danhMucSanPham@themDanhMucSanPham');
Route::get('/tat-ca-danh-muc','danhMucSanPham@tatCaDanhMucSanPham');
Route::post('/luu-danh-muc','danhMucSanPham@luuDanhMuc');
Route::get('/sua-danh-muc/{maloai}','danhMucSanPham@suaDanhMuc');
Route::post('/luu-sua-danh-muc/{maloai}','danhMucSanPham@luuSuaDanhMuc');
Route::get('/xoa-danh-muc/{maloai}','danhMucSanPham@xoaDanhMuc');

// sản phẩm
Route::get('/them-san-pham','sanphamController@themSanPham');
Route::get('/tat-ca-san-pham','sanphamController@tatCaSanPham');
Route::post('/luu-san-pham','sanphamController@luuSanPham');
Route::get('/sua-san-pham/{masp}','sanphamController@suaSanPham');
Route::post('/luu-sua-san-pham/{masp}','sanphamController@luuSuaSanPham');
Route::get('/xoa-san-pham/{masp}','sanphamController@xoaSanPham');
Route::get('/chi-tiet-san-pham/{masp}','sanphamController@chitietsanpham');

//=====================================================================
// trang chính
Route::get('/trang-chu','trangchuController@index');
//
Route::get('/sptheoloai/{maloai}','danhMucSanPham@sptheoloai');

Route::post('/luu-gio-hang','giohangController@luuGioHang');

Route::get('/hien-thi-gio-hang','giohangController@hienthigiohang');
Route::get('xoa-sp-gio-hang/{rowId}', 'giohangController@xoaGioHang');
Route::post('/cap-nhat-gio-hang', 'giohangController@capNhatGioHang');
// thanh toán
Route::get('dang-nhap-thanh-toan','ThanhtoanController@dangnhapThanhToan');
Route::post('/them-khach-hang','ThanhtoanController@themKH');
Route::get('thanh-toan','ThanhtoanController@thanhtoan');
Route::post('/luu-don-dat','ThanhtoanController@luuThongTinDatHang');
Route::get('/kh-dang-xuat','ThanhtoanController@dangxuat');
Route::post('/kh-dang-nhap','ThanhtoanController@dangnhap');

