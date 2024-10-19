@extends('layout_admin.master')
@section('content')
<style>
.a p{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 200px;
}
.a image{
    
    visibility: hidden;
}
</style>
    <div class="content-wrapper" style="min-height: 898px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý tin tức
                <small>Thêm, xóa và cập tin tức</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Hệ thống</a></li>
                <li><a href="#">Tin tức</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>

                    <div class="col-md-4 pull-right">
                        <a href="{{ route('thenews.create') }}">
                            <button class="btn btn btn-warning"
                                style="float: right;;margin-bottom:5px;margin-left:2px;border:none; background-color:#4a4235;">
                                <i class="fa fa-plus"> Thêm tin tức </i></button>
                        </a>
                    </div>

                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Ảnh</th>
                                <th>Trạng thái</th>

                                <th style="width: 150px">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($the_news as $new)
                                <tr>
                                    <td>{{ $new->name }}</td>
                                    <td><img style="width:100px;height:100px;"
                                            src="{{ asset('images/news/' . $new->image) }}"></td>
                                   
                                    <!-- for ($i=0; $i< count($new->imagedetail); $i++)
                                    <td>  
                                        <img style="width:100px;height:100px;"
                                            src=" asset('images/news_detail/' . $new->imagedetail[$i]) }}">
                                    </td>
                                    endfor -->
                                    <td>
                                        @if ($new->status == 1)
                                        <a href="{{ route('news_off', [$new['id']]) }}">
                                            <button type="button" style="background-color:rgb(69, 204, 69);border:none;" class="btn btn-warning btn ">
                                                <i class="fa fa-pause">&nbsp;Đang chạy </i> </button>
                                        </a>
                                        @else
                                        <a href="{{ route('news_on', [$new['id']]) }}">

                                                <button type="button"  style="background-color:rgb(189, 189, 189);border:none;" class="btn btn-warning btn ">
                                                    <i class="fa fa-play">&nbsp;Chưa Phê duyệt</i> </button>
                                        </a>
                                        @endif

                                    </td>
                                    <td>

                                        <form style="margin-right:5px;float: left;" method="post" action="{{ route('thenews.destroy', [$new['id']]) }}" enctype="multipart/form-data" name="form1" id="form1">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn btn-flat"
                                                onclick="return confirm('Bạn có muốn xóa không')"> <i class="fa fa-trash-o">
                                                </i> </button>
                                        </form>
                                        <!-- -->
                                        <a href="{{ route('thenews.edit', [$new['id']]) }}">
                                            <button type="button" class="btn btn-warning btn btn-flat"><i
                                                    class="fa fa-edit">
                                                </i> </button>
                                        </a>
                                        <a href="{{  route('newcontent', [$new['id']])  }}">
                                            <button style="margin-left:1px;" type="button" class="btn btn-primary btn btn-flat "><i
                                                    class="fa fa-eye">
                                                </i> </button>
                                        </a>
                                    </td>
                                </tr>
                </div>
            </div>
            @endforeach
            </tbody>
            </table>
            <!-- Modal -->

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
            "bAutoWidth": true,

        });

    </script>

    


@stop
