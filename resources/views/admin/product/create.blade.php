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
	                  <h3 class="box-title">{{ __($langFile.'Create Product') }}</h3>
	                </div><!-- /.box-header -->
	                <!-- form start -->
	                <form id="product_form" role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
	                	@csrf
		                <div class="box-body">
	                        <div class="form-group row">
	                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __($langFile.'Photo') }}</label>

	                            <div class="col-md-6">
	                                <input id="file" type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" required>

	                                @error('file')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>
	                        <hr>

                            <div class="form-group">
	                            <label for="title_en">{{ __($langFile.'Title En') }}</label>

	                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input id="title_en" type="text" class="form-control @error('title_en') is-invalid @enderror" name="title_en" value="{{ old('title_en') }}" required autocomplete="title_en">

                                @error('title_en')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

                            <div class="form-group">
	                            <label for="effort-price">{{ __($langFile.'Title Ar') }}</label>

	                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input id="title_ar" type="text" class="form-control @error('title_ar') is-invalid @enderror" name="title_ar" value="{{ old('title_ar') }}" required autocomplete="title_ar">

                                @error('title_ar')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

		                	<div class="form-group">
	                            <label for="department-id">{{ __($langFile.'Department') }}</label>

                                <select name="department_id" class="form-control" style="width: 100%;" required>
									@foreach($departments as $department)
										<option value="{{$department->id}}" 
                                        @if ($department->id==)
                                            
                                        @endif
                                        >{{$department->title}}</option>
									@endforeach
			                    </select>

                                @error('department_id')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

	                        <div class="form-group">
	                            <label for="category-id">{{ __($langFile.'Category') }}</label>

                                <select name="category_id" class="form-control select2" style="width: 100%;" required>
									@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->title}}</option>
									@endforeach
			                    </select>

                                @error('category_id')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

	                        <div class="form-group">
	                            <label for="department-id">{{ __($langFile.'Karat') }}</label>

                                <select name="karat_id" class="form-control select2" style="width: 100%;" required>
									@foreach($karats as $karat)
										<option value="{{$karat->id}}">{{$karat->title}}</option>
									@endforeach
			                    </select>

                                @error('department_id')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

	                        <div class="form-group">
	                            <label for="weight">{{ __($langFile.'Weight') }}</label>

	                            {{-- <div class="input-group"> --}}
		                            <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
	                                <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight">
	                            {{-- </div> --}}

                                @error('weight')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

	                        <div class="form-group">
	                            <label for="effort-price">{{ __($langFile.'Effort Price') }}</label>

	                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input id="effort-price" type="text" class="form-control @error('effort_price') is-invalid @enderror" name="effort_price" value="{{ old('effort_price') }}" required autocomplete="effort_price">

                                @error('effort_price')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>



	                        <div class="form-group">
	                            <label for="stone-price">{{ __($langFile.'Stone Price') }}</label>

	                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input id="stone-price" type="text" class="form-control @error('stone_price') is-invalid @enderror" name="stone_price" value="{{ old('stone_price') }}" required autocomplete="stone_price">

                                @error('stone_price')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

	                        <div class="form-group">
	                            <label for="stone-weight">{{ __($langFile.'Stone Weight') }}</label>

	                            <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
                                <input id="stone-weight" type="text" class="form-control @error('stone_weight') is-invalid @enderror" name="stone_weight" value="{{ old('stone_weight') }}" required autocomplete="stone_weight">

                                @error('stone_weight')
                                    <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                        </div>

		                </div><!-- /.box-body -->

	                  <div id="submit" class="box-footer">
	                    <button type="button" class="btn btn-primary"> <i class="fa fa-save"></i> {{ __($langFile.'Save') }}</button>
	                  </div>
	                </form>
	              </div><!-- /.box -->

	            </div><!--/.col (left) -->
	        </div>

        </section>

    </div>

    {{-- <The core Firebase JS SDK is always required and must be listed first --}}
    <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-storage.js"></script>
    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
          apiKey: "AIzaSyAQwQXiivP3qDKM7lm1pYlRInHunqcg4UY",
          authDomain: "laravel-firebase-39c14.firebaseapp.com",
          databaseURL: "https://laravel-firebase-39c14.firebaseio.com",
          projectId: "laravel-firebase-39c14",
          storageBucket: "laravel-firebase-39c14.appspot.com",
          messagingSenderId: "120616917067",
          appId: "1:120616917067:web:6fc9f70da1d696c04ed5ce",
          measurementId: "G-P6LH5NL097"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        $('#submit').click(function(e){
            const file = document.getElementById('file').files[0];
            if (file!=null)
            {
                let storageRef = firebase.storage().ref();
                let fileRef = storageRef.child("online-shopping/"+file.name);
                fileRef.put(file).then(function(response){
                    fileRef.getDownloadURL().then(function(url){
                    var fireUrl=url;
                    console.log(fireUrl)
                    var input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", "image_url");
                    input.setAttribute("id", "fileURL");
                    input.setAttribute("value", fireUrl);
                    //append to form element that you want .
                    document.getElementById("product_form").appendChild(input);
                    document.getElementById("product_form").submit();
                    console.log(fireUrl)
                    $('#product_form').submit();
                });
            });
        }
    });
</script>
@stop
