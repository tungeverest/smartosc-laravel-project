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
								<label>New Photo</label>
								<input type="file" name="link_img" class="form-control">
								<input class="btn btn-info" type="submit" name="submit" value="Add New Photo">
								<a class="btn btn-warning" href="{{ asset('admin/product/edit/'.$product_name->id) }}">Back</a>
							</div>
						</form>
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th width="2%">#</th>
											<th width="20%">Photo</th>
											<th width="10%">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											@foreach($list_img as $list)
											<td>{{$list->id}}</td>
											{{-- 		<td>{{$list->name}}</td> --}}
											<td>
												<img id="list-img" width="200px" height="200px" src="{{asset('storage/app/'.$list->img_link)}}" class="thumbnail">
											</td>
											<td class="text-center">
												<a onclick="return confirm('Bạn có muốn xóa thành viên này không ?');" href="{{asset('admin/listimg/delimg/'.$list->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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