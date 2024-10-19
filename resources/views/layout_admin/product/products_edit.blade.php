@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cập nhật sách
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
      <li><a href="#">Sách</a></li>
      <li class="active">Cập nhật</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box box-info">
      <form action="{{route('book.update',[$product['id']])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="box-header">
        </div>
        <div class="box-body">

          <h4> Tên sách : </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
            <input required name="name" type="text" class="form-control" value="{{$product->name}}" placeholder="Tên sách . . . . . . . . .">
          </div>
          <h4>Loại sách</h4>

          <div class="input-group input-group">
            <div class="input-group-btn">
              <select required name="cate" class="form-control">
                @foreach($type as $ty)
                @if($ty->id == $product->id_type)
                <option selected value="{{$ty->id}}">{{$ty->name}}</option>
                @else
                <option value="{{$ty->id}}">{{$ty->name}}</option>
                @endif
                @endforeach
              </select>
            </div><!-- /btn-group -->
          </div><!-- /input-group -->

          <h4> Tác giả </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-smile-o"></i></span>
            <input name="publisher" type="text" value="{{$product->publisher}}" class="form-control" placeholder="Tác giả. . . . . . . . .">
          </div>
          <h4> Giá : </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input required name="unit_price" type="number" value="{{$product->unit_price}}" class="form-control" placeholder="Giá . . . . . . . . .">
            <span class="input-group-addon">VNĐ</span>
          </div>
          <h4> Giá khuyến mãi : </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input name="promotion_price" type="number" value="{{$product->promotion_price}}" class="form-control" placeholder="Khuyến mãi . . . . . . . . .">
            <span class="input-group-addon">VNĐ</span>
          </div>

          <h4> Miêu tả </h4>
          <div class='box-body pad'>
            <form>
              <textarea name="description" class="textarea" placeholder="Miêu tả . . . . ." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->description}}</textarea>
            </form>
          </div>
          <h4> Định dạng: </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input id="Format" name="Format" value="{{$product->format}}" type="text" class="form-control" placeholder="Khuyến mãi . . . . . . . . .">

          </div>

          <h4> Ngôn ngữ </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input id="Language" name="Language" value="{{$product->language}}" type="text" class="form-control" placeholder="Khuyến mãi . . . . . . . . .">

          </div>

          <h4> Số trang :</h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input id="Page_Number" name="PageNumber" value="{{$product->pagenumber}}" type="text" class="form-control" placeholder="Khuyến mãi . . . . . . . . .">
            <span class="input-group-addon">Trang</span>
          </div>

          <h4> Kích thước :</h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input id="size" name="size" value="{{$product->size}}" type="text" class="form-control" placeholder="Khuyến mãi . . . . . . . . .">
            <span class="input-group-addon">Cm</span>
          </div>


          <div class="form-group">
            <label for="exampleInputFile">Ảnh đại diện</label>
            <input name="img" type="file" id="exampleInputFile" onchange="changeImg(this)">
            <img id="avatar" class="thumbnail" width="100px" height="100px" src="{{asset('images/product/'.$product->image)}}">
          </div>

          <div class="form-group">
            <h4 for="exampleInputFile">Ảnh chi tiết</h4>
            @foreach($product->imagedetail as $pro)
            <img id="avatar" width="100px" height="100px" src="{{asset('images/product_detail/'.$pro)}}">
            @endforeach
            <input name="img_detail[]" type="file" id="exampleInputFile" multiple="multiple">
          </div>
          <div class="form-group">
            <h4 for="exampleInputFile">Link sách</h4>
            <input id="pdf" type="file" name="pdf">
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
