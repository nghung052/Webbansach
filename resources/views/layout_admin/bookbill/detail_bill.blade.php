@extends('layout_admin.master')
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Chi tiết hóa đơn
            <small>#007612</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li><a href="#">Đơn hàng</a></li>
           
          </ol>
        </section>

        <div class="pad margin no-print">
          <div class="callout callout-info" style="margin-bottom: 0!important;">												

          </div>
        </div>

        <!-- Main content -->
        <section class="invoice">
          <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-md-4">Thông tin khách hàng</th>
                                        <th class="col-md-6"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Thông tin người đặt hàng</td>
                                        <td>ád</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đặt hàng</td>
                                        <td>ád</td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td>ád</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td>ád</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>ád</td>
                                    </tr>
                                    <tr>
                                        <td>Ghi chú</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                            aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting col-md-1">STT</th>
                                    <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                    <th class="sorting col-md-2">Số lượng</th>
                                    <th class="sorting col-md-2">Giá tiền</th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> VNĐ</td>
                                </tr>

                                <tr>
                                    <td colspan="3"><b>Tổng tiền</b></td>
                                    <td colspan="1"><b class="text-red"> VNĐ</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-inline">
                                <label>Trạng thái giao hàng: </label>
                                <select name="status" class="form-control input-inline" style="width: 200px">
                                    <option value="1">Chưa giao</option>
                                    <option value="2">Đang giao</option>
                                    <option value="2">Đã giao</option>
                                </select>

                                <input type="submit" value="Xử lý" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->


@endsection