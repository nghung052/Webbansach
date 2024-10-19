@extends('layout_index.master')
@section('content')
<div class="container">
    <br>
      <h1><span>Thông Tin</span>
        </h1>
    <hr>
    <div class="btn-sec">
        <button class="btn " data-toggle="modal" data-target="#tab-info">Thông Tin</button>
        <button class="btn " data-toggle="modal" data-target="#tab-content">Đổi Mật Khẩu</button>
    </div>
    <br>
    <div class="row">
        <div class="accordion-group" style="font-size: 25px; width:97%; margin-left: 15px; ">
            <div class="accordion-heading country">
                <a class="accordion-toggle" data-toggle="collapse" href="#country1" style="text-decoration: blink;
                        background: #ff9700;
                        color: #fff;
                        border: 2px solid #ff9700;
                        border-radius: 1px; 
                        text-decoration: none;  
                        background: #fff; 
                        color: #ff9700;">
                    Đơn Hàng Của Bạn
                </a>
            </div>
            <div id="country1" class="accordion-body collapse">
                <div class="accordion-inner">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giá</th>
                                <th>Ngày đặt</th>
                                <th>Tình Trạng </th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill as $bills)
                            @foreach($bills->products as $product)
                            <tr>
                                <td><img style="width:120px;height:100px;" src="{{ asset('images/product/' . $product->image) }}"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->pivot->quantity}}</td>
                                <td>{{number_format($product->pivot->unit_price)}} VNĐ</td>
                                <td>{{$bills->created_at->format('d/m/y')}}</td>
                                <td> @if($bills->status == 0)
                                    <button type="button" class="btn btn-default">Đang xử lý</button>
                                    @elseif($bills->status == 1)
                                    <button type="button" class="btn btn-primary">Tiếp nhận</button>
                                    @elseif($bills->status == 2)
                                    <button type="button" class="btn btn-success">Đã giao</button>
                                    @elseif($bills->status == 3)
                                    <button type="button" class="btn btn-danger">Thất bại</button>
                                    @endif</td>
                                <td>{{number_format($product->pivot->unit_price * $product->pivot->quantity)}} VNĐ</td>
                            </tr>

                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="modal fade product_view" id="tab-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('changeinfo',Auth::user()->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label>Họ tên:</label>
                                    <input type="text" name="fullname" class="form-control" value="{{$customer->full_name}}" />
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại:</label>
                                    <input type="text" name="phone" class="form-control" data-inputmask="'mask': '999-999-9999'" value="{{$customer->phone}}" />
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ:</label>
                                    <input type="text" name="address" class="form-control" value="{{$customer->address}}" />
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" name="email" class="form-control" value="{{$customer->email}}" />
                                </div>
                                <div class="col-3">
                                    <button class="btn black">Cập nhật thông tin </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="modal fade product_view" id="tab-content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('updatePassword',Auth::user()->id)}}">
                                @csrf
                                <label>Mật Khẩu Cũ</label>
                                <div class="form-group pass_show">
                                    <input type="password" name="password" class="form-control" placeholder="Mật Khẩu Cũ">
                                </div>
                                <label>Mật Khẩu Mới</label>
                                <div class="form-group pass_show">
                                    <input type="password" name="new_password" class="form-control" placeholder="Mật Khẩu Mới">
                                </div>
                                <label>Nhập Lại Mật Khẩu</label>
                                <div class="form-group pass_show">
                                    <input type="password" name="re_password" class="form-control" placeholder="Nhập Lại Mật Khẩu">
                                </div>
                                <div class="col-3">
                                    <button class="btn black">Cập nhật thông tin </button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">
    $(":input").inputmask();
</script>
@stop
@section('show')
<script type="text/javascript">
    $(document).ready(function() {
        $('.pass_show').append('<span class="ptxt">hiện</span>');
    });

    $(document).on('click', '.pass_show .ptxt', function() {

        $(this).text($(this).text() == "ẩn" ? "hiện" : "ẩn");

        $(this).prev().attr('type', function(index, attr) {
            return attr == 'password' ? 'text' : 'password';
        });

    });
</script>
@stop