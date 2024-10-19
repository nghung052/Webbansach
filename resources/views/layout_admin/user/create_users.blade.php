@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm thành viên
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li class="active">Người dùng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">

            <div class="box-header">
            </div>
            <div class="box-body">
                <form action="{{ route('user.index') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4> Họ tên : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input type="text" name="fullname" class="form-control" placeholder="Họ tên . . . . . . . . .">
                    </div>
                    @error('fullname')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Nhà phát hành </h4>
                    <div class="input-group input-group">
                        <div class="input-group-btn">
                            <select style=" font-weight:bold;" name="cate" class="form-control">
                                <option style=" font-weight:bold;" value="-1"> --Chọn nhà phát hành-- </option>
                                @foreach ($companies as $com)
                                <option value="{{ $com->id }}">{{ $com->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- /btn-group -->
                    </div><!-- /input-group -->
                    <h4> Tên đăng nhập : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input type="email" name="username" class="form-control" placeholder="Tên đăng nhập . . . . . . . . .">
                    </div>
                    @error('username')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Mật khẩu : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu . . . . . . . . .">
                    </div>
                    @error('password')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Địa chỉ : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ . . . . . . . . .">
                    </div>
                    @error('address')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Số điện thoại </h4>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input class="form-control" name="phone" id="cc" type="number"placeholder="Số điện thoại. . . . . . . . ." />
                    </div>
                    @error('phone')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <br>
                    <div class="text-center">
                        <button class=" btn  btn-success btn-lg" style="background-color: #4a4235;border: #4a4235"> Thêm </button>
                    </div>
                </form>
            </div>
    </section><!-- /.content -->
</div>
@endsection