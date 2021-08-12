@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					{{-- <div class="panel-heading">{{ $product_name->pro_name }}</div> --}}
					<div class="panel-body">
						@include('errors.notes')
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th width="2%">#</th>
											<th width="20%">Product Name</th>
											<th width="20%">Banner</th>
											<th width="20%">Position on Slide</th>
											<th width="10%">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											@foreach($list as $banner)
											<td colspan="" rowspan="" headers="">{{ $banner->product_id }}</td>
											<td>{{$banner->id}}</td>
											<td>
												<img id="list-img" width="200px" height="200px" src="{{asset('storage/app/'.$banner->banner_name)}}" class="thumbnail">
											</td>
											<td>
												<form method="post">
													{{ csrf_field() }}
													<div class="form-group">
														<input hidden  type="number" name="banner_id" value="{{ $banner->id }}">
														<select class="form-control" name="slide_position" >
															@for ($i = 0; $i <= 8; $i++)
															<option 
															@if($i == $banner->slide_position)
															selected
															@endif
															value="{{ $i }}"  
															>
															@if ($i == 0)
															Ẩn Slide
															@else
															Slide-{{ $i }}
															@endif
														</option>
														@endfor
													</select>
												</div>
											</td>
											<td class="text-center">
												<button type="submit" name="submit" class="btn btn-info">Update</button>
											</form>
											<a onclick="return confirm('Bạn có muốn xóa banner này không ?');" href="{{asset('admin/banner/del/'.$banner->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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