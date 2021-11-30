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

    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('general.OrderDetails') }}
                    </div>
                </div>
                <br><br>
                <div class="col-6">
                    <table class="table table-borderless" style="size: 10px; width: 100px">
                        <thead>
                          <tr>
                            <th style="width: 24%" scope="col">{{ __('general.Image') }}</th>
                            <th style="width: 24%" scope="col">{{ __('general.Number') }}</th>
                            <th style="width: 24%" scope="col">{{ __('general.Weightt') }}</th>
                            <th style="width: 24%" scope="col">{{ __('general.Effort Price') }}</th>
                            <th style="width: 24%" scope="col">{{ __('general.gramPrice') }}</th>
                            <th style="width: 24%" scope="col">{{ __('general.TotalPrice') }}</th>
                          </tr>
                        </thead>
                        <tbody id="details">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <h2>{{ __('general.OrderTotalPrice') }} <h3 id="price_summation"></h3><h3> {{ __('general.KWD') }}</h3></h2>
                <br><br>
                @auth
                    <button id="payOnline" style="color: black; width: 20rem; height:4rem; margin-right: 5%; margin-bottom: 5%;" class="btn btn-warning">Pay Online</button>
                    <button id="payCash" style="color: black; width: 20rem; height:4rem; margin-bottom: 5%;" class="btn btn-warning">Pay Cash</button>
                @else
                    <a href="/fillData" style="color: black; width: 35rem; height:4rem; margin-right: 5%; margin-bottom: 5%;" class="btn btn-warning">{{ __('general.fillData') }}</a>
                @endauth

                <br><br><br>
            </div>
        </div>
    </div>

    <table style="border-top: 5px solid black;"></table>

    <table>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">{{ __('general.Namee') }}</th>
                <th scope="col">{{ __('general.CivilID') }}</th>
                <th scope="col">{{ __('general.Phone') }}</th>
                <th scope="col">{{ __('general.City') }}</th>
                <th scope="col">{{ __('general.Area') }}</th>
                <th scope="col">{{ __('general.Street') }}</th>
                <th scope="col">{{ __('general.Building') }}</th>
                <th scope="col">{{ __('general.Floor') }}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ Auth::User()->name }}</td>
                <td>{{ Auth::User()->national_id }}</td>
                <td>{{ Auth::User()->phone }}</td>
                <td>{{ Auth::User()->city }}</td>
                <td>{{ Auth::User()->area }}</td>
                <td>{{ Auth::User()->street }}</td>
                <td>{{ Auth::User()->building }}</td>
                <td>{{ Auth::User()->floor }}</td>
              </tr>
            </tbody>
          </table>
    </table>

    @auth
        <input type="hidden" id="userID" value="{{ Auth::User()->id }}">
        <input type="hidden" id="userName" value="{{ Auth::User()->name }}">
        <input type="hidden" id="national_id" value="{{ Auth::User()->phone }}">
    @endauth

    <script>
        var products = JSON.parse(localStorage.getItem('products'))
        console.log(products)
        products.forEach(element => {
            $('#details').append("<tr><td><img style='width: 3rem;' src='"+element.image_url+"'></td><td>"+element.quantity+"</td><td>"+element.weight+"</td><td>"+element.effort_price+"</td><td>"+element.gram_price+"</td><td>"+(element.total_price).toFixed(2)+"</td></tr>")
        });
        $('#price_summation').append(localStorage.totalPrice)

        $('#payOnline').click(function(){
            console.log("hdak")
            console.log($('#userName').val())
            $.ajax({
            url:'/api/payment',
            type:'POST',
            data:{
                total_price : localStorage.totalPrice,
                userName : $('#userName').val(),
                phone : $('#phone').val()
            },
            success: function(data){
                result = JSON.parse(data)
                console.log($('#userID').val())
                console.log(localStorage.totalPrice)
                products = JSON.parse(localStorage.getItem('products'))
                console.log(products)
                console.log(localStorage.totalPrice)
                $.ajax({
                    url:'/api/order',
                    type:'POST',
                    data:{
                        user_id : $('#userID').val(),
                        total : localStorage.totalPrice,
                        products : products
                    },
                    success: function(data){
                        console.log(data)
                        localStorage.setItem('PaymentURL',result.Data.PaymentURL)
                        window.location.href = result.Data.PaymentURL
                    },
                    error:function(x,y,z){
                        console.log(x+y+z)
                        alert('نعتذر لك عملية فاشلة .. اعد ارسال طلبك او تواصل معنا');
                    }
                  });
            },
            error:function(x,y,z){
                console.log(x+y+z)
                alert('نعتذر لك عملية فاشلة .. اعد ارسال طلبك او تواصل معنا');
            }
          });
        });

        $('#payCash').click(function(){
            products = JSON.parse(localStorage.getItem('products'))
            $.ajax({
                url:'/api/order',
                type:'POST',
                data:{
                    user_id : $('#userID').val(),
                    total : localStorage.totalPrice,
                    products : products
                },
                success: function(data){
                    localStorage.removeItem('products')
                    alert('طلبك تم بنجاح سنتواصل معك لتوصيله اليك')
                    window.location.href = '/'
                },
                error:function(x,y,z){
                    console.log(x+y+z)
                    alert('نعتذر لك عملية فاشلة .. اعد ارسال طلبك او تواصل معنا');
                }
            });
        })

        window.setTimeout(() => {
            localStorage.clear()
            alert('انتهى وقت الجلسة , من فضلك قم باعادة عملية الشراء')
            window.location.href="/home"
        }, 1000 * 60 * 3);

    </script>

    @include('partial.footer')


</body>
</html>

