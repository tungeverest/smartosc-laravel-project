@extends('master')
@section('title','Home')
@section('content')
<div id="slide" class="col-md-12">
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @for ($i = 0; $i < $banner_count ; $i++)
      <li data-target="#myCarousel1" data-slide-to="{{ $i }}"
       @if ($i == 0)
         class="active"
      @endif
      ></li>
      @endfor
    </ol>
    <div class="carousel-inner" role="listbox">
      @foreach ($banner_list as $slide)
      <div class="item 
      @if ($slide->slide_position == $banner_min->slide_position)
      active
      @endif">
      <img class="img-slide" src="{{asset('storage/app/'.$slide->banner_name)}}" alt="Chania">
    </div>
    @endforeach
  </div>
</div>
</div>
<div class="col-sm-push-0 col-md-push-0 col-md-12">

  <h3 id="white-nav" >Sản phẩm mới</h3>
  @foreach ($product as $pro)
  <div class="col-xs-12 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
    <div>

      <p id="list">{{$pro->pro_name}}</p>
    </div>
    <div>
      <img id="list-home" width = "100%"
      height = "210px" src="{{asset('storage/app/'.$pro->pro_img)}}">
    </div>
    <div>
      <div class="rateit" data-rateit-readonly="true" data-rateit-value="{{$pro->avg}}" data-rateit-step="0.1"></div>
      <div>
          @if ($pro->price_sales > 0) 
          <span id="list"><s>
          {{number_format($pro->pro_price,0,',','.')}}</s></span>
          <span id="list">
            {{number_format($pro->price_sales,0,',','.')}} VND</span>
          @else
        <span id="list">
          {{number_format($pro->pro_price,0,',','.')}} VND</span>
          <span id="list">
            @endif

      </div>
      <div class="btn-group btn-group-justified">
        <a onclick="addCart({{$pro->id}})" class="btn btn-default">Thêm</a>
        <a href="{{asset('chi-tiet/'.$pro->id)}}.html" class="btn btn-default">Xem chi tiết</a>
      </div> 
    </div>
  </div>
  @endforeach
</div>
<div class="modal fade" id="wellcome" role="dialog">
  <div class="modal-dialog">
    <div class="modal-body">
      <img src="public/customer/img/welcome.jpg">
    </div>
  </div>
</div>
@if($first_time==true)
<script type="text/javascript">
  $("#wellcome").modal('show');
</script>
@endif
@stop