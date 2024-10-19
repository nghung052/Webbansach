@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>
      Quản lý nhà cung cấp   <small>Thêm, sửa, nhà cung cấp .</small>
    </h2>
   
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Nhà cung cấp</a></li>
      <li class="active">Danh Sách</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">


            <form action="">
                <div class="col-md-4 pull-left">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control  pull-right"
                            placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn btn-success"
                                style="border-color: #4a4235;background-color:#4a4235;float:left;margin-bottom:5px;margin-left:2px"><i
                                    class="fa fa-search"> Tìm kiếm </i></button>

          
   

                        </div>
                    </div>
                </div>
            </form>
   
            <div class="col-md-4 pull-right">
                <a href="{{ route('supplier.create') }}">
                    <button class="btn btn btn-success"
                        style="border-color: #4a4235;background-color:#4a4235;float: right;;margin-bottom:5px;margin-left:2px">
                        <i class="fa fa-plus"> Thêm nhà cung cấp </i></button>
                </a>
            </div>
        </div><!-- /.box-header -->
          <div class="box-body ">
            <table class="table table-bordered">
              <tr>
                <th>Ảnh đại diện </th>
                <th>Tên nhà cung cấp </th>
                <th>Email</th>
                <th>Địa chỉ </th>
                <th>Số Điện Thoại</th>

                <th colspan="2">Tùy chọn</th>
              </tr>
              @foreach($supplier as $sup)
              <tr>
                <td><img style="margin-left:20px; width:60px;height:50px;" src="{{asset('images/users/'.$sup->image)}}"></td>
                <td>{{$sup->name}}</td>
                <td>{{$sup->email}}</td>
                <td>{{$sup->address}}</td>
                <td>{{$sup->phone}}</td>
                <td>
                  <div class="btn-toolbar" role="toolbar" >
                    <div class="btn-group mr-2" role="group">
                  <button style="float:right" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                    </div>
                    <div class="btn-group mr-2" role="group">
                  <a href="{{ route('supplier.edit',[$sup['id']]) }}">
                    <button style="float:right" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                  </a>
                </div>
                <div class="btn-group mr-2" role="group">
                  <form  method="post" action="{{route('supplier.destroy', [$sup['id']]) }}" enctype="multipart/form-data" name="form1" id="form1">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button style="float:right" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không')"><i class="fa fa-trash-o"></i></button>
                  </form>
                </div>
                  </div>  
                </td>
              </tr>
              @endforeach
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->


</div>
</div>
</section><!-- /.content -->

@endsection
