@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <!--state overview start-->
        <div class="state-overview">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    @include('errors.notes')
                    <div class="panel-heading">Brand</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="40%">Config</th>
                                            <th width="40%">Giá trị</th>
                                            <th width="20%">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Số sản phẩm trên 1 trang category</td>
                                            <td>{{$config}}</td>
                                            <td>
                                                <button class="btn btn-warning"
                                                data-toggle="modal" data-target="#myModal"><i
                                                class="fa fa-pencil"></i>Sửa
                                            </button>
                                        </td>
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <form method="post" action="{{asset('admin/config/set')}}">
                                                        {{csrf_field()}}
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                            data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">Giá trị</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="text" name="config"
                                                            value="{{$config}}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-default">
                                                            Sửa
                                                        </button>
                                                        <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</section>
@stop