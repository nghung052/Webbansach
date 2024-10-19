@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý sách
            <small>Thêm, xóa và cập nhật sách</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Sách</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                @can('user')
                <div class="col-md-4 pull-right">
                    <a href="{{ route('book.create') }}">
                        <button class="btn btn btn-warning" style="float: right;;margin-bottom:5px;margin-left:2px;border:none; background-color:#4a4235;">
                            <i class="fa fa-plus"> Thêm sách mới </i></button>
                    </a>
                </div>
                @endcan
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>Tên sách</th>
                            <th>Loại sách</th>
                            <th>Tác giả</th>
                            <th width="10%">Giá (VNĐ)</th>
                            <th>Giá Khuyến Mãi (VNĐ)</th>
                            <th>Hình ảnh</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="width: 120px">Tùy chọn</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $pro)
                        <tr>
                            <td>{{ $pro->name }}</td>
                            <td>{{ $pro->productType->name }}</td>
                            <td>{{ $pro->publisher }}</td>
                            <td>{{number_format($pro->unit_price,0,"",",") }}</span></td>
                            <td>
                                @if ($pro->promotion_price == 0) 0
                                @else {{number_format($pro->promotion_price ,0,"",",") }} @endif
                            </td>

                            <td><img style="width:100px;height:100px;" src="{{ asset('images/product/' . $pro->image) }}"></td>
                            <td>{!! $pro->description !!}</td>
                            <td>{{ $pro->pagenumber }}</td>
                            <td>{{ $pro->size }}</td>
                            <td>{{ $pro->language }}</td>
                            <td>{{ $pro->productCompany->name }}</td>
                            <td id="off_on-{{$pro->id}}">
                                @can('user')
                                <form style="margin-right:5px;float: left;" method="post" action="{{ route('book.destroy', [$pro['id']]) }}" enctype="multipart/form-data" name="form1" id="form1">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn btn-flat" onclick="return confirm('Bạn có muốn xóa không')"> <i class="fa fa-trash-o"> </i> </button>
                                </form>
                                <!-- -->
                                <a href="{{ route('book.edit', [$pro['id']]) }}">
                                    <button type="button" class="btn btn-warning btn btn-flat"><i class="fa fa-edit">
                                        </i> </button>
                                </a>
                                @endcan
                                @can('admin')
                                @if ($pro->status == 1)
                                <button type="button" onclick="Off('{{$pro->id}}')" style="background-color:rgb(114, 109, 109);border:none;" class="btn btn-warning btn ">
                                    <i class="fa fa-pause"></i> </button>
                                @else
                                <button type="button" onclick="On('{{$pro->id}}')" style="background-color:rgb(0, 255, 0);border:none;" class="btn btn-warning btn ">
                                        <i class="fa fa-play"></i> </button>
                                @endif
                                @endcan
                                <button style="border-radius: 4px;" class='btn btn-flat btn-info btn1'><i class='fa fa-eye'></i></button>
                            </td>
                            <td></td>
                        </tr>
            </div>
        </div>
        @endforeach
        </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:auto">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel" style="color: red">Chi tiết sản phẩm</h3>
                    </div>
                    <div class="modal-body">
                        <div class="showProduct"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
</div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.content -->
</div>

@endsection

@section('js')
<!-- SlimScroll -->
<script type="text/javascript">
    var table = $('#example1').DataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "order": [],
        "bAutoWidth": true,
        "columnDefs": [{
            "targets": [6, 7, 8, 9, 10, 12],
            "visible": false
        }, {
            // adding a more info button at the end
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-info btn1' ><i class='fa fa-eye'></i></button>",
        }]
    });
    $('#example1 tbody').on('click', '.btn1', function() {
        var data = table.row($(this).parents('tr')).data(); // getting target row data
        $('.showProduct').html(
            // Adding and structuring the full data
            '<table class="table dtr-details" width="100%"><h4 class="text-center" style="color:blue">Thông tin sách</h4><tbody><tr><td style="width:100px">Tên sách<td><td>' + data[0] + '</td></tr><tr><td>Mô Tả<td><td style="text-align:justify">' + data[6] + '</td></tr><tr><td>Số trang<td><td>' + data[7] +
            '</td></tr><tr><td>Kích thước<td><td>' + data[8] + '</td></tr><tr><td>Ngôn ngữ<td><td>' + data[9] + '</td></tr><tr><td>Nhà xuất bản<td><td>' + data[10] + '</td></tr></tbody></table>'

        );
        $('#myModal').modal('show'); // calling the bootstrap modal
    });
</script>
<script>
    function Off(id) {
        $.ajax({
            url: 'product_off/' + id,
            type: 'GET',
            success: function(response) {
                let book = JSON.parse(response)['off'];
                $('#off_on-' +book['id']).html('<button type="button" onclick="On('+book['id']+')" style="background-color:rgb(0, 255, 0);border:none;" class="btn btn-warning btn "><i class="fa fa-play"></i> </button>'+
                                                ' <button style="border-radius: 4px;" class="btn btn-flat btn-info btn1"><i class="fa fa-eye"></i></button>');
            }
        })
    }
</script>
<script>
    function On(id) {
        $.ajax({
            url: 'product_on/' + id,
            type: 'GET',
            success: function(response) {
                let book = JSON.parse(response)['on'];
                $('#off_on-'+book['id']).html('<button type="button" onclick="Off('+book['id']+')" style="background-color:rgb(114, 109, 109);border:none;" class="btn btn-warning btn "><i class="fa fa-pause"></i> </button>'+
                                            ' <button style="border-radius: 4px;" class="btn btn-flat btn-info btn1"><i class="fa fa-eye"></i></button>');

            }
        })
    }
</script>
@stop