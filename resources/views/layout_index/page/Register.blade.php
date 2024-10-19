@extends('layout_index.master')
@section('content')
    <section class="static about-sec">
        <div class="container">
            <h1>Đăng Ký Tài Khoản </h1>         
            <div class="form">     
                <form action="{{url('signup')}}" method="post" class="form" id="myform">
                @csrf  
                @if(Session::has('flag'))
                    <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}} </div>
                @endif
                <div class="row  justify-content-md-center">             
                    <div class="col-6">
                        <input type="text" name="fullname" class="@error('fullname') isvalid @enderror" placeholder="Họ Tên . . . . . " >
                        <span class="required-star">*</span>
                        @error('fullname')
                        <div style="color:red; margin-top: -30px" >{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row  justify-content-md-center">
                    <div class="col-6">
                        <input type="email" name="username" class="@error('username') isvalid @enderror" placeholder="Email . . . . . " >
                        <span class="required-star">*</span>
                        @error('username')
                        <div style="color:red; margin-top: -30px" >{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row  justify-content-md-center">
                    <div class="col-6">
                        <input type="Password" name="password" class="@error('password') isvalid @enderror" placeholder="Password . . . . . " >
                        <span class="required-star">*</span>
                        @error('password')
                        <div style="color:red; margin-top: -30px" >{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row  justify-content-md-center">
                    <div class="col-6">

                        <input type="Password" name="re_password" class="@error('re_password') isvalid @enderror" placeholder="Xác nhận password . . . . . " >
                        <span class="required-star">*</span>
                        @error('re_password')
                        <div style="color:red; margin-top: -30px" >{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row  justify-content-md-center">
                    <div class="col-6">

                        <input type="text" name="address" class="@error('address') isvalid @enderror" placeholder="Địa chỉ . . . . ." >
                        <span class="required-star">*</span>
                        @error('address')
                        <div style="color:red; margin-top: -30px" >{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row  justify-content-md-center">
                    <div class="col-6">
                        <input type="text" name="phone" class="@error('phone') isvalid @enderror" placeholder="Điện thoại . . . . . " >
                        <span class="required-star">*</span>
                        @error('phone')
                        <div style="color:red; margin-top: -30px" >{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-3">
                        <button class="btn black">Đăng Ký </button>
                    </div>
                </div>
                </form>
                <div class="row  justify-content-md-center">
                    <div class="col-5">
                        <h5>Đã có tài khoản / <a href="{{route('login')}}">Đăng Nhập Tại Đây</a></h5>
                    </div>
                </div>           
            </div>
        </div>
    </section>
    @endsection