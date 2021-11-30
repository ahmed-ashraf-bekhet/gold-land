importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

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

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});
