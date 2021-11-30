@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger alert-dismissable col-md-4 col-md-offset-4">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> {{ __($langFile.'Alert') }} !</h4>
			{{ __($langFile.$error) }}
		</div>
	@endforeach
@endif

@if(session('success'))
	<div class="alert alert-success alert-dismissable col-md-4 col-md-offset-4">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4>	<i class="icon fa fa-check"></i> {{ __($langFile.'Alert') }} !</h4>
		{{__($langFile.session('success'))}}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger alert-dismissable col-md-4 col-md-offset-4">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-ban"></i> {{ __($langFile.'Alert') }} !</h4>
		{{__($langFile.session('error'))}}
	</div>
@endif


