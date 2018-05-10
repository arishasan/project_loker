@if(session('success'))
	<div class="alert alert-icon alert-success" role="alert">
	  <i class="fe fe-check mr-2" aria-hidden="true"></i> {!! session('success') !!}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-icon alert-danger" role="alert">
	  <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> {!! session('error') !!}
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-icon alert-danger" role="alert">
	  <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
	  <p>There's some error</p>
		<ul style="padding-left: 10px">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif