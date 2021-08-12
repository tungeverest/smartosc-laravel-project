@if (count($errors) > 0)
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger">
			{{$error}}
		</div>
	@endforeach
@endif

@if (session('alert'))
	<div class="alert alert-success">
		{{session('alert')}}
	</div>
@endif

@if (session('err'))
	<div class="alert alert-danger">
		{{session('err')}}
	</div>
@endif
@if (session('success'))
	<script>
        window.alert("{{session('success')}}");
	</script>
@endif
