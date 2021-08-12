@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-lg-6">
				<section class="panel">
					<div class="panel-body">
						@include('errors.notes')
						<h1>Sửa danh mục</h1>
						<form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="col-lg-10">
									<label for="exampleInputEmail1">Category Name</label>
									<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" value="{{ $cate_id->name }}">
									<label for="exampleInputEmail1">Menu level</label>
									<select class="form-control m-bot15" >
										<option >
											{{ $cate_id->level }}
										</option>
									</select>
									<label for="exampleInputEmail1">Parent Menu</label>
									<select class="form-control m-bot15" name='parent_id'>
										<option value="0">Master
										</option>
										@foreach ($category_list as $list)
										<option @if($list->id == $cate_id->parent_id)
											selected
											@endif
											value="{{ $list->id }}">
											@if ($list->level == 1)
											Level:1
											@elseif ($list->level == 2)
											Level:2
											@else Level:3
											@endif
											--{{ $list->name}}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-info">Submit</button>
							<a class="btn btn-warning" href="{{ asset('admin/category/list') }}">Cancel</button></a>
						</form>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
@stop