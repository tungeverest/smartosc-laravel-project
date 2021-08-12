@extends('master')
@section('title','Home')
@section('content')
<div class="col-sm-push-0 col-md-push-0 col-md-12">
    <div class="col-sm-push-0 col-md-push-0 col-md-12" style="margin-bottom: 10px">
        <div><h3 id="white-nav">{{$cate_name->name}}</h3></div>
        <form class="form-inline">
            <div class="form-group">Hãng: <select name="brand">
                <option>All</option>
                @foreach($list_brand as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            Giá: <select name="range">
                <option value="all">All</option>
                <option value="1-5">Từ 1 đến 5 triệu</option>
                <option value="5-10">Từ 5 đến 10 triệu</option>
                <option value="10-15">Từ 10 đến 15 triệu</option>
                <option value="l15">Trên 15 triệu</option>
            </select>
            <button type="submit" class="btn-xs btn-info glyphicon">fill</button>
        </div>
        <button type="button" class="btn-xs btn-info glyphicon glyphicon-glass pull-right" data-toggle="modal" data-target="#myModal">Sort</button>
    </form>
</div>
@foreach ($product_info as $pro)
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
              <a onclick="addCart(3)" class="btn btn-default">Thêm</a>
              <a href="{{asset('chi-tiet/'.$pro->id)}}.html" class="btn btn-default">Xem chi tiết</a>
          </div> 
      </div>
  </div>
  @endforeach
  <div class="col-sm-push-0 col-md-push-0 col-md-12 text-center">
    <div class="pagination ">{{$product_info->links()}}</div>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="get">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Lọc</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Xắp xếp theo</label>
                        <select class="form-control" name="f">
                            <option value="pro_name">Product name</option>
                            <option value="pro_price">Product price</option>
                            <option value="created_at">Product date</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Xắp xếp</label>
                        <select class="form-control" name="so">
                            <option value="ASC">Tăng dần</option>
                            <option value="DESC">Giảm dần</option>
                        </select>
                        @if(Request::get('se'))
                        <input type="text" hidden="true" value="{{Request::get('se')}}" name="se">
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Sort</button>
                    <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@stop