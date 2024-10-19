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
            Quản lý đơn hàng
            <small>Xử lý và xem tình trạng của đơn hàng</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Hệ thống</a></li>
            <li><a href="#">Đơn hàng</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->


        <div class="row">

            <div class="col-xs-12">
                <div class="box box-solid ">
                    <div class="btn-group" style="margin-top:10px;margin-left:5px">

                    
                        <button type="button" class="btn bg-purple dropdown-toggle" data-toggle="dropdown">
                            Đơn hàng <span class="caret"></span></button>
                            <ul style="background-color: white" class="dropdown-menu" role="menu">
                                <li><a href="{{route('notreceiving')}}">Đơn hàng đang xử lý</a></li>
                                <li><a href="{{route('receiving')}}">Đơn hàng đã tiếp nhận</a></li>
                                <li><a href="{{route('completereceiving')}}">Đang hàng đã giao</a></li>
                                <li><a href="{{route('fails')}}">Đang hàng thất bại</a></li>
                            </ul>
                    </div>
                    <div class="box-body ">
                        <!-- ShowModal -->
                        <table id="example" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ngày đặt</th>
                                    <th>Email</th>
                                    <th>Tổng sản phấm</th>
                                    <th width="10%">Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Tình trạng</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($bill as $bills)
                                <tr>
                                    <td>{{$bills->user->full_name}}</td>
                                    <td>{{$bills->address}}</td>
                                    <td>{{$bills->phone}}</td>
                                    <td colspan="3">
                                        <div class="your-order-item" width="100%">
                                            @foreach($bills->products as $product)
                                            <div class="cart-item">
                                                <div class="media">
                                                    <img style="width:100px;height:80px;" src="{{ asset('images/product/' . $product->image) }}" class="pull-left">
                                                    <div class="media-body">
                                                        <span class="color-gray your-order-info"><b>Tên sách:</b> {{$product->name}}</span><br>
                                                        <span class="color-gray your-order-info"><b>Đơn giá:</b> {{number_format($product->pivot->unit_price)}} VNĐ</span><br>
                                                        <span class="color-gray your-order-info"><b>Số lượng:</b> *{{$product->pivot->quantity}} </span>
                                                    </div>
                                                    <br><br>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </td>
                                    <td>{{$bills->date_order}}</td>
                                    <td>{{$bills->email}}</td>
                                    <td style="text-align:center">{{$bills->quantity}}</td>
                                    <td>{{number_format($bills->total,0,"",",")}} </td>
                                    <td>{{$bills->payment}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if($bills->status == 0)
                                            <button type="button" class="btn btn-default ad dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Đang xử lý</button>
                                            <ul style="background-color: white" class="dropdown-menu" role="menu">
                                                <a href="{{route('bill_receiving',[$bills['id']])}}" class="btn btn-primary ad">
                                                    <li>Tiếp nhận</li>
                                                </a>
                                                <a href="{{route('bill_delivered',[$bills['id']])}}" class="btn btn-success ad">
                                                    <li>Đã giao</li>
                                                </a>
                                                <a href="{{route('bill_fail',[$bills['id']])}}" class="btn btn-danger ad">
                                                    <li>Thất bại</li>
                                                </a>
                                            </ul>
                                            @endif
                                            @if($bills->status == 1)
                                            <button type="button" class="btn btn-primary ad dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Tiếp nhận</button>
                                            <ul   style="background-color: white" class="dropdown-menu" role="menu" style="width:105px">
                                                <a href="{{route('bill_processing',[$bills['id']])}}" class="btn btn-default ad">
                                                    <li>Đang xử lý</li>
                                                </a>
                                                <a href="{{route('bill_delivered',[$bills['id']])}}" class="btn btn-success ad">
                                                    <li>Đã giao</li>
                                                </a>
                                                <a href="{{route('bill_fail',[$bills['id']])}}" class="btn btn-danger ad">
                                                    <li>Thất bại</li>
                                                </a>
                                            </ul>
                                            @endif
                                            @if($bills->status == 2)
                                            <button type="button" class="btn btn-success ad dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Đã giao</button>
                                            <ul style="background-color: white" class="dropdown-menu" role="menu">
                                                <a href="{{route('bill_processing',[$bills['id']])}}" class="btn btn-default ad">
                                                    <li>Đang xử lý</li>
                                                </a>
                                                <a href="{{route('bill_receiving',[$bills['id']])}}" class="btn btn btn-primary ad">
                                                    <li>Tiếp nhận</li>
                                                </a>
                                                <a href="{{route('bill_fail',[$bills['id']])}}" class="btn btn-danger ad">
                                                    <li>Thất bại</li>
                                                </a>
                                            </ul>
                                            @endif

                                            @if($bills->status == 3)
                                            <button type="button" class="btn btn-danger ad dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Thất bại</button>
                                            <ul  style="background-color: white" class="dropdown-menu" role="menu">
                                                <a href="{{route('bill_processing',[$bills['id']])}}" class="btn btn-default ad">
                                                    <li>Đang xử lý</li>
                                                </a>
                                                <a href="{{route('bill_receiving',[$bills['id']])}}" class="btn btn-primary ad">
                                                    <li>Tiếp nhận</li>
                                                </a>
                                                <a href="{{route('bill_delivered',[$bills['id']])}}" class="btn btn-success ad">
                                                    <li>Đã giao</li>
                                                </a>
                                            </ul>
                                            @endif
                                        </div>
                                    </td>
                                    <td> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:auto">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel" style="color: red">Chi tiết đơn hàng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="showBill"></div>
                        <button class="btn btn-primary hidden-print" onclick="myFunction()"> In</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                    
                </div>
            </div>
        </div>
</div>
</div><!-- /.box-body -->
</section><!-- /.content -->


<div class="clearfix"></div>
</div><!-- /.content-wrapper -->
@endsection

@section('js')
<script type="text/javascript">
    var table = $('#example').DataTable({
        "paging": true,
        "info": false,
        "order": [],
        // hiding columns via datatable column.visivle API
        "columnDefs": [{
            "targets": [1, 3, 4],
            "visible": false
        }, {
            // adding a more info button at the end
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-info btn1' ><i class='fa fa-eye'></i></button>",                               
        }]
    });

    $('#example tbody').on('click', '.btn1', function() {
        var data = table.row($(this).parents('tr')).data(); // getting target row data
        $('.showBill').html(
            // Adding and structuring the full data
            '<table class="table dtr-details" width="100%"><h4 class="text-center" style="color:blue">Thông tin khách hàng</h4><tbody><tr><td><b>Tên Khách Hàng</b><td><td>' + data[0] + '</td></tr><tr><td><b>Địa chỉ</b><td><td>' + data[1] + '</td></tr><tr><td><b>Số điện thoại</b><td><td>' + data[2] +
            '</td></tr><tr><td><b>Ngày đặt</b><td><td>' + data[4] + '</td></tr><tr><td><b>Email</b><td><td>' + data[5] + '</td></tr></tbody></table>' +
            '<table class="table table-bordered table-hover dataTable"><tr role="row"><th class="sorting_asc text-center" style="color:blue"><h4>Thông tin đơn hàng</h4></th></tr><tbody><tr><td>' + data[3] +
            '</td></tr><tr><td><b style="font-size:18px">Tổng tiền :</b><b class="text-red pull-right">' + data[7] + '</b></td></tr></table>'

        );
        $('#myModal').modal('show'); // calling the bootstrap modal
    });
</script>
@stop

@section('in')
<script type="text/javascript">
  function myFunction() {
    window.print();
}
</script>
@endsection