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
            <li><a href="#">Nhà cung cấp</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">

            <div class="box-header">
            </div>
            <div class="box-body">
            <form action="{{url('supplier')}}" method="post" enctype="multipart/form-data" >
            @csrf
                <h4> Tên nhà cung cấp : </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                    <input required type="text" name="name" class="form-control" placeholder="Tên nhà cung cấp . . . . . . . . .">
                </div>

                <h4> Email : </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input required type="text" name="email" class="form-control" placeholder="Email . . . . . . . . .">
                </div>


                <h4> Địa chỉ : </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                    <input required type="text" name="address" class="form-control" placeholder="Địa chỉ . . . . . . . . .">
                </div>

                <h4> Số điện thoại </h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input class="form-control"name="phone"  id="cc" type="text" data-inputmask="'mask': '999-999-9999'" placeholder="Số điện thoại . . . . . . . . ." >
                </div>
                <div class="form-group">
                <h4 for="exampleInputFile">Ảnh đại diện</h4>
                    <input id="img" type="file" name="img" onchange="changeImg(this)" >
			        <img id="avatar" class="thumbnail" width="100px" height="100px" src="new.jpg">
                </div>
                <br>
                <div class="text-center">
                    <button  style="border-color: #4a4235;background-color:#4a4235;"class=" btn  btn-success btn-lg"> Thêm </button>
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