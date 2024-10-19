@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật tin tức
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
            <form action="{{route('thenews.update',[$the_news['id']])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="box-header">
                </div>
                <div class="box-body">
                    <h4> Tiêu đề </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil fa-lg"></i></span>
                        <input id="namebook" name="name" type="text" class="form-control" value="{{ $the_news->name }}" >
                    </div>


                    <h4> Nội dung </h4>
                    <div class='box-body pad'>
                        <form>
                            <textarea name="content" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 
                                    1px solid #dddddd; padding: 10px;">  {{ $the_news->content  }} </textarea>
                        </form>
                    </div>
 


                    <div class="form-group">
                        <h4 for="exampleInputFile">Ảnh đầu trang</h4>
                        <input id="imgbook" type="file" name="img" onchange="changeImg(this)">
                        <img id="avatar" class="img-rounded" width="200px" height="300px"  src="{{asset('images/news/'.$the_news->image)}}">
                    </div>

                    <div class="form-group">
                        <h4 for="exampleInputFile">Ảnh chi tiết</h4>
                        @foreach($the_news->imagedetail as $pro)
                        <img id="avatar" width="100px" height="100px" src="{{asset('images/news_detail/'.$pro)}}">
                        @endforeach
                        <input name="img_detail[]" type="file" id="exampleInputFile" multiple="multiple">
                      </div>
                    <br>
                    <div class="text-center">

                        <input style="border-color: #4a4235;background-color:#4a4235" type="submit" name="submit" value="Cập nhật" class="btn  btn-success btn-lg">

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
