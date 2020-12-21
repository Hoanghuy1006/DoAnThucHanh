@extends('admin_layout')
@section('admin_content')
<table class="table">
  <thead>

    <tr>
      <th scope="col">Mã loại</th>
      <th scope="col">Tên loại</th>
      <th scope="col">Nhà cung cấp</th>
      <th scope="col">THAO TÁC</th>
    </tr>
  </thead>
  <tbody>
 
  @foreach($hienthidanhmuc as $key =>$value)
  <?php
                                    $thongbao = Session::get('thongbao');
                                    if($thongbao){
                                        echo $thongbao;
                                        Session::put('thongbao',null);
                                    }
                                    
                                    ?>
    <tr>
    
      <th scope="row">{{$value->maloai}}</th>
      <td>{{$value->tenhangnhot}}</td>
      <td>{{$value->nhacungcap}}</td>
      <td><a href="{{URL::to('/sua-danh-muc/'.$value->maloai)}}"><button type="button" class="btn btn-primary">SỬA</button></a>
      <a onclick="return confirm('chắn chắn muốn xóa ?')" href="{{URL::to('/xoa-danh-muc/'.$value->maloai)}}"><button type="button" class="btn btn-danger">XÓA</button></a>
      
      </td>
      
      
    </tr>
    @endforeach
   
  </tbody>
</table>
@endsection