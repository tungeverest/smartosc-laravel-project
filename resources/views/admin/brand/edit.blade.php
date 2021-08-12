@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
				<div class="col-xs-12 col-md-12 col-lg-12">

					<div class="panel panel-primary">
						<div class="panel-heading">Brand</div>
						<div class="panel-body">
							@include('errors.notes')
							<h1>Sửa Brand</h1>
							<form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<div class="col-lg-10">
										<label for="exampleInputEmail1">Brand Name</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="{{ $brand_edit->name }}">
									</div>
								</div>
								<button type="submit" name="submit" class="btn btn-info">Submit</button>
								<a class="btn btn-warning" href="{{ asset('admin/brand/list') }}">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
	</section>
</section>
@stop