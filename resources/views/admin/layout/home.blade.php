@extends('admin.layout.index')
@section('title','Admin')
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!--state overview start-->
		<div class="state-overview">
			<div class="col-lg-4 col-sm-6">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa fa-users"></i>
					</div>
					<div class="value">
						<h1 class="count">
							0
						</h1>
						<p>Customers</p>
					</div>
				</section>
			</div>
			<div class="col-lg-4 col-sm-6">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa fa-dropbox"></i>
					</div>
					<div class="value">
						<h1 class="count">
							0
						</h1>
						<p>Products</p>
					</div>
				</section>
			</div>
			<div class="col-lg-4 col-sm-6">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa fa-apple"></i>
					</div>
					<div class="value">
						<h1 class="count">
							0
						</h1>
						<p>Brands</p>
					</div>
				</section>
			</div>
			<div class="col-lg-4 col-sm-6">
				<section class="panel">
					<div class="symbol red">
						<i class="fa fa-tags"></i>
					</div>
					<div class="value">
						<h1 class=" count2">
							0
						</h1>
						<p>Categories</p>
					</div>
				</section>
			</div>
			<div class="col-lg-4 col-sm-6">
				<section class="panel">
					<div class="symbol yellow">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="value">
						<h1 class=" count3">
							0
						</h1>
						<p>Orders</p>
					</div>
				</section>
			</div>
			<div class="col-lg-4 col-sm-6">
				<section class="panel">
					<div class="symbol blue">
						<i class="fa fa-camera-retro"></i>
					</div>
					<div class="value">
						<h1 class=" count4">
							0
						</h1>
						<p>Banner Ads</p>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
		@stop