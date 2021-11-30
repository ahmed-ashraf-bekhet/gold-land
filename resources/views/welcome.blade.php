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
            <!--/welcome-->
            <div class="Welcome wow bounceIn" data-wow-delay="0.4s">
                <div class="container col-9">
                    <div class="welcome-main">
                        <h1>{{ __('general.welcomeSabayik') }}</h1>
                            <img src="{{ asset('images_customer/design.png') }}" alt=""/>
                    </div>
                </div>
            </div>

            <div class="Welcome wow bounceIn" data-wow-delay="0.4s">
                <div class="container col-9">
                    <div class="welcome-main">
                        <h1 style="text-align: center;">{{ __('general.recentProducts') }}</h1>
                            <p style="color:red; text-align: center;">({{ __('general.forAllProducts') }})</p>
                        <img style="text-align: center;" src="{{ asset('images_customer/design.png') }}" alt=""/>
                    </div>
                </div>
            </div>
                    <div class="container col-9">
                        <div class="row d-flex justify-content-center">
                        @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <a target="_blank" href="{{ $product->image_url }}"><img class="card-img-top" src="{{ $product->image_url }}" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        @if (app()->getLocale()=="en")
                                            {{ $product->title_en }}
                                        @else
                                            {{ $product->title_ar }}
                                        @endif
                                    </h4>
                                    {{-- <h5>{{ $product->weight }} {{ __('general.Gram') }}</h5> --}}
                                    <h5>{{ __('general.price') }} {{ $product->weight * $product->effort_price + $product->stone_price + $product->weight * $prices[$product->karat->key] }} {{ __('general.KWD') }} </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="buttons d-flex flex-row">
                                        <a class="btn btn-warning cart-button btn-block" href="/home">
                                            {{ __('general.seeMore') }}
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


        @include('partial.footer')

    </body>
    </html>
