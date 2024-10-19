@extends('layout_admin.master2')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thống Kê
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thống Kê</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-suitcase"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Số sản phẩm</span>
                        <span class="info-box-number">0</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-archive"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Số sản phẩm</span>
                        <span class="info-box-number">0</span>
                        
                        

                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tiền bán hàng</span>
                        <span class="info-box-number">760</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <span class="info-box-number">2,000</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->



        <!-- Main row -->
        <div class="row">
            <!-- Left col -->

            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-signal">&nbsp; Hoạt động</i></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body  ">
                    <div class="info col-xs-7">Tiền bán hàng</div>
                    <div class="info col-xs-5 data text-right">0</div>
                    <div class="info col-xs-7">Số đơn hàng</div>
                    <div class="info col-xs-5 data text-right">0</div>
                    <div class="info col-xs-7">Số sản phẩm</div>
                    <div class="info col-xs-5 data text-right">0</div>
                    <div class="info col-xs-7">Khách hàng trả</div>
                    <div class="info col-xs-5 data text-right">0</div>

                    <div class="box-footer text-center">
                        <a href="javascript::;" class="uppercase">Xem Thêm</a>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            </div>
            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-bars">&nbsp;Thông tin kho</i> </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                           
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body  ">
                        <div class="info col-xs-7">Tồn kho</div>
                        <div class="info col-xs-5 data text-right">14</div>
                        <div class="info col-xs-7">Hết Hàng</div>
                        <div class="info col-xs-5 data text-right">1</div>
                        <div class="info col-xs-7">Sắp hết hàng</div>
                        <div class="info col-xs-5 data text-right">0</div>
                        <div class="info col-xs-7">Vượt định mức</div>
                        <div class="info col-xs-5 data text-right">0</div>
                    <div class="box-footer text-center">
                        <a href="javascript::;" class="uppercase">Xem Thêm</a>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            </div>

            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-barcode">&nbsp;Thông tin sản phẩm</i></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                           
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body  ">
                    <div class="info col-xs-7">sản phẩm/Nhà sản xuất</div>
                    <div class="info col-xs-5 data text-right">21                        /14</div>
                    <div class="info col-xs-7">Chưa làm giá bán</div>
                    <div class="info col-xs-5 data text-right">1</div>
                    <div class="info col-xs-7">Chưa nhập giá mua</div>
                    <div class="info col-xs-5 data text-right">0</div>
                    <div class="info col-xs-7">Hàng chưa phân loại</div>
                    <div class="info col-xs-5 data text-right">0</div>
                    <div class="box-footer text-center">
                        <a href="javascript::;" class="uppercase">Xem Thêm</a>
                    </div><!-- /.box-footer -->
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->


        </div><!-- /.row -->


        <div class="row">

            <div class="col-xs">
                <div class="box box-solid ">

                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-table"></i>&nbsp;Đơn hàng mới</h3>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <div class="box-body ">
                        <table class="table table-bordered">
                            <tr>
                                <th>Tên sách </th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>tổng tiền Tiền</th>
                                <th>Tình trạng</th>
                                <th>Tùy chọn</th>
                            </tr>
                            <tr>
                                <td>Harry Potter</td>
                                <td>2</td>
                                <td>20000</td>
                                <td>4</td>
                                <td>
                                    
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Đang xử lý <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Tiếp nhận</a></li>
                                            <li><a href="#">Đã giao</a></li>

                                        </ul>
                                    </div>
                                <td><button class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Harry Potter</td>
                                <td>2</td>
                                <td>20000</td>
                                <td>4</td>
                                <td>
                                    
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Đang xử lý <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Tiếp nhận</a></li>
                                            <li><a href="#">Đã giao</a></li>

                                        </ul>
                                    </div>
                                <td><button class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Harry Potter</td>
                                <td>2</td>
                                <td>20000</td>
                                <td>4</td>
                                <td>
                                    
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Đang xử lý <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Tiếp nhận</a></li>
                                            <li><a href="#">Đã giao</a></li>

                                        </ul>
                                    </div>
                                <td><button class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>



                        </table>
                        <a href="{{route('bill.index')}} "><i class="fa  fa-hand-o-right"></i>&nbsp; Xem thêm</a>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection