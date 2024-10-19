<header>
    <a href="tel:1900 636 467">
        <div class="hotline">
            <span class="before-hotline">Hotline:</span>
            <span class="hotline-number">1900636467</span>
        </div>
    </a>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <span class="ph-number"><i class="fa fa-truck"></i> {{ __('free ship') }} </span>
                </div>
                <div class="col-md-5 ">
                    <span style="float: left;" class="ph-number"><i class="fa fa-phone"></i> {{ __('phone') }}: 1900636467</span>
                </div>
                <div class="col-md-4">
                    <div style="float: right; padding: 3%">
                        <a href="{!! route('user.language', ['en']) !!}">
                            <img src="{{ asset('images/icon/tienganh.png') }}" height="30px" width="30px">
                        </a>
                        <a href="{!! route('user.language', ['vi']) !!}">
                            <img src="{{ asset('images/icon/tiengviet.png') }}" height="30px" width="30px">
                        </a>
                    </div>&nbsp;
                    @if (Auth::check())
                    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                    <div class="dropdown" style="float: right;">
                        <button class="dropbtn"><i class="fa fa-user-circle"></i>&nbsp;{{ Auth::user()->full_name }} </button>
                        <div class="dropdown-content">
                            <a href="{{ route('admin') }}">{{ __('Information') }}</a>
                            <a href="{{ url('logout') }}">{{ __('logout') }}</a>
                        </div>
                    </div>
                    @else
                    <div class="dropdown"style="float: right;">
                        <div class="dropdown-content">
                            <a href="{{ route('info',Auth::user()->id) }}">{{ __('Information') }}</a>
                            <a href="{{ url('logout') }}">{{ __('logout') }}</a>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="dropdown" style="float: right">
                        <a href="{{ route('login') }}"><button class="dropbtn">{{ __('login') }}</button></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="main-menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="row w-100 align-items-center">
                    <!-- Logo Section -->
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <a class="navbar-brand" href="{{ route('index') }}">
                            <img style="height: 140px; width: auto;" src="images/logobook.png" alt="logo">
                        </a>
                    </div>

                    <!-- Address & Email Section -->
                    <div class="col-md-6 d-flex justify-content-start align-items-center" style="gap: 30px;">
                        <span class="ph-number d-flex align-items-center">
                            <i class="fa fa-location-arrow mr-2"></i> {{ __('Địa chỉ') }} Thành Phố Huế
                        </span>
                        <span class="ph-number d-flex align-items-center">
                            <i class="fa fa-envelope mr-2"></i> {{ __('Email') }} cskh@bookstore.com.vn
                        </span>
                    </div>

                    <!-- User Account Section -->
                    <div class="col-md-3 d-flex justify-content-end align-items-center">
                        <!-- User Account Dropdown -->
                        @if (Auth::check())
                            <div class="dropdown">
                                <button class="dropbtn d-flex align-items-center">
                                    <i class="fa fa-user-circle mr-2"></i> {{ Auth::user()->full_name }}
                                </button>
                                <div class="dropdown-content">
                                    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                                        <a href="{{ route('admin') }}">{{ __('Information') }}</a>
                                    @else
                                        <a href="{{ route('info', Auth::user()->id) }}">{{ __('Information') }}</a>
                                    @endif
                                    <a href="{{ url('logout') }}">{{ __('logout') }}</a>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}">
                                <button class="dropbtn">{{ __('login') }}</button>
                            </a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>



    <div class="main-menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div id="menu">
                        <ul class="navbar-nav ml-auto">
                            <li class="menu_item down"><a href="#"><i class="fa fa-bars"></i> {{ __('Danh Mục') }}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_block" style="width:75px">
                                        <ul>
                                            @for($i = 0; $i < count($product_n); $i++) <li><a href="{{ route('product_type', $types_id[$i]) }}">{{ $types_name[$i] }} ({{ $product_n[$i] }})</a>
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                </li>
                <li class="menu_item down"><a href="{{ route('index') }}">{{ __('Trang Chủ') }}</a> </li>
                <li class="menu_item down"><a href="{{ route('introduce') }}">{{ __('Giới Thiệu') }} </a></li>
                <li class="menu_item down"><a href="{{ route('news') }}">{{ __('Tin Tức') }}</a></li>
                <li class="menu_item down"><a href="{{ route('all_book') }}">{{ __('Tất Cả') }}</a>
                    <div class="sub_menu">
                        <div class="sub_menu_block" style="width:25px">
                            <ul>
                                <li><a href="{{ route('allnew') }}">{{ __("Sách mới") }}</a>
                                </li>
                                <li><a href="{{ route('allsale') }}">{{ __("Sách Khuyến Mãi") }}</a>
                                </li>
                                <li><a href="{{  route('allhighlights')  }}">{{ __("Sách Bán Chạy") }}</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </li>
                <li class="menu_item down"><a href="#"><i class="fa fa-bars"></i> {{ __('Nhà Xuất Bản') }}</a>
                    <div class="sub_menu">
                        <div class="sub_menu_block" style="width:50px">
                            <ul>
                                @foreach ($company as $com)
                                <li><a href="{{ route('product_company', $com->id) }}">{{ $com->name }}</a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </li>
                </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 5%">
            <div class="cart my-2 my-lg-0">
                <a href="{{ route('cart') }}">
                    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                <span class="quntity">
                    @if (Session::has('cart'))
                    {{ Session('cart')->totalQty }}@else 0
                    @endif
                </span>
            </div>
            <form class="form-inline my-2 my-lg-0" role="search" method="get" id="searchform" action="{{ route('search') }}">
                <input class="form-control mr-sm-2" type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." autocomplete="off" />
                <span class="fa fa-search"></span>
            </form>
        </div>
        </nav>
    </div>
    </div>
</header>