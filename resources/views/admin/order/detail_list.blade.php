@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <!--state overview start-->
        <div class="state-overview">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Order detail: order number {{$id}}</div>
                    <div class="panel-body">
                        @include('errors.notes')
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{asset('admin/order')}}" class="btn btn-primary">Back to order page</a>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>id</th>
                                            <th width="20%">Product Name</th>
                                            <th width="20%">Product Id</th>
                                            <th width="20%">So Luong</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_list as $list)
                                        <tr>
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->product->pro_name}}</td>
                                            <td>{{$list->product->id}}</td>
                                            <td>{{$list->soluong}}</td>
                                            <td>{{$list->price}}</td>
                                            <td>{{$list->sum}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <ul class="pagination pagination-lg">
                                    {{$detail_list->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
@stop