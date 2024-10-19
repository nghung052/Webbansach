@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý tài khoản
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li class="active">Người dùng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <tr style=" font-size:18px;">
                            <th> Tên người dùng</th>
                            <th>Tên tài khoản</th>
                            <th>Quyền</th>
                            <th></th>
                            <th></th>
                            <th></th> 
                            <th width="10%">Tùy chọn</th>                                                 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $mem)
                        <tr>
                            <td>{{ $mem->full_name }}</td>
                            <td>{{ $mem->username }}</td>
                            <td>{{ $mem->role->display_name }}</td>
                            <td>{{ $mem->email }}</td>
                            <td>{{ $mem->address }}</td>
                            <td>{{ $mem->phone }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel" style="color: red">Thông tin thành viên</h3>
            </div>
            <div class="modal-body">
                <div class="showMember"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>

        </div>
    </div>
</div>
</section><!-- /.content -->
</div>
@endsection
@section('js')
<script type="text/javascript">
    var table = $('#example1').DataTable({
        "paging": true,
        "info": false,
        "order": [],
        // hiding columns via datatable column.visivle API
        "columnDefs": [{
            "targets": [3, 4, 5],
            "visible": false
        }, {
            // adding a more info button at the end
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-info btn-sm' ><i class='fa fa-eye'></i></button>",
        }]
    });

    $('#example1 tbody').on('click', '.btn-sm', function() {
        var data = table.row($(this).parents('tr')).data(); // getting target row data
        $('.showMember').html(
            // Adding and structuring the full data
            '<table class="table dtr-details" width="100%"><tbody><tr><td><b>Tên người dùng</b><td><td>' + data[0] + '</td></tr><tr><td><b>Email</b><td><td>' + data[1] +
            '</td></tr><tr><td><b>Địa chỉ</b><td><td>' + data[4] + '</td></tr><tr><td><b>Số điện thoại</b><td><td>' + data[5] + '</td></tr></tbody></table>'

        );
        $('#myModal').modal('show'); // calling the bootstrap modal
    });
</script>
@stop