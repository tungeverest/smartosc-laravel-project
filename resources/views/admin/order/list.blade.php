@extends('admin.layout.index')
@section('title', 'Product List')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <!--state overview start-->
        <div class="state-overview">
            {{--    <div class="row"> --}}
                <div class="col-xs-12 col-md-12 col-lg-12">
                    @include('errors.notes')
                    <div class="panel panel-primary">
                        <div class="panel-heading " id="my-header">Order List</div>
                        <div class="panel-body">
                            <div class="bootstrap-table">
                                <div class="table-responsive">
                                    <div class="input-group col-md-3">
                                        <span class="input-group-btn">
                                            <form method="get">
                                                <input type="text" class="form-control"
                                                placeholder="Search by name" name="se">
                                                <button class="btn btn-default" type="submit"><i
                                                    class="fa fa-search"></i>
                                                </button>
                                                <button type="button" class="btn btn-info glyphicon glyphicon-glass
                                                " data-toggle="modal" data-target="#myModal">FILL</button>
                                            </form>
                                        </span>
                                    </div>
                                    <!-- Modal -->
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
                                                                <option value="name">Name</option>
                                                                <option value="total">Total</option>
                                                                <option value="id">Review id</option>
                                                                <option value="created_at">Time</option>
                                                            </select>
                                                            @if(Request::get('se'))
                                                            <input type="text" hidden="true"
                                                            value="{{Request::get('se')}}" name="se">
                                                            @endif
                                                        </div>
                                                        <div class="form-group" name="so">
                                                            <label>Xắp xếp</label>
                                                            <select class="form-control" name="so">
                                                                <option value="ASC">Tăng dần</option>
                                                                <option value="DESC">Giảm dần</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-default">Sort</button>
                                                        <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="3%">id</th>
                                            <th width="10%">Name</th>
                                            <th width="10%">Phone</th>
                                            <th width="10%">Email</th>
                                            <th width="17%">Address</th>
                                            <th width="10%">Total</th>
                                            <th width="10%">Time</th>
                                            <th>Notes</th>
                                            <th width="16%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_list as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->email}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->total}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->notes}}</td>
                                            <td>
                                                <a id='width' onclick="return confirm('Bạn có muốn xác nhận đơn hàng đã thanh toán ?');"
                                                href="{{asset('admin/order/done/'.$order->id)}}"
                                                class="btn btn-success"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>Done</a>
                                                <a id='width'
                                                href="{{asset('admin/order/detail/'.$order->id)}}"
                                                class="btn btn-info"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        <div class="row text-center">
            <div class="col-md-12">
                <ul class="pagination pagination-lg">
                    {{$order_list->appends(['se'=>Request::get('se'),'f'=>Request::get('f'),'so'=>Request::get('so')])->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
</section>
@stop