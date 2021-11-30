<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p id="token"></p>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
    <script>
            const firebaseConfig = {
              apiKey: "AIzaSyC0UYwoAlTWqHVkq9s96nGapRV--41vjmw",
              authDomain: "saabayiik.firebaseapp.com",
              projectId: "saabayiik",
              storageBucket: "saabayiik.appspot.com",
              messagingSenderId: "49339556810",
              appId: "1:49339556810:web:1fb9f6203a94f054bb2533",
              measurementId: "G-4VHMFE6H1F"
            };
        firebase.initializeApp(firebaseConfig);
        const messaging=firebase.messaging();

        function IntitalizeFireBaseMessaging() {
            messaging
                .requestPermission()
                .then(function () {
                    console.log("Notification Permission");
                    return messaging.getToken();
                })
                .then(function (token) {
                    console.log("Token : "+token);
                    document.getElementById("token").innerHTML=token;
                })
                .catch(function (reason) {
                    console.log(reason);
                });
        }
        messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

        });
        messaging.onTokenRefresh(function () {
            messaging.getToken()
                .then(function (newtoken) {
                    console.log("New Token : "+ newtoken);
                })
                .catch(function (reason) {
                    console.log(reason);
                })
        })
        IntitalizeFireBaseMessaging();

    </script>
</body>
</html>
