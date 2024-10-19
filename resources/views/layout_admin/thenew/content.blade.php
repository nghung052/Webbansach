@extends('layout_admin.master')
@section('content')
<style>
 p{
     width: 80%;
    line-height: 1.6;
     font-size: 15px;
     font-family: Arial, Helvetica, sans-serif;
    text-align: justify;
}
</style>
    <div class="content-wrapper" style="min-height: 898px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Nội dung
                <small>Chi tiết nội dung của tin tức tin tức</small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Hệ thống</a></li>
                <li><a href="#">Tin tức</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>

                    <div class="col-md-4 pull-right">
                        <a href="{{ route('thenews.index') }}">
                            <button class="btn btn btn-warning"
                                style="float: right;;margin-bottom:5px;margin-left:2px;border:none; background-color:#4a4235;">
                                <i class="fa  fa-undo"> Quay lại </i></button>
                        </a>
                    </div>

                </div><!-- /.box-header -->
                <div class="box-body">                  
                            @foreach ($new_content as $new)                                 
                                   <p>  {!! $new->content !!} </p>
                            @endforeach           
            <!-- Modal -->  
    </div><!-- /.box -->
    </section><!-- /.content -->
    </div>

@endsection

