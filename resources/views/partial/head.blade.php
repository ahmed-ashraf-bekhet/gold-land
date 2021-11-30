

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sabayik</title>
    <link rel="icon" type="image/x-icon" href="https://firebasestorage.googleapis.com/v0/b/laravel-firebase-39c14.appspot.com/o/online-shopping%2Flogo2.jpg?alt=media&token=ae9c186c-31f7-4faf-b2a2-493c8d5aa4ea">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="{{ asset('css_customer/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!--jQuery (necessary for Bootstrap's JavaScript plugins)-->
    <!-- Custom Theme files -->
    <link href="{{ asset('css_customer/style.css') }}" rel='stylesheet' type='text/css' />
    <!--Custom Theme files-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Jewelex Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"
    		/>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('js_customer/modernizr.custom.js') }}"></script>
         <!--start-smoth-scrolling-->
    <script type="text/javascript" src="{{ asset('js_customer/move-top.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js_customer/jquery.easing.1.3.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
    <!--start-smoth-scrolling-->
    <!--animated-css-->
	<link href="{{ asset('css_customer/animate.css') }}" rel="stylesheet" type="text/css" media="all">
	<script src="{{ asset('js_customer/wow.min.js') }}"></script>
	<script>
	 new WOW().init();
	</script>
	<!--animated-css-->
	<!--webfonts-->
	<link href='https://fonts.googleapis.com/css?family=Vidaloka|Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
	<!--webfonts-->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel="stylesheet">

    {{-- <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
    @endif

    <style type="text/css">
        .dropdown-item{
            padding: 0.25rem 1.5rem !important;
            color: #212529 !important;
        }
    </style>

    @stack('styles')

    @yield('styles') --}}

    <style>

        @media only screen and (min-width: 600px) {
            .icon-bar {
                position: fixed;
                top: 50%;
                left: 95%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }

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


</head>
