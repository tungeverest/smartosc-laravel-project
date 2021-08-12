@extends('admin.layout.index')
@section('title', 'Edit Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						Add Product
					</header>
					<div class="panel-body">
						@include('errors.notes')
						<form method="post" enctype="multipart/form-data" action="{{ asset('admin/product/add') }}">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Price</label>
								<input type="number" class="form-control" id="exampleInputEmail1" name="price">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Price Sales</label>
								<input type="number" class="form-control" id="exampleInputPassword1" name="sale">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Brand</label>
								<select class="form-control m-bot15" id="exampleInputEmail1" name="brand_id">
									@foreach ($brandInfo as $brand)
									<option value="{{ $brand->id }}">{{ $brand->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Xuất xứ</label>
								<input type="text" class="form-control" id="exampleInputPassword1"  name="xuat_xu">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tình Trạng</label>
								<input type="text" class="form-control" id="exampleInputEmail1"  name="tinh_trang">
							</div>								
							<div class="form-group">
								<label for="exampleInputEmail1">Bảo Hành</label>
								<input type="text" class="form-control" id="exampleInputEmail1"  name="bao_hanh">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Trạng Thái :</label>
								<label class="label_radio" for="radio-01">
									<input name="trang_thai" id="radio-01" value="0" type="radio" checked /> Còn Hàng
								</label>
								<label class="label_radio" for="radio-02">
									<input name="trang_thai" id="radio-02" value="1" type="radio" />Hết Hàng
								</label>
							</div>
							<div class="form-group">
								<label for="comment">Description</label>
								<textarea name="description" class="form-control" style="resize: none;" rows="5" >{{-- {!!$product->description!!} --}}</textarea>
							</div>
							<div class="form-group">
								<label>New Photo</label>
								<input type="file" name="pro_img" class="form-control">
							</div>
							<div class="form-group">
								<label>New Banner</label>
								<input type="file" name="banner_name" class="form-control">
							</div>
							<div class="form-group">
								<label>List Photo</label>
								<input type="file" multiple name="listimg[]" class="form-control">
							</div>
							<button type="submit" name="submit" class="btn btn-info">Submit</button>
							<a class="btn btn-warning" href="{{ asset('admin/product/list') }}">Cancel</a>
							<div class="col-lg-6">
								<section class="panel">
									<header class="panel-heading">
										Category List
									</header>
									<div class="panel-body">

										<div class="checkboxes">
											@foreach ($cateInfo as $cate)
											<label class="label_check" for="checkbox-01">
												<input name="category[]" id="checkbox-01" value="{{ $cate->id }}" type="checkbox" />{{ $cate->name }}
											</label>
											@endforeach

										</div>
									</div>
								</section>
							</div>
						</form>
					</section>
				</div>
			</div>
		</section>
		@stop