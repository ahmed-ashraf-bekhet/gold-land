@extends('admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- @include('admin.partial.content-header' , ['title' => 'Advanced Form Elements', 'preview'=>'Preview']) --}}

        <!-- Main content -->
        <section class="content">

        	<div class="row">
	            <!-- left column -->
	            <div class="col-md-12">
	              <!-- general form elements -->
	              <div class="box box-primary">
	                <div class="box-header with-border">
	                  <h3 class="box-title">{{ __($langFile.'Update Category') }}</h3>
	                </div><!-- /.box-header -->
	                <!-- form start -->
	                <form role="form" action="{{ route('categories.update', $category->id) }}" method="POST">
	                	@csrf
						<input type="hidden" name="_method" value="put" />

		                <div class="box-body">
		                	<div class="form-group">
	                            <label for="title-en">{{ __($langFile.'Title En') }}</label>

                                <input id="title-en" type="text" class="form-control @error('title_en') is-invalid @enderror" name="title_en" value="{{ $category->title_en }}" required autocomplete="title_en">

                                @error('title_en')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

	                        <div class="form-group">
	                            <label for="title-en">{{ __($langFile.'Title Ar') }}</label>

                                <input id="title-ar" type="text" class="form-control @error('title_ar') is-invalid @enderror" name="title_ar" value="{{ $category->title_ar }}" required autocomplete="title_ar">

                                @error('title_ar')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

		                </div><!-- /.box-body -->

	                  <div class="box-footer">
	                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> {{ __($langFile.'Save') }}</button>
	                  </div>
	                </form>
	              </div><!-- /.box -->

	            </div><!--/.col (left) -->
	        </div>

        </section>

    </div>
@stop