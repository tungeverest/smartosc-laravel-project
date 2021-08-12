@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Categories</div>
					<div class="panel-body">
						@include('errors.notes')
						<form method="post" enctype="multipart/form-data">
							{{csrf_field()}}
						</form>
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/category/add')}}" class="btn btn-primary">New Category</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>#</th>
											<th width="20%">Category</th>
											<th width="20%">Category slug</th>
											<th width="20%">Parent</th>
											<th width="20%">Level</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cate_list as $cate)
										<tr>
											<td>{{$cate->id}}</td>
											<td>{{$cate->name}}</td>
											<td>{{$cate->category_slug}}</td>
											<td>{{$cate->parent_id}}</td>
											<td>{{$cate->level}}</td>
											<td class="text-center">
												<a href="{{asset('admin/category/edit/'.$cate->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return confirm('Bạn có muốn xóa thành viên này không ?');" href="{{asset('admin/category/del/'.$cate->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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
									{{$cate_list->links()}}
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