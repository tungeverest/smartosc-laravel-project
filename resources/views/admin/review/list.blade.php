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
                        <div class="panel-heading " id="my-header">Review List</div>
                        <div class="panel-body">
                            <div class="bootstrap-table">
                                <div class="table-responsive">
                                    <div class="input-group col-md-3">
                                        <span class="input-group-btn">
                                            <form method="get">
                                                <input type="text" class="form-control"
                                                placeholder="Search product comment" name="se">
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
                                                                <option value="pro_name">Product name</option>
                                                                <option value="pro_id">Product id</option>
                                                                <option value="id">Review id</option>
                                                                <option value="time">Time</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" name="so">
                                                            <label>Xắp xếp</label>
                                                            <select class="form-control" name="so">
                                                                <option value="ASC">Tăng dần</option>
                                                                <option value="DESC">Giảm dần</option>
                                                            </select>
                                                            @if(Request::get('se'))
                                                            <input type="text" hidden="true"
                                                            value="{{Request::get('se')}}" name="se">
                                                            @endif
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
                                            <th width="10%">Product name</th>
                                            <th width="2%">Product id</th>
                                            <th width="10%">Name</th>
                                            <th width="10%">Email</th>
                                            <th width="10%">Phone</th>
                                            <th width="3%">Rating</th>
                                            <th>Comment</th>
                                            <th width="16%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_review as $review)
                                        <tr>
                                            <td>{{$review->id}}</td>
                                            <td>{{$review->pro_name}}</td>
                                            <td>{{$review->pro_id}}</td>
                                            <td>{{$review->name}}</td>
                                            <td>{{$review->email}}</td>
                                            <td>{{$review->phone}}</td>
                                            <td>{{$review->rating}}</td>
                                            <td>{{$review->comment}}</td>
                                            <td>
                                                <a id='width'
                                                href="{{asset('admin/review/approve/'.$review->id)}}" onclick="return confirm('Bạn muốn duyệt bài đăng?')"
                                                class="btn btn-success"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>Duyệt</a>
                                                <a id='width'
                                                href="{{asset('admin/review/delete/'.$review->id)}}"
                                                onclick="return confirm('Bạn muốn xóa sản phẩm này chứ?')"
                                                class="btn btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i> Delete </a>
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
        <div class="text-center">
            <div class="col-md-12">
                <ul class="pagination pagination-lg">
                    {{$list_review->appends(['se'=>Request::get('se'),'f'=>Request::get('f'),'so'=>Request::get('so')])->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
</section>
@stop