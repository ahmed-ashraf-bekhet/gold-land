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
        @if(app()->getLocale() == 'en')
        <div class="Welcome wow bounceIn" data-wow-delay="0.4s">
            <div class="container col-9">
                <div class="welcome-main">
                    <h1>Current Prices Of Gold In Kuwitian Dinar</h1>
                        <img src="{{ asset('images_customer/design.png') }}" alt=""/>
                </div>
            </div>
        </div>
        <div class="Welcome wow bounceIn" data-wow-delay="0.4s">
            <div class="container col-9">
                <div class="welcome-main">
                    <h1>
                        <div id="clock" class="col-12">
                        </div>
                    </h1>
                        <img src="{{ asset('images_customer/design.png') }}" alt=""/>
                </div>
            </div>
        </div>

            <div class="col-md-6">
                <table class="table table-bordered table-dark">
                    <tbody>
                        @foreach ($karats[0]['types'] as $item)
                          <tr>
                            <td style="text-align: center;" scope="row">{{ $item['name_en'] }}</td>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                  <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[1]['name_en']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[1]['types'] as $item)
                          <tr>
                            <th style="text-align: center;" scope="row">{{ $item['name_en'] }}</th>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>


                <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[3]['name_en']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[3]['types'] as $item)
                          <tr>
                            <th style="text-align: center;" scope="row">{{ $item['name_en'] }}</th>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
              <div class="col-md-6">
                <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{$karats[5]['name_en']}}</th>
                        <th style="text-align: center;">{{$karats[6]['name_en']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($karats[6]['types']); $i++)
                          <tr>
                            <th style="text-align: center;">{{ $karats[6]['types'][$i]['name_en'] }}</th>
                            <td style="text-align: center;">{{ $karats[5]['types'][$i]['price'] }}</td>
                            <td style="text-align: center;">{{ $karats[6]['types'][$i]['price'] }}</td>
                          </tr>
                        @endfor
                    </tbody>
                </table>
                <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[4]['name_en']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[4]['types'] as $item)
                          <tr>
                            <th style="text-align: center;" scope="row">{{ $item['name_en'] }}</th>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[2]['name_en']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[2]['types'] as $item)
                          <tr>
                            <th style="text-align: center;" scope="row">{{ $item['name_en'] }}</th>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>

        @else
        <div class="row justify-content-center">
            <div class="Welcome wow bounceIn" data-wow-delay="0.4s">
                <div class="container col-9">
                    <div class="welcome-main">
                        <h1>اسعار الذهب الآن بالدينار الكويتى</h1>
                            <img src="{{ asset('images_customer/design.png') }}" alt=""/>
                    </div>
                </div>
            </div>
            <div class="Welcome wow bounceIn" data-wow-delay="0.4s">
                <div class="container col-9">
                    <div class="welcome-main">
                        <h1>
                            <div id="clock" class="col-12">
                            </div>
                        </h1>
                            <img src="{{ asset('images_customer/design.png') }}" alt=""/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-dark">
                    <tbody>
                        @foreach ($karats[0]['types'] as $item)
                          <tr>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                            <td style="text-align: center;" scope="row">{{ $item['name_ar'] }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                  <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[1]['name_ar']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[1]['types'] as $item)
                          <tr>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                            <th style="text-align: center;" scope="row">{{ $item['name_ar'] }}</th>
                          </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[3]['name_ar']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[3]['types'] as $item)
                          <tr>
                              <td style="text-align: center;">{{ $item['price'] }}</td>
                              <th style="text-align: center;" scope="row">{{ $item['name_ar'] }}</th>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
              <div class="col-md-6">
                <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                          <th style="text-align: center;">{{$karats[6]['name_ar']}}</th>
                          <th style="text-align: center;">{{$karats[5]['name_ar']}}</th>
                          <th style="text-align: center;"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($karats[6]['types']); $i++)
                          <tr>
                              <td style="text-align: center;">{{ $karats[6]['types'][$i]['price'] }}</td>
                              <td style="text-align: center;">{{ $karats[5]['types'][$i]['price'] }}</td>
                              <th style="text-align: center;">{{ $karats[6]['types'][$i]['name_ar'] }}</th>
                          </tr>
                        @endfor
                    </tbody>
                </table>
                <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[4]['name_ar']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[4]['types'] as $item)
                          <tr>
                            <td style="text-align: center;">{{ $item['price'] }}</td>
                            <th style="text-align: center;" scope="row">{{ $item['name_ar'] }}</th>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align: center;">{{$karats[2]['name_ar']}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($karats[2]['types'] as $item)
                          <tr>
                              <td style="text-align: center;">{{ $item['price'] }}</td>
                              <th style="text-align: center;" scope="row">{{ $item['name_ar'] }}</th>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
        @endif
    </div>



<div class="icon-bar" style="z-index:10">
    <a href="https://api.whatsapp.com/send?phone= +96566785258" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
    <a href="https://m.facebook.com/sabayikaalkuwait/" class="facebook"><i class="fa fa-facebook"></i></a>
    <a href="https://www.youtube.com/channel/UCAPN-wOVVSxDhnoIxcc3HKw/" class="youtube"><i class="fa fa-youtube"></i></a>
    <a href="https://twitter.com/Sabayikkw?s=20/" class="twitter"><i class="fa fa-twitter"></i></a>
    <a href="https://www.instagram.com/sabayik_alkuwait/" class="google"><i class="fa fa-instagram"></i></a>
    <a href="https://t.me/sabayikworld/" class="linkedin"><i class="fa fa-telegram"></i></a>
</div>

<!--start-information-->
	{{-- <div class="information-section"> --}}
		<div class="container">
			<div class="information-grids wow bounceInLeft" data-wow-delay="0.4s">
				<div class="col-md-4 col-9 info-grid loction m-auto pr-2" style="color: white; text-align: center;">
					<p style="font-size: 18px; margin-bottom: 5px;">ٍسبائك 24 مجمع الرايه محل رقم 37
                    </p>
                    <h4>
                        @if(app()->getLocale() == 'en')
                        Our Location

                        @else

                        موقعنا
                        @endif

                    </h4>
                    <a style="color: white;" target="_blank" href="https://www.google.com/maps/place/29%C2%B022'31.9%22N+47%C2%B058'24.3%22E/@29.3755283,47.9712381,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d29.3755283!4d47.9734268?hl=en">
                        <i class="fa fa-map-marker" style="font-size:44px; color: blue;"></i>
                    </a>
				</div>
                <div class="col-md-4 col-9 info-grid loction m-auto pr-2" style="color: white; text-align: center;">
					<p style="font-size: 18px; margin-bottom: 5px;">ٍسبائك المعتمدة مجمع الرايه محل رقم 8
                    </p>
                    <h4>
                        @if(app()->getLocale() == 'en')
                        Our Location

                        @else

                        موقعنا
                        @endif

                    </h4>
                    <a style="color: white;" target="_blank" href="https://www.google.com/maps/place/29%C2%B022'31.9%22N+47%C2%B058'24.3%22E/@29.3755283,47.9712381,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d29.3755283!4d47.9734268?hl=en">
                        <i class="fa fa-map-marker" style="font-size:44px; color: blue;"></i>
                    </a>
				</div>
                <div class="col-md-4 col-9 info-grid loction m-auto pr-2" style="color: white; text-align: center;">
					<p style="font-size: 18px; margin-bottom: 5px;">ٍ
                        سبائك ارض الذهب مجمع الرايه محل رقم 9 , 10 , 11
                    </p>
                    <h4>
                        @if(app()->getLocale() == 'en')
                        Our Location

                        @else

                        موقعنا
                        @endif

                    </h4>
                    <a style="color: white;" target="_blank" href="https://www.google.com/maps/place/29%C2%B022'31.9%22N+47%C2%B058'24.3%22E/@29.3755283,47.9712381,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d29.3755283!4d47.9734268?hl=en">
                        <i class="fa fa-map-marker" style="font-size:44px; color: blue;"></i>
                    </a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
    {{-- </div> --}}

<!--start-footer-->
<div class="copy-right-section  wow bounceInRight" data-wow-delay="0.4s">
    <div class="container">
        <div class="col-md-6 copy-right">
            <h1 style="color: #cc7a00">Sabayik</h1>
        </div>
    </div>
</div>
<!--End-footer-->


    <script>
        let clock = () => {
          let date = new Date();
          let fullYear = date.getFullYear();
          let month = date.getMonth()+1;
          let day = date.getDay();
          let dayOfMonth = date.getDate();
          if(day==5) day='Friday';
          if(day==6) day='Saturday';
          if(day==7) day='Sunday';
          if(day==1) day='Monday';
          if(day==2) day='Tuesday';
          if(day==3) day='Wensday';
          if(day==4) day='Thursday';
          let hrs = date.getHours();
          let mins = date.getMinutes();
          let secs = date.getSeconds();
          let period = "AM";
          if (hrs == 0) {
            hrs = 12;
          } else if (hrs >= 12) {
            hrs = hrs - 12;
            period = "PM";
          }
          hrs = hrs < 10 ? "0" + hrs : hrs;
          mins = mins < 10 ? "0" + mins : mins;
          secs = secs < 10 ? "0" + secs : secs;

          let time = `${dayOfMonth}/${month}/${fullYear} ${hrs}:${mins}:${secs}:${period}`;
          document.getElementById("clock").innerText = time;
          setTimeout(clock, 1000);
        };

        clock();

    </script>

</body>
</html>

