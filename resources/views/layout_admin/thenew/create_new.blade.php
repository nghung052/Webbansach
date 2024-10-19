@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm tin tức
            <small>Thêm, xóa, cập nhập tin tức.</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li><a href="#">Tin tức</a></li>
            
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">
            <form action="{{ url('thenews') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-header">
                </div>
                <div class="box-body">
                    <h4> Tiêu đề </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil fa-lg"></i></span>
                        <input id="namebook" name="name" type="text" class="form-control" >
                    </div>


                    <h4> Nội dung </h4>
                    <div class='box-body pad'>
                        <form>
                            <textarea name="content" class="textarea" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 
                                    1px solid #dddddd; padding: 10px;"></textarea>
                        </form>
                    </div>
 


                    <div class="form-group">
                        <h4 for="exampleInputFile">Ảnh tin tức </h4>
                        <input id="imgbook" type="file" name="img" onchange="changeImg(this)">
                        <img id="avatar" class="img-rounded" width="200px" height="300px">
                    </div>


                    <br>
                    <div class="text-center">

                        <input style="border:none; background-color:#4a4235;" type="submit" name="submit" value="Thêm" class="btn  btn-warning btnthem btn-lg">

                    </div>





            </form>
        </div>
    </section><!-- /.content -->
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
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

<script type="text/javascript">
    $("#exampleInputFile").change(function() {
        if (this.files && this.files[0]) {
            for (var i = 0; i < this.files.length; i++) {
                var reader_detail = new FileReader();
                reader_detail.onload = imageIsLoaded;
                reader_detail.readAsDataURL(this.files[i]);
            }
        }
    });

    function imageIsLoaded(e) {
        var output = '&nbsp; <img  width="200px" height="300px" src=' + e.target.result + '>';
        $("#myImg ").append(output);
    };
</script>
<script>
    $(".btnthem ").on("change", function() {
        if ($("#exampleInputFile")[0].files.length > 3) {
            alert("Không chọn quá 3 hình");
        } else {
            $("#imageUploadForm").submit();
        }
    });
</script>

<script>
    $(".btnthem ").on("change", function() {
        if ($("#exampleInputFile")[0].files.length > 3) {
            alert("Không chọn quá 3 hình");
        } else {
            $("#imageUploadForm").submit();
        }
    });
</script>

<script type="text/javascript">
    $("#size").inputmask();
    $("#Page_Number").inputmask();
</script>
@stop