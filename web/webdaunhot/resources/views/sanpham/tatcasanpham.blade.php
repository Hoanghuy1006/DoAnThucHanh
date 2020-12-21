@extends('admin_layout')
@section('admin_content')
<table class="table">
  <thead>

    <tr>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên SP</th>
      <th scope="col">GIÁ</th>
      <th scope="col">THÔNG SỐ</th>
      <th scope="col">HÌNH ẢNH</th>
      <th scope="col">LOẠI NHỚT</th>
      <th scope="col">THAO TÁC</th>
    </tr>
  </thead>
  <tbody>
 
  @foreach($hienthisanpham as $key =>$value)
  <?php
                                    $thongbao = Session::get('thongbao');
                                    if($thongbao){
                                        echo $thongbao;
                                        Session::put('thongbao',null);
                                    }
                                    
                                    ?>
    <tr>
    
      <th scope="row">{{$value->masp}}</th>
      <td>{{$value->tensp}}</td>
      <td>{{$value->gia}}</td>
      <td>{{$value->thongso}}</td>
      <td><img src="public/images/{{$value->hinhanh}}" height="100"</td>
     
      <td>{{$value->tenhangnhot}}</td>
      <td><a href="{{URL::to('/sua-san-pham/'.$value->masp)}}"><button type="button" class="btn btn-primary">SỬA</button></a>
      <a onclick="return confirm('chắn chắn muốn xóa ?')" href="{{URL::to('/xoa-san-pham/'.$value->masp)}}"><button type="button" class="btn btn-danger">XÓA</button></a>
      
      </td>
      
      
    </tr>
    @endforeach
   
  </tbody>
</table>
@endsection