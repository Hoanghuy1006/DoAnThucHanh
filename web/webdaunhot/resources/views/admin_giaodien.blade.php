       <!-- lấy giao diện chính đã có sẵn ở phần trên -->
       @extends('admin_layout') <!--trỏ về giao diện chính --> 
       @section('admin_content') <!--   đặt tên của cái giao diện nhỏ này
                                        để qua giao diện cần trỏ và thì
                                        gọi đúng tên này --> 

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">XIN CHÀO BẠN</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        @endsection