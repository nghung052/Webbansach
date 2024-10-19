@extends('layout_index.master')
@section('content')
<style type="text/css">
    /* ----------------------------------------------Generalise------------------------------------- */

    #header,
    #topbar,
    #breadcrumb,
    #container,
    .gallery,
    #footer,
    #copyright {
        display: block;
        position: relative;
        width: 960px;
        margin: 0 auto;
    }

    /* ----------------------------------------------Content------------------------------------- */

    #container {
        padding: 30px 0;
    }

    #content {
        display: block;
        float: left;
        width: 630px;
    }

    /* Homepage */

    #featured_post {
        margin-bottom: 45px;
    }

    #featured_post img {
        display: block;
        width: 620px;
        height: 270px;
        margin: 0;
        padding: 4px;
        border: 1px solid #BFE009;
    }

    #hpage_latest {
        display: block;
        width: 100%;
    }

    #hpage_latest ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: inline;
    }

    #hpage_latest li {
        display: block;
        float: left;
        width: 200px;
        margin: 0 10px 0 0;
        padding: 0;
    }

    #hpage_latest li.last {
        margin-right: 0;
    }

    #hpage_latest img {
        margin: 0;
        padding: 4px;
        border: 1px solid #BFE009;
    }

    #hpage_latest .readmore {
        text-align: right;
    }

    /* Comments */

    /* ----------------------------------------------Column------------------------------------- */

    #column {
        display: block;
        float: right;
        width: 300px;
    }

    #column .holder {
        display: block;
        width: 260px;
        margin-bottom: 20px;
        padding-left: 10px;
    }

    #column .holder,
    #column #featured {
        display: block;
        width: 300px;
        margin-bottom: 20px;
    }

    #column .holder p {
        line-height: 1.6em;
    }

    #column h2 {
        font-size: 20px;
    }

    #column .holder h2.title {
        display: block;
        width: 100%;
        height: 65px;
        margin: 0;
        padding: 15px 0 0 0;
        font-size: 20px;
        line-height: normal;
        border-bottom: 1px dashed #666666;
    }

    #column .holder h2.title img {
        float: left;
        margin: -15px 8px 0 0;
        padding: 5px;
        border: 1px solid #666666;
    }

    #column .holder p.readmore {
        display: block;
        width: 100%;
        font-weight: bold;
        text-align: right;
        line-height: normal;
    }

    #column div.imgholder {
        display: block;
        width: 290px;
        margin: 0 0 10px 0;
        padding: 4px;
        border: 1px solid #666666;
    }


    .ten {
        white-space: nowrap;
        width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        
    }
 

</style>
    <div class="container">
        @foreach ($content_detail as $con)
            <h1>{{$con->name}}</h1>
            <p style="font-size:12px;text-align: justify;"> {!! $con->content !!} </p>
        @endforeach
        <br>
        <div id="hpage_latest">
            @foreach ($content as $con)
                <ul>
                    <li >
                        <img style="width:240px;height:190px;" src="{{ asset('images/news/' . $con->image) }}">
                        <p class="ten" ><b>{{ $con->name }}</b></p>
                        <a href="{{ route('newsdetail', [$con['id']]) }}">
                            <p class="readmore">Xem thêm &raquo;</p>
                        </a>
    
                    </li>
                </ul>
            @endforeach
            <br class="clear" />
        </div>
    </div>

@endsection
