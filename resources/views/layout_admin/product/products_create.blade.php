@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm sách
            <small>Thêm, xóa, cập nhập sản phẩm.</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li><a href="#">Sách</a></li>
            <li class="active">Thêm sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-info">
            <form action="{{ url('book') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-header">
                </div>
                <div class="box-body">
                    <h4> Tên sách : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil fa-lg"></i></span>
                        <input id="namebook" name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Tên sách . . . . . . . . .">
                    </div>
                    @error('name')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Loại sách </h4>
                    <div class="input-group input-group">
                        <div class="input-group-btn">
                            <select style=" font-weight:bold;" name="cate" class="form-control">
                                <option style=" font-weight:bold;" value="-1"> --Chọn thể loại sách-- </option>
                                @foreach ($product as $pro)
                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- /btn-group -->
                    </div><!-- /input-group -->

                    <h4> Tác giả : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-smile-o fa-lg"></i></span>
                        <input value="{{ old('publisher') }}" id="publisherbook" name="publisher" type="text" class="form-control" placeholder="Tác giả. . . . . . . . .">
                    </div>
                    @error('publisher')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror

                    <h4> Giá : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money fa-lg"></i></span>
                        <input value="{{ old('unit_price') }}" min="0" max="99999999" id="unit_pricebook" name="unit_price" type="number" class="form-control" placeholder="Giá  . . . . . . . . .">
                        <span class="input-group-addon">VNĐ</span>
                    </div>
                    @error('unit_price')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror


                    <h4> Giá khuyến mãi : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-money fa-lg"></i></span>
                        <input id="promotion_pricebook" min="0" max="99999999" name="promotion_price" type="number" class="form-control" placeholder="Khuyến mãi . . . . . . . . .">
                        <span class="input-group-addon">VNĐ</span>
                    </div>


                    <h4> Miêu tả </h4>
                    <div class='box-body pad'>
                        <form>
                            <textarea name="description" class="textarea" placeholder="Miêu tả . . . . ." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 
                                    1px solid #dddddd; padding: 10px;"></textarea>
                        </form>
                    </div>
                    @error('description')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror

                    <h4> Định dạng: </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-bold fa-lg"></i></span>
                        <input {{ old('Format') }} id="Format" name="Format" type="text" class="form-control" placeholder="Định dạng là chữ hoặc hình  . . . . . . . . .">

                    </div>
                    <h4> Ngôn ngữ </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-language fa-lg "></i></span>
                        <input {{ old('Language') }} id="Language" name="Language" type="text" class="form-control" placeholder="Ngôn ngữ . . . . . . . . .">
                    </div>

                    <h4> Số trang :</h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-text fa-lg"></i></span>
                        <input id="Page_Number" class="form-control" name="PageNumber" type="number" min="1" placeholder="Nhập số trang. . . . . . . . ." />
                        <span class="input-group-addon">Trang</span>
                    </div>
                    <h4> Kích thước :</h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrows-alt fa-lg"></i></span>
                        <input class="form-control" name="size" id="size" type="text" data-inputmask="'mask': '99 x 99'" placeholder="Nhập kích thước. . . . . . . . ." />
                        <span class="input-group-addon">Cm</span>
                    </div>

                    <h4> Sản phẩm nổi bật </h4>
                    <div class="form-group">
                        Có: <input type="radio" checked name="featured" value="1">
                        Không: <input type="radio" name="featured" value="0">
                    </div>
                    <div class="form-group">
                        <h4 for="exampleInputFile">Ảnh sản phẩm</h4>
                        <input id="imgbook" type="file" name="img" onchange="changeImg(this)">
                        <img id="avatar" class="img-rounded" width="200px" height="300px">
                    </div>
                    @error('img')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <div class="form-group">
                        <h4 for="exampleInputFile">Ảnh chi tiết</h4>
                        <input name="img_detail[]" id="exampleInputFile" type='file' multiple />
                        <div id="myImg">
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 for="exampleInputFile">Link sách</h4>
                        <input id="pdf" type="file" name="pdf">
                    </div>
                    <br>
                    <div class="text-center">

                        <input style="border:none; background-color:#4a4235;" onclick="AddProduct()" type="submit" name="submit" value="Thêm" class="btn  btn-warning btnthem btn-lg">

                    </div>
            </form>
        </div>
    </section><!-- /.content -->
</div>

@endsection
@section('js')
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