<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/visa.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
    <script src="https://secure.gosell.io/js/sdk/tap.min.js"></script>
    <script src="{{ asset('admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
</head>
<body>
    <form id="form-container" method="post" action="/charge">
        <!-- Tap element will be here -->
        <div id="element-container"></div>
        <div id="error-handler" role="alert"></div>
        <div id="success" style=" display: none;;position: relative;float: left;">
              Success! Your token is <span id="token"></span>
        </div>
        <!-- Tap pay button -->
        <button id="tap-btn">Submit</button>
    </form>


    <script>
        // var request = require("request");
        // var token = 'us8SHF8f-ihid0GGRWrM6a0ZFlr1WlRwOIe5xBQ7JacditcQaPG1q0uowQIq3CbD-s1RxPwEtcM7SbD5gSIe707r0SnfpZ6g0-K6C8LhIGc8UbEK-qBEMOSEvqupk-88L1ktj0j87Vgbdf6oHVKi_93LBOsZIiPYcmhk3trLNwThrspzXbvcnzLYYaBS8c2buBasfBcB1em5WzvXTTm5Y-wrJiLFHdFlDv6WQMXGdS-VlpyGlZrYc9kR7yX_YBP2Y8GFNEcEzxXvDsEultUXAUAL5-zmMOg5LjeG2GpZzTEjQj0Sq7WwATUIoCLaFYUSOy1e_iNdnp3YaxDWMQy98Ez-zm3fOghGQmyxM16xzW7nm3NRnOXYMSUjUPtoG7JbAT6acwzZN5qkyW62boQ7JZNabspruIt47FUa8p1Lg22ln8Fa2XcWC9a2gJTwLi5EhwumaXjth-IqbByGIu7MIIzTODYiIuEXu5wYtadbXPjcKszkt1trnt80rJRXFUZHIHlx-pE-5epklnC3DZnhhTjByO-_csv6aaOZtyE_XkYCHHKt-t5cewmHMzP8buS8zwkLQIHMsU3XtHH90ryljB0FopGYNA6l8i3I6ndZ-EYSh07C4WbV72PS2IesXiUSPafJFHsIUn9mEADdv8760PVfnsDYWf39iIQvfyOm2-2uCYhK' //token value to be placed here;
        // var baseURL = 'https://apitest.myfatoorah.com';
        // var options = { method: 'POST',
        //   url: baseURL+'/v2/InitiatePayment',
        //   headers:
        //    { Accept: 'application/json',
        //      Authorization: 'Bearer '+token,
        //      'Content-Type': 'application/json' },
        //   body: { InvoiceAmount: 100, CurrencyIso: 'KWD' },
        //   json: true }
        // request(options, function (error, response, body) {
        //     console.log("dk")
        //   if (error) throw new Error(error);
        //   console.log(body)
        // })


        var token = 'lX983KGEleKvNrHnijRZYea_mhyjzSQSN_DHIOPu5pNIiRiP0Bf075ZR-Q2M0Tli9hhtOxfdpwQEDq5qWobI4Sa2FWf9j5GdI39Sgk6UiZBrppSyfq8bwPXbolK4nQlsI68s1x4lTP-ffZ5PX5PGVMLnMaxjOLmMQ-1e35fd2zmKcHg3s-YrtmuQTxNOqvDDSrgrS9NsUZJ5QPUXtHH1vlaVkT1jWBgQUTECGJP8huHGgrCnniUZ0FAnEpTq24Te4Hc_em4orWpsHTgnNIwaa7uCeqcvHNrEGXT3wrZzz6bLiaEkkEtVhiwVKuvxMpySZp1tdqqBwogJTAG1V433E7EyrJyzJh6lK3K72vEqDAo9i7btWnY83BCCRb52uqVA_IPI00_tiaA8A82GrGBU4fsulTRiC8Jcn4uJb_Gypm2i2ZoQ0izpSN_b6r7hzmUl_hRChYcmp2uElK1-IlMNyEQlqvUWWeS9qmzlVBa3fnQu2qlW9jSSo7fxbMFVMkqNGwZu89IwNWvVYJzhRowlR-gA8f1MJ82JU8_4txWyOGVOi7DUMmNpNDpQbi7SpXE-iUt4oqZ-mTLp4kiXbTSwGbmqQxwPLegY769_TE3DVus8zt1qzOohG4E5ofmnOAzHqVe3ceQy0qbkZ3PhOTBHsffn5rkXWsc8narmjwevj-IwP5yW' //token value to be placed here;
        $.ajax({
          url:'https://api.myfatoorah.com/v2/InitiatePayment',
          type:'POST',
          dataType:'json',
          data:{
                  "PaymentMethodId": 1,
                  "CustomerName": "ahmed",
                  "DisplayCurrencyIso": "KWD",
                  "MobileCountryCode": "+965",
                  "CustomerMobile": "67715137",
                  "CustomerEmail": "Ashrafali20099@yahoo.com",
                  "InvoiceValue": 10,
                  "CallBackUrl": "https://myfatoorah.readme.io/docs/execute-payment",
                  "ErrorUrl": "https://myfatoorah.readme.io/docs/execute-payment",
                },
          headers: {
            Authorization: 'Bearer '+token,
          },
          success: function(data){
              console.log(data)
              window.location.href = data.Data.PaymentURL

          },
          error:function(x,y,z){
              console.log(x+y+z)
          }
        });
    </script>
</body>
</html>
