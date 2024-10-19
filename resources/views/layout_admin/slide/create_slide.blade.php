@extends('layout_admin.master')

@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm sách
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li class="active"><a href="#">Banner</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">
            <form action="{{url('slide')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-header">
                </div>
                <div class="box-body">
                    <h4> Tiêu đề : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input id="namebook"  name="title" type="text" class="form-control" >
                    </div>
                    <h4> Miêu tả </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
                        <input id="descriptionbook" name="description" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <h4 for="exampleInputFile">Ảnh slide</h4>
                        <input id="img" type="file" name="img" onchange="changeImg(this)" required="">
                        <img id="avatar" class="thumbnail" width="900px" height="400px" src="new.jpg" >
                    </div>
                    <br>
                    <div class="text-center">

                        <input style="background-color: #4a4235;border-color: #4a4235;"type="submit" name="submit" value="Thêm bìa" class="btn  btn-success btn-lg">
                    </div>
            </form>
        </div>
    </section><!-- /.content -->
</div>
@endsection
@section('js')
<script type="text/javascript">
    $('#avatar').hide();

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