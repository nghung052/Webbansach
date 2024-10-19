@extends('layout_admin.master')

@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Thể loại</a></li>
            <li class="active"><a href="#">Banner</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">
            <form action="{{route('slide.update',[$slide['id']])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-header">
                </div>
                <div class="box-body">
                    <h4> Tiêu đề : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input id="namebook" required name="title" type="text" value="{{$slide->title}}" class="form-control" placeholder="Tiêu đề . . . . . . . . .">
                    </div>
                    <h4> Miêu tả </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
                        <input id="descriptionbook" name="description" type="text" value="{{$slide->title}}" class="form-control" placeholder="Miêu tả . . . . . . . . .">
                    </div>
                    <div class="form-group">
                        <h4 for="exampleInputFile">Ảnh slide</h4>
                        <input id="img" type="file" name="img" onchange="changeImg(this)">
                        <img id="avatar" class="thumbnail" width="100px" height="100px" src="{{ asset('images/slide/'.$slide->image) }}">
                    </div>
                    <br>
                    <div class="text-center">

                        <input type="submit" name="submit" value="Cập nhật" class="btn  btn-success btn-lg">
                    </div>
            </form>
        </div>
    </section><!-- /.content -->
</div>
@endsection
@section('js')
<script type="text/javascript">

    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $('#avatar').show();
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function() {
            $('#imgbook').click();
        });
    });
</script>
@stop