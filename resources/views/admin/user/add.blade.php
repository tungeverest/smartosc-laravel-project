@extends('admin.layout.index')
@section('title', 'Add Product')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						New User
					</header>
					<div class="panel-body">
						@include('errors.notes')
						<form role="form" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="exampleInputEmail1">Name</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Re-Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-Password" name="re-password">
							</div>
							<button type="submit" name="submit" class="btn btn-info">Submit</button>
							<a class="btn btn-warning" href="{{ asset('admin/user/list') }}" title="">Cancel</a>
						</form>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
@stop