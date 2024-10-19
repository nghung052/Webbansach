@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa nhà xuất bản
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống </a></li>
            <li><a href="#">Nhà xuất bản</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">

            <div class="box-header">
            </div>
            <div class="box-body">
                <form action="{{route('companies.update',[$companies['id']])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h4> Tên nhà xuất bản : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input required type="text" name="name" class="form-control" value="{{$companies->name}}" placeholder="Tên nhà cung cấp . . . . . . . . .">
                    </div>
                    <h4> Email : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required type="text" name="email" class="form-control" value="{{$companies->email}}" placeholder="Email . . . . . . . . .">
                    </div>

                    <h4> Địa chỉ : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input required type="text" name="address" class="form-control" value="{{$companies->address}}" placeholder="Địa chỉ . . . . . . . . .">
                    </div>
        
                    <h4> Số điện thoại </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input required type="text" name="phone" class="form-control" value="{{$companies->phone_number}}" placeholder="Số điện thoại . . . . . . . . .">
                    </div>
            
                    <br>
                    <div class="text-center">
                        <button class=" btn  btn-success btn-lg" style="border-color: #4a4235;background-color:#4a4235;"> Cập nhật </button>
                    </div>
                </form>
            </div>
    </section><!-- /.content -->
</div>
@endsection