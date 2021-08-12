@extends('master')
@section('title','Chi tiết sản phẩm')
@section('content')
<div class="col-sm-push-0 col-md-push-0 col-md-12">

    <h3 class="text-left">{{$product->pro_name}}</h3>
    <div id="product-img" class="col-xs-12 col-sm-12 col-md-7 text-center">
        {{-- <img id="list-home" width="100%" height="410px" src="{{asset('storage/app/'.$product->pro_img)}}"> --}}
        <section class="section-white">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                @for ($i = 0; $i <= $img_count ; $i++)
                <li data-target="#myCarousel1" data-slide-to="{{ $i }}"
                @if ($i == 0)
                class="active"
                @endif
                ></li>
                @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active ">
                    <img id="list-home" width="100%" height="410px" src="{{asset('storage/app/'.$product->pro_img)}}">
               </div>
                @foreach ($list_img as $slide)
                <div class="item ">
                    <img class="img-slide" src="{{asset('storage/app/'.$slide->img_link)}}" alt="Chania">
               </div>
               @endforeach
           </div>
       </div>
   </section>
</div>
<div id="product-details" class="col-xs-12 col-sm-12 col-md-5">
    <div class="rateit" data-rateit-readonly="true" data-rateit-value="{{$reviewavg->avg}}" data-rateit-step="0.1"></div>
    <p>{{number_format($reviewavg->avg,1)}} Star rating | {{$totalreview->total}} Reviews</p>
    <p>Giá: <span class="price">{{number_format($product->pro_price,0,',','.')}}</span></p>
    <p>Bảo hành: {{$product->bao_hanh}}</p>
    <p>Tình trạng: {{$product->tinh_trang}}</p>
    <p>Khuyến mại: {{$product->xuat_xu}}</p>
    <p>Trạng thái:
        @if($product->trang_thai == 1)
        {{'Còn hàng'}}
        @else
        {{'Hết hàng'}}
        @endif
    </p>
    <p class="add-cart text-center"><a href="{{asset('cart/add/'.$product->id)}}">Đặt hàng online</a></p>
</div>
</div>
<div class="col-sm-push-0 col-md-push-0 col-md-12">
    <h3>Chi tiết sản phẩm</h3>
    <p class="text-justify">{!! $product->description !!}</p>
</div>
<div class="col-sm-push-0 col-md-push-0 col-md-12">
    <div class="col-md-12 comment">
        <form method="post" action="{{asset('review/'.$product->id)}}">
            {{csrf_field()}}
            <div class="form-group">
                <label>Đánh giá:</label>
                <select id="danhgia" name="ratting">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <div class="rateit" data-rateit-resetable data-rateit-backingfld="#danhgia"></div>
                <table>
                    <tr>
                        <td>Tên:</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại:</td>
                        <td><input type="text" name="phone"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email"></td>
                    </tr>
                </table>
                <br>
                <label for="cm">Bình luận:</label>
                <textarea type="text" rows="10" id="cm" name="comment" class="form-control"></textarea>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default">Gửi</button>
            </div>
        </form>
    </div>

    <div class="col-sm-push-0 col-md-push-0 col-md-12 comment-list">
        <div class="col-md-12 comment">
            @foreach($review as $comm)
            <ul>
                <label>Tên: </label>{{$comm->name}}
                <div class="rateit" data-rateit-readonly="true" data-rateit-value="{{$comm->rating}}""></div>
                <br>
                <label>Email: </label>{{$comm->email}}
                <br>
                <label>At: </label><span>{{$comm->created_at}}</span>
            </li>
            <li class="com-details">
                {!! $comm->comment !!}
            </li>
        </ul>
        @endforeach
    </div>
</div>
<div class="col-sm-push-0 col-md-push-0 col-md-12 text-center">
    {{$review->links()}}
</div>
</div>
</div>

</div>
</div>
@stop