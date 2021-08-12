@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">{{ $product_name->pro_name }}</div>
					<div class="panel-body">
						@include('errors.notes')
						<form role="form" enctype="multipart/form-data" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="exampleInputEmail1">Add Category</label>
								<select class="form-control m-bot15" id="exampleInputEmail1" name="cate_id">
									@foreach ($cate_add as $cateadd)
									<option value="{{ $cateadd->id }}">{{ $cateadd->name }}</option>
									@endforeach
								</select>
							</div>
							<input class="btn btn-info" type="submit" name="submit" value="Add">
							<a class="btn btn-warning" href="{{ asset('admin/product/edit/'.$product_name->id) }}">Back</a>
						</div>
					</form>

					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th width="2%">#</th>
										<th width="20%">Category Name</th>
										<th width="10%">Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										@foreach($list_cate as $list)
										<td>{{$list->id}}</td>
										<td>{{$list->category->name}}</td>
										<td class="text-center">
											<a onclick="return confirm('Bạn có muốn xóa thành viên này không ?');" href="{{asset('admin/listcate/delcate/'.$list->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
</section>
@stop