@extends('layout_admin.master')
@section('content')
    <style>
        .ad {

            width: 105px;
        }

    </style>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý kho hàng
                <small>Xử lý và xem tình trạng của đơn hàng</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Hệ thống </a></li>
                <li class="active">Kho hàng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-solid ">
                        <div class="box-header">
                            <div class="product-sear panel-sear">
                                <div class="form-group col-md-3 padd-0">
                                    <input style="width:300px ;padding:10px; margin: 0;" type="text" class="form-control"
                                        id="order-search" placeholder="Nhập mã đơn hàng để tìm kiếm">
                                </div>
                                <div class="form-group col-md-9 padd-0" style="padding-left: 5px;">
                                    <div class="col-md-9 padd-0">
                                        <div class="col-md-4 padd-0">
                                            <select style="width:178px ;" id="search-option-1" class="form-control">
                                                <option value="0">Đơn hàng</option>
                                                <option value="1">Đơn hàng đã xóa</option>
                                                <option value="2">Đơn hàng còn nợ</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 padd-0" style="padding-left: 5px ">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input style="height:34px " type="date" class="input-sm form-control"
                                                    id="search-date-from" placeholder="Từ ngày" name="start">
                                                <span class="input-group-addon">Đến</span>
                                                <input style="height:34px " type="date" class="input-sm form-control"
                                                    id="search-date-to" placeholder="Đến ngày" name="end">
                                            </div>
                                        </div>
                                        <div class="col-md-3 padd-0" style="padding-left:21%;">
                                            <button style="box-shadow: none; margin: 0;" type="button"
                                                class="btn btn-success btn-large" onclick="cms_paging_order(1)"><i
                                                    class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3 padd-0" style="padding-left: 5px ">
                                        <div class="btn-group order-btn-calendar">
                                            <button type="button" onclick="cms_order_week() " class="btn btn-default"
                                                style=" margin: 0;">Tuần</button>
                                            <button type="button" onclick="cms_order_month()" class="btn btn-default"
                                                style=" margin: 0;">Tháng</button>
                                            <button type="button" onclick="cms_order_quarter()" class="btn btn-default"
                                                style=" margin: 0;">Quý</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Table With Full Features</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr style="font-size:18px;">
                                            <th>Tên sách </th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>tổng tiền Tiền</th>
                                            <th>Tình trạng</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Harry Potter</td>
                                            <td>2</td>
                                            <td>20000</td>
                                            <td>4</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">Đang xử lý</button>
                                                    <button type="button" class="btn btn-default dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul style="background-color: white; margin-top:5px;"
                                                        class="dropdown-menu" role="menu">


                                                        <li><a href="#">Action</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Another action</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Something else here</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Separated link</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            </td>
                                            <td>
                                                <div class="btn-toolbar" role="toolbar">
                                                    <div class="btn-group mr-2" role="group">
                                                        <a href="{{ route('archive.create') }}">
                                                            <button style="float:right" class="btn btn-success btn-sm"><i
                                                                    class="fa fa-plus"></i> </button>
                                                        </a>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group">
                                                        <button style="float:right" class="btn btn-info btn-sm"><i
                                                                class="fa fa-eye"></i></button>
                                                    </div>
                                                    <div class="btn-group mr-2" role="group">
                                                        <form method="post" action="" enctype="multipart/form-data"
                                                            name="form1" id="form1">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button style="float:right" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Bạn có muốn xóa không')"><i
                                                                    class="fa fa-trash-o"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->






                    </div>
                </div>

            @endsection

            @section('js')

                <script>
                   
                   $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": true
        });
                    

                </script>


            @stop
