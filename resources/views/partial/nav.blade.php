

<!--header-->
	<!-- banner Slider starts Here -->
    <script src="{{ asset('js_customer/responsiveslides.min.js') }}"></script>
    <script>
       // You can also use "$(window).load(function() {"
       $(function () {
         // Slideshow 4
         $("#slider3").responsiveSlides({
           auto: true,
           pager: true,
           nav: false,
           speed: 500,
           namespace: "callbacks",
           before: function () {
             $('.events').append("<li>before event fired.</li>");
           },
           after: function () {
             $('.events').append("<li>after event fired.</li>");
           }
         });

       });
     </script>
<!--//End-slider-script -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner" style="border: 4px solid rgb(243, 177, 55); border-radius: 20px;">

      <div class="carousel-item active">
        <img class="d-block w-100" src="../images_customer/bg2.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../images_customer/bg2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../images_customer/bg2.jpg" alt="Third slide">
      </div>
    </div>
  </div>

<!--nav-header-->
<div class="header-section" id="home wow bounceIn" data-wow-delay="0.4s">
    <div class="container">
            <span class="menu one"></span>
            <div class="clearfix"></div>
            <div class="navigation">
                <ul class="navig">
                    <li><a href="/"><i style="background: none;" class="fa fa-home fa-2x"></i><p>{{ __('general.landingPage') }}</p><div class="clearfix"></div></a></li>
			    	<li><a href="/home"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><p>{{ __('general.gallery') }}</p><div class="clearfix"></div></a></li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i><p>{{ __('general.Login') }}</p><div class="clearfix"></div></a></li>
                       @endif

                       @if (Route::has('register'))
        	    			<li><a href="{{ route('register') }}"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i><p>{{ __('general.Register') }}</p><div class="clearfix"></div></a></li>
                            @endif
                            @else
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="message"></i><p>{{ __('general.Logout') }}</p><div class="clearfix">

                            </div></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endif
                        <li><a target="_blank" href="http://sabayiks.net/kw/public/"><i class="fa fa-money fa-2x"></i><p>{{ __('general.prices') }}</p><div class="clearfix"></div></a></li>
                        <li><a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSc7PFsack4Si6qMcde9ETSSFc6etFKm03Y6Fi3KnNdG5R8qGg/viewform"><i class="fa fa-exchange fa-2x" aria-hidden="true"></i><p>{{ __('general.trading') }}</p><div class="clearfix"></div></a></li>
                    </ul>
                </div>
            </div>
            <script>
                $( "span.menu" ).click(function() {
                  $( ".navigation" ).slideToggle( "slow", function() {
                    // Animation complete.
                  });
                });
            </script>
            <div class="clearfix"></div>
    </div>

<script>
    $('#selected_dept').on('click','button',function(){
        console.log($(this))
        location.replace('/filter/'+$(this).data('dept_id'))
    })
</script>
