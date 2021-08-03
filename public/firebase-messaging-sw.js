importScripts("https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.8.1/firebase-messaging.js");
// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
    apiKey: "AIzaSyD0K2YCIjS-P5D-J78ZjBJBaRdMmE6vIHw",
    authDomain: "pushnotifications-262201.firebaseapp.com",
    databaseURL: "https://pushnotifications-262201.firebaseio.com",
    projectId: "pushnotifications-262201",
    storageBucket: "pushnotifications-262201.appspot.com",
    messagingSenderId: "972363288077",
    appId: "1:972363288077:web:e02cbf5a246ffed52c0f44",
    measurementId: "G-KRS8D7QGJ7",
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler((payload) => {
    const title = "hello world";
    const option = {
        body: payload.data.status,
    };
    return self.registration.showNotification(title, option);
});
