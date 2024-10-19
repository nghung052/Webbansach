@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Nhà Xuất Bản
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li><a href="#">Nhà xuất bản</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">

            <div class="box-header">
            </div>
            <div class="box-body">
                <form action="{{url('companies')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4> Tên nhà xuất bản : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Tên nhà xuất bản . . . . . . . . .">
                    </div>
                    @error('name')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Email : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email . . . . . . . . .">
                    </div>
                    @error('email')
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
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại . . . . . . . . .">
                    </div>
                    @error('phone')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <br>
                    <div class="text-center">
                        <button class=" btn  btn-success btn-lg" style="border-color: #4a4235;background-color:#4a4235;"> Thêm </button>
                    </div>
                </form>
            </div>
    </section><!-- /.content -->
</div>
@endsection