@extends('master')
@section('title','Home')
@section('content')

        <div class="col-sm-push-0 col-md-push-0 col-md-9">

            <h3 id="white-nav" >Product</h3>
            @foreach ($product as $pro)
            <div class="col-xs-12 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-4 text-center post">
                <div>
                    <img id="list-home" width = "100%"
                    height = "280px" src="{{asset('storage/app/'.$pro->pro_img)}}">
                </div>
                <div>
                    <p id="list">{{$pro->pro_name}}</p>
                    <span id="list">$ {{number_format($pro->pro_price,0,',','.')}}</span>
                    <p><a href="{{asset('chi-tiet/'.$pro->id)}}.html">Xem chi tiết</a></p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-sm-push-0 col-md-push-0 col-md-9 text-center">
            <div class="pagination ">{{$product->links()}}</div>
        </div>

@stop