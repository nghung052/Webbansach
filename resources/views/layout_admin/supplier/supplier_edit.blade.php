@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Nhà Cung Cấp
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Simple</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">

            <div class="box-header">
            </div>
            <div class="box-body">
            <form action="{{route('supplier.update',[$supplier['id']])}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('put')
                <h4> Tên nhà cung cấp : </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                    <input required type="text" name="name" class="form-control" value="{{$supplier->name}}" placeholder="Tên nhà cung cấp . . . . . . . . .">
                </div>

                <h4> Email : </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input required type="text" name="email" class="form-control" value="{{$supplier->email}}" placeholder="Email . . . . . . . . .">
                </div>


                <h4> Địa chỉ : </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                    <input required type="text" name="address" class="form-control" value="{{$supplier->address}}" placeholder="Địa chỉ . . . . . . . . .">
                </div>

                <h4> Số điện thoại </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input class="form-control"name="phone"  id="cc" type="text" data-inputmask="'mask': '999-999-9999'" value="{{$supplier->phone}}" >
                   
                </div>
                <div class="form-group">
                <h4 for="exampleInputFile">Ảnh đại diện</h4>
                <img id="avatar" class="thumbnail" width="150px" src="{{asset('images/users/'.$supplier->image)}}">
                <input name="img" type="file" id="exampleInputFile">
                </div>
                <br>
                <div class="text-center">
                    <button  style="border-color: #4a4235;background-color:#4a4235"class=" btn  btn-success btn-lg"> Cập nhật </button>
                </div>
            </form>
            </div>
    </section><!-- /.content -->
</div>
@endsection
@section('js')
    
    <script type="text/javascript">
      $(":input").inputmask();


    </script>

@stop