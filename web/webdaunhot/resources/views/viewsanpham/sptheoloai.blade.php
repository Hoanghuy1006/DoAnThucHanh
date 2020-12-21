      <!-- lấy giao diện chính đã có sẵn ở phần trên -->
      @extends('trangchu') <!--trỏ về giao diện chính --> 
       @section('content') <!--   đặt tên của cái giao diện nhỏ này
                                        để qua giao diện cần trỏ và thì
             
                                        gọi đúng tên này --> 
       <div >
       @foreach($tenhangnhot as $key =>$value2)
       <h2 >Các sản phẩm thuộc hãng: {{$value2->tenhangnhot}}</h2>
       @endforeach
     </div>
      
      @foreach($sptheoloai as $key =>$sptheoloai)
            <div class="col-lg-4 col-md-6 mb-4">
            
            <div class="card h-100">
              <a href="{{URL::to('/chi-tiet-san-pham/'.$sptheoloai->masp)}}"><img class="card-img-top" src="{{URL::to('public/images/'.$sptheoloai ->hinhanh)}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item One</a>
                </h4>
                <h5>{{number_format($sptheoloai -> gia)}}</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          @endforeach
        @endsection