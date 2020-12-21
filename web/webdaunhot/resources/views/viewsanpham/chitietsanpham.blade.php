@extends('trangchu') <!--trỏ về giao diện chính --> 
@section('content') 
<!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">Chi tiết sản phẩm
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">
  @foreach($ttsanpham as $key =>$value)
    <div class="col-md-4">
      <img class="img-fluid" src="{{URL::to('public/images/'.$value->hinhanh)}}" alt="">
    </div>
    <div class="col-md-8">
    <h3 class="my-3">{{$value->tensp}}</h3>
      

      <p>{{$value ->mota}}</p>
      <p><h5>Giá: {{ number_format($value->gia) }} VNĐ</h5></p>
      <form action="{{URL::to('/luu-gio-hang')}}" method="post">
    {{csrf_field()}}
    
      <input type="number" name="soluong" class="form-inline" min="1" value="1"/>
      <input type="hidden" name ="maspmua" value="{{$value->masp}}"/>


      <button type="submit" class="btn-sm btn-warning">THÊM SẢN PHẨM VÀO GIỎ</button>
    </form>
      <h3 class="my-3">Thông số cơ bản</h3>
      <ul>
        <li>{{$value->thongso}}</li>
        <li>Phù hợp cho xe: {{$value->phuhopxe}}</li>
        
      </ul>
    </div>
  </div>
@endforeach
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection