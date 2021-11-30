<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partial.head')
<body>
    @include('partial.nav')


    <a href="#" style="color: black;" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-locale"></i>
        @if(app()->getLocale() == 'en')
        English

        @else

        العربية
        @endif
    </a>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{route('switch.lang','en')}}" class="">English

            </a>
        </li>
        <li>
            <a href="{{route('switch.lang','ar')}}" class="">العربية

            </a>
        </li>
    </ul>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('general.FillDataForm') }}</div>

                    <div class="card-body">
                        <form id="fillData" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('general.Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('general.Phone') }}</label>

                                <div class="col-md-8">
                                    <div class="row">
                                        <label for="phone" class="col-md-2 col-3 col-form-label text-md-right"> +965</label>
                                        <input id="phone" type="text" class="col-md-5 col-6 form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    </div>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                <div class="col-md-6">
                                    <input id="password" type="hidden" class="form-control @error('password') is-invalid @enderror" name="password" value="12345678" required autocomplete="new-password">
                                    <input id="password" type="hidden" class="form-control @error('password') is-invalid @enderror" name="email" value="example@com" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                                <div class="col-md-6">
                                    <input value="12345678" id="password-confirm" type="hidden" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <hr />


                            <div class="form-group row">
                                <label for="national-id" class="col-md-4 col-form-label text-md-right">{{ __('general.CivilID') }}</label>

                                <div class="col-md-6">
                                    <input id="national-id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                                    @error('national_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {{-- <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label> --}}

                                <div class="col-md-6">
                                    <input id="job" type="hidden" value="anonymous" class="form-control @error('job') is-invalid @enderror" name="job" value="{{ old('job') }}" required autocomplete="job">

                                    @error('job')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('general.Floor') }}</label>

                                <div class="col-md-6">
                                    <input id="floor" type="text" class="form-control @error('floor') is-invalid @enderror" name="floor" value="{{ old('floor') }}" required autocomplete="floor">

                                    @error('floor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="building" class="col-md-4 col-form-label text-md-right">{{ __('general.Building') }}</label>

                                <div class="col-md-6">
                                    <input id="building" type="text" class="form-control @error('building') is-invalid @enderror" name="building" value="{{ old('building') }}" required autocomplete="building">

                                    @error('building')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('general.Street') }}</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street">

                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('general.Area') }}</label>

                                <div class="col-md-6">
                                    <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area">

                                    @error('area')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('general.City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div id="submit" class="col-md-6 offset-md-4">
                                    <input type="submit" class="btn btn-primary" value="{{ __('general.Continue') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('partial.footer')

</body>
</html>















