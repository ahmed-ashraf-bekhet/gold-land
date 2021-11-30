    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>Sabayik</title>
            <link rel="icon" type="image/x-icon" href="https://firebasestorage.googleapis.com/v0/b/laravel-firebase-39c14.appspot.com/o/online-shopping%2Flogo2.jpg?alt=media&token=ae9c186c-31f7-4faf-b2a2-493c8d5aa4ea">

            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel="stylesheet">


            <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
            </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

            @if(app()->getLocale() == 'ar')
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
            @endif

            <style type="text/css">
                .dropdown-item{
                    padding: 0.25rem 1.5rem !important;
                    color: #212529 !important;
                }

@media only screen and (min-width: 600px) {
    .icon-bar {
        position: fixed;
        top: 50%;
        left: 95%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .shoppingCart {
    position: fixed;
    top: 86%;
    left: 94%;
    background-color: rgb(223, 95, 21);
    border:  none;
    width: 4.5rem;
    height: 4rem;
    border-radius: 48%;
    box-shadow: 5px 5px rgb(46, 45, 45);
    color: white; */
    color: white;
    text-align: center;
    font-size: 16px;
    opacity: 1;
}

.shoppingCart:hover {opacity: .7}
}

@media only screen and (max-width: 600px) {
    .icon-bar {
        position: fixed;
        top: 50%;
        left: 84%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .shoppingCart {
    position: fixed;
    top: 86%;
    left: 84%;
    background-color: rgb(223, 95, 21);
    border:  none;
    width: 3.2rem;
    height: 4.2rem;
    border-radius: 40%;
    box-shadow: 4px 4px rgb(46, 45, 45);
    color: white; */
    color: white;
    text-align: center;
    font-size: 16px;
    opacity: 1;
}

}

/* .icon-bar {
    position: fixed;
    top: 50%;

    left: 85%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
} */

.icon-bar a {
    display: block;
    text-align: center;
    padding: 16px;
    transition: all 0.3s ease;
    color: white;
    font-size: 20px;
    border-radius: 20%;
  }

  .icon-bar button {
    display: block;
    text-align: center;
    padding: 16px;
    transition: all 0.3s ease;
    color: white;
    font-size: 20px;
    border-radius: 20%;
    border: 0px;
  }

  .icon-bar a:hover {
    background-color: #000;
  }

  .facebook {
    background: #3B5998;
    color: white;
  }

  .whatsapp {
    background: #07bb2e;
    color: white;
  }

  .twitter {
    background: #55ACEE;
    color: white;
  }

  .google {
    background: #dd4b39;
    color: white;
  }

  .linkedin {
    background: #007bb5;
    color: white;
  }

  .youtube {
    background: #bb0000;
    color: white;
  }




  .content {
    margin-left: 75px;
    font-size: 30px;
  }


            </style>

            @stack('styles')

            @yield('styles')

        </head>
    <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img style="width: 3rem;" src="https://firebasestorage.googleapis.com/v0/b/laravel-firebase-39c14.appspot.com/o/online-shopping%2Flogo2.jpg?alt=media&token=ae9c186c-31f7-4faf-b2a2-493c8d5aa4ea" alt=""></a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                Landing Page
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">
                            {{ __('general.Home') }}
                        <span class="sr-only">(current)</span>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                Landing Page
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('general.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest


                        <li class="nav-item">
                            <button data-toggle="modal" data-target="#cartModal" class="nav-link btn bg-transparent" > {{ __('general.viewCart') }} <i class="fa fa-shopping-cart"></i></button>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('general.Filter_Products') }}<i class="fa fa-filter"></i>
                            </a>
                            <div id="selected_dept" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @foreach ($departments as $item)
                                    <button data-dept_id="{{$item->id}}" class="dropdown-item">
                                        {{$item->title}}
                                    </button>
                                @endforeach
                            </div>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
                        </li>
                </ul>
            </div>
    </div>
    </nav>


        <div class="album py-5 bg-light">
            <div class="container" style="background-color: white;" id="addProd">
                <div class="row">
                @foreach ($products as $product)
                <div class="m-auto m-lg-0 col-9 col-lg-4 col-md-6 pb-5">
                    <div class="card h-100">
                        <a target="_blank" href="{{ $product->image_url }}"><img class="card-img-top" src="{{ $product->image_url }}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title" style="color: #cc7a00; text-align: center;">

                                    @if (app()->getLocale()=="en")
                                    {{ $product->title_en }}
                                    @else
                                    {{ $product->title_ar }}
                                    @endif
                                    @foreach ($countries as $country)
                                        @if ($country->id == $user->country_id)
                                            <option selected value="{{$country->id}}">{{$country->name}}</option>

                                        @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>

                                        @endif
                                    @endforeach

                            </h4>
                            <hr>
                            <h5 style="color: #cc7a00; text-align: center;">
                                {{ __('general.price') }} {{ $product->weight * $product->effort_price + $product->stone_price + $product->weight * $prices[$product->karat->key] }} {{ __('general.KWD') }}
                            </h5>
                        </div>
                        <div class="card w-75 m-auto">
                            <div class="buttons d-flex flex-row">
                                <button data-prod_id="{{ $product->id }}" data-gram_price="{{ $prices[$product->karat->key] }}" data-image_url="{{ $product->image_url }}" style="background-color: #ec9b21; color: whitesmoke;" class="btn cart-button btn-block">
                                    {{ __('general.AddToCart') }}
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="m-auto">
                    @if ($lastPage==3)
                        <a href="" class="btn ml-2" style="background-color: #ec9b21; color: white; width:8rem;">المنتجات التالية</a>
                    @endif
                    @if ()

                    @else

                    @endif
                    <a href="" class="btn mr-2" style="background-color: #ec9b21; color: white; width:8rem;">المنتجات السابقة</a>
                </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('general.Favourite_Products') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless" style="width: 300px">
                    <thead>
                    <tr>
                        <th style="width: 24%" scope="col">{{ __('general.Image') }}</th>
                        <th style="width: 24%" scope="col">{{ __('general.Number') }}</th>
                        <th style="width: 24%" scope="col">{{ __('general.Weightt') }}</th>
                        <th style="width: 24%" scope="col">{{ __('general.TotalPrice') }}</th>
                    </tr>
                    </thead>
                    <tbody id="table_body">
                    </tbody>
                </table>
                {{ __('general.Total_Price') }} :
                <p id="price_summation"></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close') }} </button>

            {{-- <form action="/payment" method="post"> --}}
                {{-- @csrf --}}
                {{-- <input type="hidden" id="hidden_price" value="" name="totaal_price"> --}}
                <button  id="confirm" class="btn" style="background-color: #ec9b21; color: white;">{{ __('general.Confirm_Order') }}</button>
            {{-- </form> --}}
            </div>
        </div>
        </div>
    </div>
    @auth
    <input type="hidden" id="user_id" value="{{ Auth::User()->id }}">
    @endauth

    <script>
        var products = []
        var price_summation = 0
        $(document).ready(function(){
            price_summation = 0
            products = JSON.parse(localStorage.getItem('products'))
            if(products){
                products.forEach(element => {
                    $('#table_body').append("<tr id='row"+element.id+"'><th scope='row'><img style='width: 50px;' src='"+element.image_url+"'></th><td> <input type='number' data-input='"+element.id+"' style='width: 40px' value='1' id='"+element.id+"'></td><td>"+element.weight+"</td><td id='total_price"+element.id+"'></td><td><a href='#' data-row_id='row"+element.id+"'><i class='fa fa-trash'></i></a></td></tr>")
                    $('#total_price'+element.id).append(parseFloat((parseFloat(element.weight * element.effort_price) + parseFloat(element.stone_price) + parseFloat(element.weight * element.gram_price)) * 1).toFixed(2));
                    console.log(parseFloat(element.weight * element.effort_price) + parseFloat(element.stone_price) + parseFloat(element.weight * element.gram_price)) * parseFloat($("#"+element.id).val())
                    price_summation += parseFloat(element.total_price)
                    $("#"+element.id).val(element.quantity)
                    $("#total_price"+element.id).empty()
                    $("#total_price"+element.id).append((element.total_price).toFixed(3))
                });
                $('#hidden_price').val(price_summation)
                $('#price_summation').empty()
                $('#price_summation').append(price_summation.toFixed(3))
            }
        })
        $('#addProd').on('click','button',function(){
            var product_id = $(this).data('prod_id')
            var gram_price = $(this).data('gram_price')
            var image_URL = $(this).data('image_url')
            // var price_summation = 0
            $.ajax({
            url:'/api/products/'+product_id,
            type:'GET',
            success: function(data){
                console.log(data)
                products = JSON.parse(localStorage.getItem('products'))
                if(!products){
                    products = []
                    data.image_url = image_URL
                    data.gram_price = gram_price
                    data.quantity = 1
                    data.total_price = parseFloat((parseFloat(data.weight * data.effort_price) + parseFloat(data.stone_price) + parseFloat(data.weight * gram_price)) * 1)
                    console.log("sadd"+data.total_price)
                    products.push(data)
                    localStorage.setItem('products',JSON.stringify(products))
                }
                else{
                    var flag = false;
                    products.forEach(element => {
                        if(element.id===data.id){
                            flag = true;
                        }
                    });
                    if(flag==true){
                        alert('تم اضافة هذا المنتج مسبقا')
                        return
                    }
                    data.image_url = image_URL
                    data.gram_price = gram_price
                    data.quantity = 1
                    data.total_price = parseFloat((parseFloat(data.weight * data.effort_price) + parseFloat(data.stone_price) + parseFloat(data.weight * gram_price)) * 1)
                    console.log("sadd"+data.total_price)
                    products.push(data)
                    localStorage.setItem('products',JSON.stringify(products))
                }

                alert('تم اضافة هذا المنتج بنجاح')
                $('#table_body').append("<tr id='row"+data.id+"'><th scope='row'><img style='width: 50px;' src='"+image_URL+"'></th><td> <input type='number' style='width: 40px' data-input='input"+data.id+"' value='1' id='"+data.id+"'></td><td>"+data.weight+"</td><td id='total_price"+data.id+"'></td><td><a href='#' data-row_id='row"+data.id+"'><i class='fa fa-trash'></i></a></td></tr>")
                $('#total_price'+data.id).append(parseFloat((parseFloat(data.weight * data.effort_price) + parseFloat(data.stone_price) + parseFloat(data.weight * data.gram_price)) * parseFloat($("#"+data.id).val())).toFixed(2));
                price_summation += parseFloat(data.total_price)
                $('#hidden_price').val(price_summation)
                $('#price_summation').empty()
                $('#price_summation').append(price_summation.toFixed(3))
            },
            error:function(x,y,z){

            }
        })
        })

        $('#cartModal').on('change','input',function(){
            var id = $(this).attr('id')
            var gram_price
            var quantity = $(this).val()
            // console.log(id)
            products = JSON.parse(localStorage.getItem('products'))
            products.forEach(element => {
                if (element.id==id){
                    gram_price = element.gram_price
                }
            });
            // console.log("fdds"+$(this).val())


            $.ajax({
            url:'/api/products/'+id,
            type:'GET',
            success: function(data){
                $('#total_price'+data.id).empty()
                console.log($("#"+data.id).val())
                $('#total_price'+data.id).append(parseFloat((parseFloat(data.weight * data.effort_price) + parseFloat(data.stone_price) + parseFloat(data.weight * gram_price)) * parseFloat($("#"+data.id).val())).toFixed(2));
                console.log($("#total_price"+data.id))
                price_summation = 0
                products.forEach(function(element){
                    console.log(element.id)
                    console.log(id)
                    if(element.id == id){
                        element.quantity = quantity
                        element.total_price = parseFloat((parseFloat(data.weight * data.effort_price) + parseFloat(data.stone_price) + parseFloat(data.weight * gram_price)) * parseFloat(quantity))
                        console.log("hello"+element.total_price)
                    }
                    price_summation += element.total_price
                });
                $('#hidden_price').val(price_summation)
                $('#price_summation').empty()
                $('#price_summation').append(price_summation.toFixed(3))
                localStorage.setItem('products',JSON.stringify(products))
            },
            error:function(x,y,z){

            }
        })
        })

        $('#confirm').click(function(){
            localStorage.totalPrice = parseFloat($('#price_summation').text())
            if(localStorage.getItem('products')==null){
                alert('من فضلك قم باضافة منتجات الى سلة المشتريات اولا قبل تاكيد الطلب')
            }
            else{
            if(localStorage.getItem('products')=="[]"){
                window.location.href = "/orderDetails/0"
            }
            else{
                window.location.href = "/orderDetails/1"
            }
            }
        })

        $('#table_body').on('click','a',function(){
            let row_id = $(this).data('row_id')
            let productPrice
            $('#'+row_id).remove()
            products = JSON.parse(localStorage.getItem('products'))
            for (let index = 0; index < products.length; index++) {
                const element = products[index];
                if('row'+element.id===row_id){
                    productPrice = parseFloat(element.total_price)
                    products.splice(index, 1);
                }
            }
            localStorage.setItem('products',JSON.stringify(products))
            $('#hidden_price').val(price_summation)
            console.log("a"+price_summation)
            console.log("b"+productPrice)
            price_summation = parseFloat(price_summation - productPrice)
            $('#price_summation').empty()
            $('#price_summation').append(price_summation.toFixed(3))
            localStorage.totalPrice = parseFloat(price_summation - productPrice)
        })

        $('#selected_dept').on('click','button',function(){
            window.location.href="/filter/"+$(this).data('dept_id')
        })

    </script>

    <div class="icon-bar">
        <a target="_blank" href="https://api.whatsapp.com/send?phone= +96566785258" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
        <a target="_blank" href="https://m.facebook.com/sabayikaalkuwait/" class="facebook"><i class="fa fa-facebook"></i></a>
        <a target="_blank" href="https://www.youtube.com/channel/UCAPN-wOVVSxDhnoIxcc3HKw/" class="youtube"><i class="fa fa-youtube"></i></a>
        <a target="_blank" href="https://twitter.com/Sabayikkw?s=20/" class="twitter"><i class="fa fa-twitter"></i></a>
        <a target="_blank" href="https://www.instagram.com/sabayik_alkuwait/" class="google"><i class="fa fa-instagram"></i></a>
        <a target="_blank" href="https://t.me/sabayikworld/" class="linkedin"><i class="fa fa-telegram"></i></a>
    </div>

    <button data-toggle="modal" data-target="#cartModal" class="shoppingCart"><i class="fa fa-shopping-cart fa-2x"></i></button>


    </body>
    </html>
