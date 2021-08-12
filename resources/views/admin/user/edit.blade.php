@extends('admin.layout.index')
@section('title', 'Edit User')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="row state-overview">
				<div class="col-lg-6">
					<section class="panel">
						<header class="panel-heading">
							Edit User
						</header>
						<div class="panel-body">
							@include('errors.notes')
							<form role="form" method="post">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="exampleInputEmail1">Name</label>
									<input type="text" class="form-control" id="exampleInputEmail1" value="{{ $user_edit->name }}" name="name">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Edit Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" value="{{ $user_edit->password }}" name="password">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Re-Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-Password" name="re-password">
								</div>
								<button type="submit" name="submit" class="btn btn-info">Submit</button>
								<a href="{{ asset('admin/user/list') }}" class="btn btn-warning">Cancel</a>
							</form>
						</div>
					</section>
				</div>
			</div>
	</section>
</section>
@stop