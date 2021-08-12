@extends('admin.layout.index')
@section('title', 'Product List')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">	

			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading " id="my-header">Users</div>
					<div class="panel-body">
						<a href="{{asset('admin/user/add')}}" class="btn btn-primary">New User</a>
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
                                                        <option value="name">User name</option>
                                                        <option value="id">User id</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
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
                                    </form>
                                    </div>
                                </div>
                        </div>
						@include('errors.notes')
						<div class="bootstrap-table">
							<div class="table-responsive">

								<table class="table table-bordered" style="margin-top:20px;">	
									<thead>
										<tr class="bg-primary">
											<th width="4%" >#</th>
											<th width="10%" >Name</th>
											<th width="10%" >Tùy Chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($user_list as $users)
										<tr>
											<td>{{$users->id}}</td>
											<td id="list-p">{{$users->name}}</td>
											<td>
												<a id='width' href="{{asset('admin/user/edit/' . $users->id)}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
												<a id='width' href="{{asset('admin/user/del/' .$users->id)}}" onclick="return confirm('Are you delete this product ?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
			<div class="text-center">
				<div class="col-md-12">
					<ul class="pagination">
						{{$user_list->appends(['f'=>Request::get('f'),'so'=>Request::get('so')])->links()}}
					</ul>
				</div>
			</div>
		</div>
	</section>
</section>
@stop