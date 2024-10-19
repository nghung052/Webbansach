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
                    <div class="box-header">
                    <div class="col-md-4 pull-right">
                            <a href="{{ route('user.create') }}">
                                <button class="btn btn btn-success" style="float:right;;margin-bottom:5px;margin-left:2px;background-color: #4a4235;border: #4a4235">
                                    <i class="fa fa-plus"> Thêm thành viên</i></button>
                            </a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <tr style=" font-size:18px;">
                                    <th> Tên người dùng</th>
                                    <th>Tên tài khoản</th>
                                    <th>Thuộc</th>
                                    @if(isset($users->companys->name))
                                    <th>Quyền</th>
                                    @endif
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                <tr>
                                    <td>{{ $users->full_name }}</td>
                                    <td>{{ $users->username }}</td>
                                    @if(isset($users->companys->name))
                                    <td>{{ $users->companys->name }}</td>
                                    @endif
                                    <td>{{ $users->role->display_name }}</td>
                                    
                                 
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group mr-2" role="group">
                                                <a href="{{ route('getrole', [$users['id']]) }}">
                                                    <button style="float:right" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                                </a>
                                            </div>
                                            <div class="btn-group mr-2" role="group">
                                                <form method="post" action="{{ route('user.destroy', [$users['id']]) }}" enctype="multipart/form-data" name="form1" id="form1">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button style="float:right" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không')"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>
    </section><!-- /.content -->
</div>
@endsection
@section('js')


<!-- SlimScroll -->
<script type="text/javascript">
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