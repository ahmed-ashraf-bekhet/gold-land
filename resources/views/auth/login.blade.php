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
                        <div class="card-header">{{ __('general.Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('general.Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('general.Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #cc7a00; color: white;">
                                            {{ __('general.Continue') }}
                                        </button>
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

