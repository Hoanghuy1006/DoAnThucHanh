<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="{{ asset('') }}">
  <title>DẦU NHỚT AN HUY</title>
  <style>
  
  
  </style>

  <!-- Bootstrap core CSS -->
  <link href="vendor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/css/sl.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="vendor/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{URL::to('/')}}">Dầu nhớt An Huy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{URL::to('/trang-chu')}}">Trang chủ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/hien-thi-gio-hang')}}">Giỏ hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/dang-nhap-thanh-toan')}}">Tài khoản</a>
          </li>
          <?php
          $mathemKH= Session::get('MaKH');
          if($mathemKH !=null){

          
          ?>
                <li class="nav-item">
            <a class="nav-link" href="{{URL::to('/kh-dang-xuat')}}">Đăng xuất</a>
          </li>
         
          <?php
            }else{
          ?>
          
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('dang-nhap-thanh-toan')}}">Đăng nhập</a>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
      
        <h1 class="my-4">Loại nhớt</h1>
        @foreach($loainhot as $key =>$loainhot)
        <div class="list-group">
          <a href="{{URL::to('/sptheoloai/'.$loainhot->maloai)}}" class="list-group-item">{{$loainhot->tenhangnhot}}</a>
      
        </div>
@endforeach
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          @yield('content2')
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{URL::to('public/images/ban.png')}}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{URL::to('public/images/2.png')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{URL::to('public/images/ban.png')}}" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
        @yield('content')
        
        </div>
        
        

       
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Đặng Ngọc An</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/vendor/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function()
    
    {
      $('.them-gio-hang').click(function(){
        var id=$(this).data('id');
        var tenspgiohang= $('.tenspgiohang'+id).val();
        
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{url('/luu-gio-hang')}}',
            method:'POST',
            data:{id:id,tenspgiohang:tenspgiohang,_token:_token},

            success:function(data){
            alert(data);
            }
        });

      });

    }
    );
  </script>

</body>

</html>
