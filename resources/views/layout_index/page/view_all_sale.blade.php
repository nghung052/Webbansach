@extends('layout_index.master')
@section('content')
<section class="deltai">
    <div class="container">
        <div class="sidebar-widget tag">
            <form action="" id="sort_by" name="sort_by">
                @csrf
                <h2 class="title">Lựa chọn :</h2>
                <a class="{{Request::get('sort_by') == 'giam_dan' ? 'active' : ''}}" href="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</a>
                <a class="{{Request::get('sort_by') == 'tang_dan' ? 'active' : ''}}" href="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</a>
                <a class="{{Request::get('sort_by') == 'duoi_70' ? 'active' : ''}}" href="{{Request::url()}}?sort_by=duoi_70">Dưới 70,000 VNĐ</a>
                <a class="{{Request::get('sort_by') == '70-100' ? 'active' : ''}}" href="{{Request::url()}}?sort_by=70-100">Từ 70,000 - 100,000 VNĐ</a>
                <a class="{{Request::get('sort_by') == 'tren_100' ? 'active' : ''}}" href="{{Request::url()}}?sort_by=tren_100">Trên 100,000 VNĐ</a>
            </form>
        </div>
    </div>
</section>

<section class="static about-sec">
    <div class="container">
        <h2><span>Sách Khuyến Mãi</span>
        </h2>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm..." aria-label="Search">
            <span class="fa fa-search"></span>
        </form>
        <hr>
        <div id="myTable">
            <div class="recent-book-sec">
                <div class="row" id="load" style="position: relative;">
                    @foreach ($product_sale as $books)
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_product">
                                @if ($books->promotion_price != 0)
                                <span class="sale">sale</span>
                                @endif
                                @if($books->store && $books->store->stored_product == 0)
                                <div class="Out">Hết Hàng</div>
                                @endif
                                <a href="{{ route('detail', $books->id) }}">
                                    <img src="{{ asset('images/product/' . $books->image) }}" alt="image" />
                                </a>
                                <h3><a href="#">{{ $books->name }}</a></h3>
                                @if($books->promotion_price == 0)
                                <span class="price-new">{{number_format($books->unit_price,0,"",",")}} VNĐ </span>
                                @else
                                <span class="price-old">{{number_format($books->unit_price,0,"",",")}} VNĐ
                                </span>
                                <span class="price-new">{{number_format($books->promotion_price,0,"",",")}} VNĐ
                                </span>
                                @endif
                                <br>
                                <h6><a href="javascript:"><i onclick="AddCart('{{$books->id}}')" class="fa fa-cart-arrow-down"></i></a> /
                                    <a class="beta-btn primary" href="{{url('detail',$books->id)}}">{{ __('detail') }}<i class="fa fa-chevron-right"></i></a>
                                </h6>
                                <div class="content">
                                    <div class="body">
                                        &nbsp;<b style="color: #BA510A; font-size: 19px">{{$books->name}}</b> <br>
                                        &nbsp;<i class="fa fa-user"></i> : <b class="font">{{$books->publisher}}</b> <br>
                                        &nbsp;<i class="fa fa-book"></i> : <b class="font">{{$books->productType->name}}</b> <br>
                                        &nbsp;<i class="fa fa-clone"></i> : <b class="font">{{$books->pagenumber}} trang</b><br>
                                        &nbsp;<i class="fa fa-home"></i> : <b class="font">{{$books->productCompany->name}}</b> <br>
                                        &nbsp;<a href="{{route('Read',$books->id)}}"><button class="btnR">Đọc ONLINE</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    @endforeach
                </div>
                <div class="btn-sec">{{$product_sale->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}</div>
            </div>
        </div>
    </div>

</section>
<a href="#" class="bck"></a>
@endsection