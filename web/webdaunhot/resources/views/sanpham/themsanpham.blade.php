@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/luu-san-pham')}}" method="post" enctype= "multipart/form-data">
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
<!-- <div class="form-group">
    <label for="exampleInputEmail1">Mã sản phẩm</label>
    <input type="text" class="form-control" name="ma_san_pham" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
  </div> -->
  <div class="form-group">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" class="form-control" name="ten_san_pham" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Thông số kỹ thuật</label>
    <input type="text" class="form-control" name="thong_so" aria-describedby="emailHelp" placeholder="Thông số kỹ thuật">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mô tả ngắn gọn</label>
    <input type="text" class="form-control" name="mo_ta" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phù hợp với xe</label>
    
   <select name="phu_hop_xe" class="form-control input-sm m-bot15">
      
         <option value="Xe số">Xe số</option>
         <option value="Xe tay ga">Xe tay ga</option>
        
   </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Giá</label>
    <input type="text" class="form-control" name="gia_san_pham" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Hình ảnh</label>
    <input type="file" class="form-control" name="hinhanh" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Loại nhớt</label>
   <select name="loai_nhot" class="form-control input-sm m-bot15">
        @foreach($loainhot as $key =>$value)
         <option value="{{$value->maloai}}">{{$value ->tenhangnhot}}</option>
        @endforeach
   </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection