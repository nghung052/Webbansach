@extends('layout_index.master')
@section('content')
<section class="static about-sec">
    <div class="container">
        <h4>Sách được tìm thấy {{count($search)}} sản phẩm </h4>
        <hr>
        <div class="recent-book-sec">
            <div class="row" id="load" style="position: relative;">
                @foreach ($search as $pro)
                <div class="col-md-3">
                    <div class="single_product">
                        <div class="item">
                            @if($pro->promotion_price==0)
                            <div class="new">new</div>
                            @else
                            <span class="sale">sale</span>
                            @endif
                            @if($pro->store && $pro->store->stored_product == 0)
                                <div class="Out">Hết Hàng</div>
                                @endif
                            <a href="{{route('detail',$pro->id)}}"><img src="{{ asset('images/product/' . $pro->image) }}" alt="image" /></a>
                            <h3><a href="#">{{ $pro->name }}</a></h3>
                            @if($pro->promotion_price == 0)
                            <span class="price-new">{{number_format($pro->unit_price,0,"",",")}} VNĐ </span>
                            @else
                            <span class="price-old">{{number_format($pro->unit_price,0,"",",")}} VNĐ
                            </span>
                            <span class="price-new">{{number_format($pro->promotion_price,0,"",",")}} VNĐ
                            </span>
                            @endif
                            <br>
                            <h6><a href="javascript:"><i onclick="AddCart('{{$pro->id}}')" class="fa fa-cart-arrow-down"></i></a> /
                                <a class="beta-btn primary" href="{{url('detail',$pro->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                            </h6>
                            <div class="content">
                                <div class="body">
                                    &nbsp;<b style="color: #BA510A; font-size: 19px">{{$pro->name}}</b> <br>
                                    &nbsp;<i class="fa fa-user"></i> : <b class="font">{{$pro->publisher}}</b> <br>
                                    &nbsp;<i class="fa fa-book"></i> : <b class="font">{{$pro->productType->name}}</b> <br>
                                    &nbsp;<i class="fa fa-clone"></i> : <b class="font">{{$pro->pagenumber}} trang</b><br>
                                    &nbsp;<i class="fa fa-home"></i> : <b class="font">{{$pro->productCompany->name}}</b> <br>
                                    &nbsp;<a href="{{route('Read',$pro->id)}}"><button class="btnR">Đọc ONLINE</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                @endforeach
            </div>
            <div class="btn-sec">{{$search->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}</div>
        </div>
    </div>
</section>
@endsection