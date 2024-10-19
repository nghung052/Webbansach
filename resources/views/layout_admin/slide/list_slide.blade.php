@extends('layout_admin.master')



@section('content')

<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý Banner
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li class="active"><a href="#">Banner</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs">
                <div class="box">
                    <div class="box-header">
                        <form action="">
                            <div class="col-md-4 pull-left">
                                <div class="input-group">
                                    <input type="text" id="table_search" name="table_search" class="form-control  pull-right"
                                        placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn btn-warning"
                                            style="float:left;margin-top:0px;margin-left:2px"><i
                                                class="fa fa-search"> Tìm kiếm </i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-md-4 pull-right">
                            <a href="{{route('slide.create')}}">
                                <button class="btn btn btn-warning"
                                    style="float: right;;margin-bottom:5px;margin-left:2px">
                                    <i class="fa fa-plus"> Thêm bìa mới </i></button>
                            </a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="tableId" class="table table-hover">
                            <tbody>
                                <tr style="font-size:16px;">
                                    <th>Tiêu đề</th>
                                    <th width="20%">Hình ảnh</th>
                                    <th style="text-align:center;" width="30%">Trạng thái</th>
                                    <th colspan="2" width="20%">
                                        <center>Chức năng</center>
                                    </th>
                                </tr>
                                @foreach ($slide as $sl)
                                <tr>
                                    <td>{{ $sl->title }}</td>
                                    <td><img style="width:200px;height:150px;" src="{{ asset('images/slide/'.$sl->image)}}"></td>
                                    <td style="text-align:center;">
                                        @if($sl->status == 1)
                                            <h4><a href="{{ route('slide_off', [$sl['id']]) }}" class="label-success label ">Hoạt động</a></h4>
                                        @else
                                            <h4><a href="{{ route('slide_on', [$sl['id']]) }}" class="label-default label ">Ngừng hoạt động</a></h4>                                
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('slide.edit', [$sl['id']]) }}">
                                            <button  class="btn btn-warning btn pull-right"><i class="fa fa-edit"> Sửa </i> </button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('slide.destroy', [$sl['id']]) }}" enctype="multipart/form-data" name="form1" id="form1">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button  class="btn btn-danger btn pull-left" onclick="return confirm('Bạn có muốn xóa không')"><i class="fa fa-trash"> Xóa </i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
</div>
</section>
<!-- danh sach -->

</section><!-- /.content -->

</div>

@endsection