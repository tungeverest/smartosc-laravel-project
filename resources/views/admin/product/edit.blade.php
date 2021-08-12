@extends('admin.layout.index')
@section('title', 'Edit Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-lg-6">
				<section class="panel">
					<a class="btn btn-info" href="{{ asset('admin/listcate/list/'.$productInfo->id) }}">Edit product list category</a>
					<a class="btn btn-info" href="{{ asset('admin/listimg/list/'.$productInfo->id) }}">Edit product list image</a>
					<a class="btn btn-info" href="{{ asset('admin/banner/add/'.$productInfo->id) }}">Edit Product Banner</a>
					<div class="panel-body">
						@include('errors.notes')
						<form method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="{{ $productInfo->pro_name }}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Price</label>
								<input type="number" class="form-control" id="exampleInputEmail1" name="price" value="{{ $productInfo->pro_price }}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Price Sales</label>
								<input type="number" class="form-control" id="exampleInputPassword1" name="sale" value="{{ $productInfo->price_sales}}">
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
								<label for="exampleInputEmail1">Categoty</label>
								<select class="form-control m-bot15" id="exampleInputEmail1">
									@foreach ($list_cate_info as $cate)
									<option>{{ $cate->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Xuất xứ</label>
								<input type="text" class="form-control" id="exampleInputPassword1"  name="xuat_xu" value="{{ $productInfo->xuat_xu }}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tình Trạng</label>
								<input type="text" class="form-control" id="exampleInputEmail1"  name="tinh_trang" value="{{ $productInfo->tinh_trang }}">
							</div>								
							<div class="form-group">
								<label for="exampleInputEmail1">Bảo Hành</label>
								<input type="text" class="form-control" id="exampleInputEmail1"  name="bao_hanh" value="{{ $productInfo->bao_hanh }}">
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
								<textarea name="description" class="form-control" style="resize: none;" rows="5" >{!!$productInfo->description!!}</textarea>
							</div>
							<div class="form-group">
								<label>New Photo</label>
								<input type="file" name="pro_img" class="form-control">
							</div>							
							<button type="submit" name="submit" class="btn btn-info">Submit</button>
							<a class="btn btn-warning" href="{{ asset('admin/product/list') }}">Cancel</a>
						</form>
					</section>
				</div>
			</div>
		</section>
		@stop