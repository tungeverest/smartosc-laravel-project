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
                        <form method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-12 col-sm-4 col-md-4 ">
                                    <div class="form-group">
                                        <label>Tên thương hiệu</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="btn-group">
                                        <button id="editable-sample_new" name="submit" class="btn green">
                                            Add New <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{asset('admin/brand/list')}}" class="btn btn-primary">Danh sách
                                Brand</a>
                                <button type="button" class="btn btn-info glyphicon glyphicon-glass
                                " data-toggle="modal" data-target="#myModal">FILL
                            </button>
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
                                                        <option value="name">Brand name</option>
                                                        <option value="id">Brand id</option>
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
                        <table class="table table-bordered" style="margin-top:20px;">
                            <thead>
                                <tr class="bg-primary">
                                    <th>ID</th>
                                    <th width="40%">Thương hiệu</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brand_list as $brand)
                                <tr>

                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    {{-- 	<td>{{$brand->name}}</td> --}}
                                    <td class="text-center">
                                        <a href="{{asset('admin/brand/edit/'.$brand->id)}}"
                                         class="btn btn-warning"><i class="fa fa-pencil"
                                         aria-hidden="true"></i>
                                     Sửa</a>
                                     <a onclick="return confirm('Bạn có muốn xóa thành viên này không ?');"
                                     href="{{asset('admin/brand/del/'.$brand->id)}}"
                                     class="btn btn-danger"><i class="fa fa-trash"
                                     aria-hidden="true"></i> Xóa</a>
                                 </td>
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
                        {{$brand_list->appends(['se'=>Request::get('se'),'f'=>Request::get('f'),'so'=>Request::get('so')])->links()}}
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