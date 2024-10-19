<style>
    .wordart {
        font-family: Arial, sans-serif;
        font-size: 32px;
        font-weight: bold;
        position: relative;
        z-index: 1;
        display: inline-block;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .wordart.horizon .text {
        font-family: Arial, sans-serif;
        font-weight: bold;
        font-style: oblique;
        background: #7286a7;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
        background: -moz-linear-gradient(top, #e8ecf3 0%, #e8ecf3 13%, #ffffff 50%, #cdd82e 56%, #ffffff 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #7286a7), color-stop(13%, #7286a7), color-stop(50%, #ffffff), color-stop(56%, #812f30), color-stop(100%, #ffffff));
        background: -webkit-linear-gradient(top, #e8ecf3 0%, #e8ecf3 13%, #ffffff 50%, #cdd82e 56%, #ffffff 100%);
        background: -o-linear-gradient(top, #e8ecf3 0%, #e8ecf3 13%, #ffffff 50%, #cdd82e 56%, #ffffff 100%);
        background: -ms-linear-gradient(top, #e8ecf3 0%, #e8ecf3 13%, #ffffff 50%, #cdd82e 56%, #ffffff 100%);
        background: linear-gradient(to bottom, #e8ecf3 0%, #e8ecf3 13%, #ffffff 50%, #cdd82e 56%, #ffffff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7286a7', endColorstr='#ffffff', GradientType=0);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .wordart.horizon .text:before {
        content: attr(data-text);
        position: absolute;
        z-index: -1;
        text-shadow: 0.01em 0em 0 #161616, 0em 0.01em 0 #8d8d8d, 0.02em 0.01em 0 #161616, 0.01em 0.02em 0 #8d8d8d, 0.03em 0.02em 0 #161616, 0.02em 0.03em 0 #8d8d8d, 0.04em 0.03em 0 #161616, 0.03em 0.04em 0 #8d8d8d, 0.05em 0.04em 0 #161616, 0.04em 0.05em 0 #8d8d8d, 0.06em 0.05em 0 #161616, 0.05em 0.06em 0 #8d8d8d, 0.07em 0.06em 0 #161616, 0.06em 0.07em 0 #8d8d8d, 0.08em 0.07em 0 #161616, 0.07em 0.08em 0 #8d8d8d, 0.09em 0.08em 0 #161616, 0.08em 0.09em 0 #8d8d8d, 0.1em 0.09em 0 #161616, 0.09em 0.1em 0 #8d8d8d;
    }
</style>


<header class="main-header  ">
    <!-- Logo -->
    <a href="{{ url('index') }}" class="logo"><b><img src="{{ asset('images/logobook.png') }}" class="user-image" alt="User Image" height="48px" width="200px" /></b></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div class="wordart horizon">
            <span class="text">{{ __('book') }}</span>
        </div>
        <a href="" class="sidebar-toggle " data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <img style="background-color: #ffffff" src="{{ asset('images/icon/adminicon.png') }}" class="user-image" alt="User Image" />
                        <span class="hidden-xs">{{ Auth::user()->full_name }}</span>
                    </a>
                    <ul class="dropdown-menu" style="padding-top: 7px;">
                        <!-- User image -->
                        <li style="background-color: #8b7b61" class="user-header">
                            <img style="background-color: #ffffff" src="{{ asset('images/icon/admin.png')  }}" class="img-circle" alt="User Image" />
                            <p style="color: #ffffff">
                                {{ Auth::user()->full_name }} ({{ Auth::user()->role->display_name }})
                                <small>{{ Auth::user()->email }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="text-center">
                                <a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn-danger btn-flat">Đổi
                                    mật khẩu</a>
                            </div>

                        </li>
                    </ul>

                <li class="dropdown">
                    <a href="{!! route('user.language', ['vi']) !!}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-language fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu" style="margin-top:7px;min-width:55px;
                     min-height:50px;margin-right:-10px;background-color:#ffffff;line-height:35px;">
                        <li>
                            <a href="{!! route('user.language', ['en']) !!}">
                                <img src="{{ asset('images/icon/tienganh.png') }}" height="16px" width="25px">
                            </a>
                        </li>
                        <li>
                            <a href="{!! route('user.language', ['vi']) !!}">
                                <img src="{{ asset('images/icon/tiengviet.png') }}" height="16px" width="25px">
                            </a>
                        </li>
                    </ul>
                </li>

                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img style="background-color: #ffffff" src="{{ asset('images/icon/admin1.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->full_name }}</p>

                <a href=""><i class="fa fa-circle text-warning"></i> {{ Auth::user()->role->display_name }} </a>
            </div>
        </div>
        <!-- search form -->

        <?php

        use App\Models\Company;
        use App\Services\GetSession;
        use Illuminate\Support\Facades\Session;

        $companies = Company::all();
        $company_id =  GetSession::getCompanyId();
        $sessionCompany = Session::get('select_companyid');
        ?>     
        @can('admin')
        <form action="{{ route('slidebar_companyid') }}" method="post" class="sidebar-form" style="border: none;">
            @csrf
            <div class="input-group">
                <select class="form-control" name="select_companyid" id="select_companyid">
                    <option value="" selected>Tất cả nhà xuất bản</option>
                    @foreach($companies as $cp)
                    <option value="{{$cp->id}}" {{$sessionCompany == $cp->id ? 'selected' : ''}}>{{$cp->name}}</option>
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button style="border: none; margin-left:2px" type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        @endcan
        <!-- Thống kê -->
        <ul class="sidebar-menu">
            @if($company_id != '' && $company_id != '0')
            <!-- Thống kê -->
            <li class="treeview">
                <a href="{{ url('admin') }}">
                    <i style="color:#8b7b61" class="fa fa-pie-chart fa-lg text-warning"></i>
                    <span style="font-size:16px ;">{{ __('dashboard') }}</span>
                </a>
            </li>
            @endif
            <li class="header ">
                <span style="font-size:20px ;color:rgb(238, 238, 238)"> QUẢN LÝ SÁCH</span>
            </li>
            @can('admin')
            <!-- CRUD  nhà cung cấp -->
            <li class=" treeview">
                <a href="{{ route('companies.index') }}">
                    <i style="color:#8b7b61" class="fa fa-briefcase fa-lg text-warning"></i>
                    <span style="font-size:16px ;">{{ __('companies') }}</span>
                </a>
            </li>
            @endcan
            <!-- CRUD  sách -->
            @if($company_id != '' && $company_id != '0')
            <li class=" treeview">
                <a href="{{ route('book.index') }}">
                    <i style="color:#8b7b61" class="fa fa-book fa-lg text-warning"></i>
                    <span style="font-size:16px ;"> {{ __('listbook') }}</span>
                </a>

            </li>
            @can('admin')
            <!-- CRUD thể loại sách -->
            <li class="treeview">
                <a href="{{ route('book_type.index') }}">
                    <i style="color:#8b7b61" class="fa fa-edit  fa-lg text-warning"></i>
                    <span style="font-size:16px ;"> {{ __('listtype') }}</span>
                </a>
            </li>
            @endcan
            <li class="header ">
                <span style="font-size:20px ;color:rgb(238, 238, 238)"> QUẢN LÝ BÁN HÀNG </span>
            </li>
            <!-- Đơn hàng -->
            <li class="treeview">
                <a href="{{ route('bill.index') }}">
                    <i style="color:#8b7b61" class="fa fa-inbox fa-lg text-warning"></i>
                    <span style="font-size:16px ;">{{ __('bills') }}</span>
                </a>
            </li>
            <!-- Quản lý kho hàng -->
            <li class="treeview">
                <a>
                    <i style="color:#8b7b61" class="fa fa-archive  fa-lg text-warning"></i>
                    <span style="font-size:16px ;"> {{ __('store') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li> <a href="{{ route('store.index') }}"><i class="fa fa-list-alt"></i> {{ __('store') }} </a></li>
                </ul>
            </li>
            @can('admin')
            <li class="header ">
                <span style="font-size:20px ;color:rgb(238, 238, 238)"> THIẾT LẬP</span>
            </li>
            <!-- Quản lý slide -->
            <li class="treeview">
                <a href="{{ route('slide.index') }}">
                    <i style="color:#8b7b61" class="fa fa-list-alt  fa-lg text-warning"></i>
                    <span>{{ __('Banner') }}</span>
                </a>


            <li class="treeview">
                <a href="{{ route('thenews.index') }}">
                    <i style="color:#8b7b61" class="fa fa-thumbs-o-up  fa-lg text-warning"></i>
                    <span>{{ __('News') }}</span>
                </a>
            @endcan
            @endif
            <li class="header ">
                <span style="font-size:20px ;color:rgb(238, 238, 238)"> PHÂN QUYỀN </span>
            </li>
            @can('admin')
            <li class="treeview">
                <a href="{{ route('user.index') }}">
                    <i style="color:#8b7b61" class="fa fa-desktop  fa-lg"></i>
                    <span style="font-size:16px ;"> {{ __('acc') }}</span>

                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('member.index') }}">
                    <i style="color:#8b7b61" class="fa fa-user  fa-lg"></i>
                    <span style="font-size:16px ;"> {{ __('user') }}</span>

                </a>
            </li>
            @endcan
            <li class="treeview">
                <a href="{{ url('logout') }}">
                    <i style="color:#8b7b61" class="fa fa-sign-out  fa-lg text-warning"></i>
                    <span style="font-size:16px ;">{{ __('exit') }}</span>

                </a>
            </li>
        </ul>
    </section>

</aside>