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

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partial.footer')

<script>
    alert('عملية فاشلة قد قمت بادخال بياناتك بشكل خاطئ , من فضلك اعد المحاولة')
    window.location.href = '/orderDetails/1'
</script>

</body>
</html>

