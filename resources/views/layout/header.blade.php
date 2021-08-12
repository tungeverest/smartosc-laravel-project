@php
function getid($cate,$category)
{
    $list[] = $cate->id;
    foreach ($category as $key => $value) {
        if ($value->parent_id == $cate->id) {
            $list[] = getid($value,$category);
        }
    }
    return $list;
}

function getTotal($cate,$category){
    $list = collect(getid($cate,$category))->flatten();
    $product_list = DB::table('listcate')->select('product_id')->whereIn('category_id',$list)->distinct()->get();
    return count($product_list);
}

$brand_list = DB::select('SELECT * from brand');
$category = DB::select('SELECT category.id,category.name,category.parent_id,category.level,COUNT(listcate.id) as total FROM category LEFT JOIN listcate ON category.id = listcate.category_id GROUP BY category.id');
$cart = Cart::content();

@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vietpro Shop - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('public/customer/css/restyle.css')}}">
    <link rel="stylesheet" href="{{asset('public/customer/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('public/customer/js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/customer/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/customer/js/megajs.js')}}"></script>
    <script type="text/javascript" src="{{asset("public/js/jquery.rateit.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("public/js/jquery.rateit.js")}}"></script>
    <link rel="stylesheet" href="{{asset("public/css/rateit.css")}}">
    <script type="text/javascript" src="{{asset("public/js/cart.ajax.js")}}"></script>
</head>
<body>
    <div class="container">
        <nav id="header" class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <a id="logo-brand" href="{{ asset('/') }}"><img src="{{ asset('public/customer/img/home/logo.png') }}"
                        alt="logoshop"></a>
                    </div>
                    <form class="navbar-form text-center">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <div class="clearfix"></div>
        <!-- header -->
        <div class="container">
            <nav id="header" class="navbar">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                        <span class="icon-bar"><i class="glyphicon glyphicon-align-right"></i></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse js-navbar-collapse">
                    <ul class="nav nav-tabs">
                        @foreach($category as $key => $level0)
                        @if($level0->level==1)
                        <li class="dropdown mega-dropdown">
                            <a href="{{asset('category/'.$level0->id.'.html')}}" id="colormega" class="dropdown-toggle" data-toggle="dropdown" rel="dofollow">{{$level0->name}}({{getTotal($level0,$category)}})<span
                                class="caret"></span></a>                
                                <ul class="dropdown-menu mega-dropdown-menu">
                                    @foreach($category as $key => $level1)
                                    @if($level1->level == 2 && $level1->parent_id==$level0->id)
                                    <li class="col-sm-3">
                                        <ul>
                                            <a href="{{asset('category/'.$level1->id)}}"><li class="dropdown-header">{{$level1->name}}({{getTotal($level1,$category)}})</li></a>
                                            @foreach($category as $key => $level2)
                                            @if($level2->level == 3 && $level2->parent_id==$level1->id)
                                            <li><a href="{{asset('category/'.$level2->id)}}">{{$level2->name}}({{getTotal($level2,$category)}})</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            <li class="dropdown ">
                                <a href="#" id="colormega" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Thương hiệu<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($brand_list as $brand)
                                    <li><a href="#">{{ $brand->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown mega-dropdown pull-right">
                                <a href="{{ asset('cart') }}" id="colormega" class="dropdown-toggle" data-toggle="dropdown" rel="dofollow" target="_seft">Giỏ hàng(4)<span
                                    class="caret"></span></a>
                                    <ul class="dropdown-menu mega-dropdown-menu-cart  pull-right" id="tblcart">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Sản Phẩm</th>
                                                        <th>Đơn giá</th>
                                                        <th>Số Lượng</th>
                                                        <th>Thành Tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($cart as $row)
                                                    <form method="post" action="{{asset('cart/update')}}">
                                                        {{csrf_field()}}
                                                        <tr>
                                                            <td>{{$row->id}}</td>
                                                            <td>{{$row->name}}</td>
                                                            <td>{{number_format($row->price)}}</td>
                                                            <td><input class="updateCart form-control" rowId="{{$row->rowId}}" type="number" min="1" value="{{$row->qty}}"></td>
                                                            <td><span class="{{$row->rowId}}">{{number_format($row->total,0,',','.')}} VND</span></td>
                                                        </tr>
                                                    </form>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3">Tổng số tiền: <span class="total-price">{{Cart::total()}}</span></td>
                                                        <td colspan="2"><a class="btn btn-info pull-right" href="{{ asset('cart') }}" title="">Thanh Toán</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </nav>
                </div>
                <!-- end header -->
                <!-- wrap -->
                <div id="wrap" class="container">