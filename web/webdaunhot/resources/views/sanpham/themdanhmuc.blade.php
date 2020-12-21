@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/luu-danh-muc')}}" method="post">
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
    <label for="exampleInputEmail1">Mã loại nhớt</label>
    <input type="text" class="form-control" name="ma_loai_nhot" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ten loai nhot</label>
    <input type="text" class="form-control" name="ten_loai_nhot" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Nhà cung cấp</label>
    <textarea class="form-control" name="nha_cung_cap" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection