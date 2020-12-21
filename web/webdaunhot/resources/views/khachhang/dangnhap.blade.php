@extends('trangchu')
@section('content')

<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="span6">
                <div class="area">
                    <form class="form-horizontal" action="{{URL::to('kh-dang-nhap')}}" method="post">
                        <div class="heading">
            {{csrf_field()}}
                            <h4 class="form-heading">Đăng nhập</h4>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for=
                            "inputUsername">Email</label>

                            <div class="controls">
                                <input name="email_dang_nhap" type="text">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for=
                            "inputPassword">Mật khẩu</label>

                            <div class="controls">
                                <input  name="pass_dang_nhap" type="text">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-success" type=
                                "submit">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="span6">
                <div class="area">
                    <form class="form-horizontal" action="{{URL::to('/them-khach-hang')}}" method="POST">
                        <div class="heading">
                            <h4 class="form-heading">Đăng Ký</h4>
                        </div>
                     
                        {{csrf_field()}}
                        <div class="control-group">
                            <label  class="control-label" for=
                            "inputCompanyName">Tên</label>

                            <div class="controls">
                                <input name="ten_khach_hang"  type="text">
                            </div>
                        </div>

                        

                        <div class="control-group">
                            <label class="control-label" for=
                            "inputEmail">Email</label>

                            <div class="controls">
                                <input name="email_khach_hang" type="text">
                            </div>
                        </div>

                        <!-- <div class="control-group">
                            <label class="control-label" for=
                            "inputUser">Username</label>

                            <div class="controls">
                                <input id="inputUser" placeholder=
                                "E.g. ashwinhegde" type="text">
                            </div>
                        </div> -->

                        <div class="control-group">
                            <label class="control-label" for=
                            "inputPassword">Password</label>

                            <div class="controls">
                                <input name="mat_khau_khach_hang" type="password">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                 <button class=
                                "btn btn-success" type="submit">Đăng ký</button>
                            </div>
                            
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection