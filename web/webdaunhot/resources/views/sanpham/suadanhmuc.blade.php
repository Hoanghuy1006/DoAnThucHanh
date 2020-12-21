@extends('admin_layout')
@section('admin_content')
@foreach($suadanhmuc as $key =>$value)
<form action="{{URL::to('/luu-sua-danh-muc/'.$value->maloai)}}" method="post">
{{csrf_field()}}
<div>
    <span></span>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Mã loại nhớt</label>
    <input type="text" value="{{$value->maloai}}" class="form-control" name="ma_loai_nhot" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ten loai nhot</label>
    <input type="text" value="{{$value->tenhangnhot}}" class="form-control" name="ten_loai_nhot" aria-describedby="emailHelp" placeholder="tên danh mục">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Nhà cung cấp</label>
    <textarea class="form-control" name="nha_cung_cap" id="exampleFormControlTextarea1" rows="3">{{$value->nhacungcap}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endforeach
@endsection