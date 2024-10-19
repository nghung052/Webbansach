@extends('layout_admin.master')
@section('content')
<style>
      .aa {
        margin-left:350px;
        width: 400px;
       
       
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thay đổi thông tin
            <small>Đổi mật khẩu</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li class="active">Đổi mật khẩu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <div class="box">
                        <div class="box-header">
                            <img style="background-color: #ffffff" src="{{asset('images/icon/admin.png')}}" class="img-circle" alt="User Image" />
                            <p>
                                {{ $user->full_name }}
                                <small>({{$user->role->display_name }})</small>
                            </p>
                            <h3 class="box-title">Đổi mật khẩu</h3>
                        </div>
                        <form action="{{ route('user.update',[Auth::user()->id]) }}" method="post" class="beta-form-checkout">
                            @csrf
                            @method('put')
                            <div class="box-body">
                                <!-- Date range -->                   
                                <h4> Mật khẩu cũ </h4>
                                <div class="input-group aa ">
                                    <span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
                                    <input required name="password_old" type="password" class="form-control" placeholder="Mật khẩu cũ. . . . . . . . .">      
                                </div>
                                <h4> Mật khẩu mới:</h4>
                                <div class="input-group aa ">
                                    <span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
                                    <input required name="new_password" type="password" class="form-control" placeholder="Mật khẩu mới. . . . . . . . .">
                                </div>
                                <h4> Xác nhận mật khẩu: </h4>
                                <div class="input-group aa">
                                    <span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
                                    <input required name="re_password" type="password" class="form-control" placeholder="Xác nhận mật khẩu. . . . . . . . .">
                                </div>
                                <br>                      
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="background-color: #4a4235;border: #4a4235">Cập nhật</button>
                                </div>
                                @if(count($errors) > 0)
                                <div class="alert alert-danger" style="width:350px; margin-left:380px; ">
                                    @foreach($errors->all() as $err)
                                    {{$err}}
                                    @endforeach
                                </div>
                                @endif
                                @if(Session::has('flag'))
                                <div class="alert alert-{{Session::get('flag')}}"style="width:350px; margin-left:430px; " >{{Session::get('messege')}} </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
