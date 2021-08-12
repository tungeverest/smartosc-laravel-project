@extends('admin.layout.index')
@section('title', 'Product List')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			{{-- 	<div class="row"> --}}
				<div class="col-xs-12 col-md-12 col-lg-12">
					@include('errors.notes')
					<div class="panel panel-primary">
						<div class="panel-heading " id="my-header">Product List</div>
						<div class="panel-body">
							<div class="bootstrap-table">
								<div class="table-responsive">

									<a href="{{asset('admin/product/add')}}" class="btn btn-primary">Add Product</a>
									<a href="{{asset('admin/product/list')}}" class="btn btn-primary">Danh sách
									Sản phẩm</a>
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
														<select class="form-control" name="fill">
															<option value="pro_name">Product name</option>
															<option value="id">Product id</option>
														</select>
													</div>
													<div class="form-group">
														<label>Xắp xếp</label>
														<select class="form-control" name="sort">
															<option value="ASC">Tăng dần</option>
															<option value="DESC">Giảm dần</option>
														</select>
														@if(Request::get('pro_search'))
														<input type="text" hidden="true" value="{{Request::get('pro_search')}}" name="pro_search">
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
										<th width="4%" >#</th>
										<th width="10%" >Product</th>
										<th  width="20%">Photo</th>
										<th width="5%" >Price</th>
										<th width="5%" >Price Sales</th>
										<th width="5%" >Is Sales</th>
										<th  width="10%">Brand</th>
										<th  width="10%">Bảo Hành</th>
										<th >Xuất xứ</th>
										<th width="8%" >Tình trạng</th>
										<th width="8%" >Trạng thái</th>
										<th width="8%" >Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($product_list as $product)
									<tr>
										<td>{{$product->id}}</td>
										<td id="list-p">{{$product->pro_name}}</td>
										<td>
											<img id="list-img" width="100%" height="100px" src="{{asset('storage/app/'.$product->pro_img)}}" class="thumbnail">
										</td>
										<td id="list-p">{{$product->pro_price}}</td>
										<td id="list-p">{{$product->price_sales}}</td>
										<td id="list-p">{{$product->is_sales}}</td>
										<td id="list-p">{{$product->brand_id}}</td>
										<td id="list-p">{{$product->bao_hanh}}</td>
										<td id="list-p">{{$product->xuat_xu}}</td>
										<td id="list-p">{{$product->tinh_trang}}</td>
										<td id="list-p">{{$product->trang_thai}}</td>
										<td>
											<a id='width' href="{{asset('admin/product/edit/' . $product->id)}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
											<a id='width' href="{{asset('admin/banner/add/' . $product->id)}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>Add Banner</a>
											<a id='width' href="{{asset('admin/product/del/' .$product->id)}}" onclick="return confirm('Are you delete this product ?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
				{{$product_list->appends(['pro_search'=>Request::get('pro_search'),'f'=>Request::get('fill'),'sort'=>Request::get('sort')])->links()}}
			</ul>
		</div>
	</div>
</div>
</div>
</section>
</section>
@stop