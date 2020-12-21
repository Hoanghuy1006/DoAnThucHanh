@extends('admin_layout')
@section('admin_content')
@foreach($suasanpham as $key => $value)
<form action="{{URL::to('/luu-sua-san-pham/'.$value->masp)}}" method="post" enctype= "multipart/form-data">
{{csrf_field()}}
<div>
    <span><?php
                                    $thongbao = Session::get('thongbao');
                                    if($thongbao){
                                        echo $thongbao;
                                        Session::put('thongbao',null);
                                    }
                                    
                                    ?></span>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Mã sản phẩm</label>
    <input type="text" value="{{$value ->masp}}" class="form-control" name="ma_san_pham" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1" >Tên sản phẩm</label>
    <input type="text" value="{{$value ->tensp}}" class="form-control" name="ten_san_pham" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Thông số cơ bản</label>
    <input type="text" class="form-control" value="{{$value ->thongso}}"  name="thong_so" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Thông số cơ bản</label>
    <input type="text" class="form-control" value="{{$value ->thongso}}"  name="mo_ta" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Giá</label>
    <input type="text" class="form-control" value="{{$value ->gia}}" name="gia_san_pham" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Hình ảnh</label>
    <input type="file" class="form-control" name="hinhanh" aria-describedby="emailHelp" placeholder="tên danh mục">
    <img src="{{URL::to('public/images/'.$value->hinhanh)}}" height="100" alt="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Loại nhớt</label>
   <select name="loai_nhot" class="form-control input-sm m-bot15">
        @foreach($loainhot as $key =>$maloai)
        @if($maloai->maloai==$value ->maloai)
         <option selected value="{{$maloai->maloai}}">{{$maloai ->tenhangnhot}}</option>
        @else
        <option  value="{{$maloai->maloai}}">{{$maloai ->tenhangnhot}}</option>
        @endif
        @endforeach
   </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endforeach
@endsection