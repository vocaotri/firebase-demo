<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pushnotification</title>
</head>

<body>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-messaging.js"></script>

    <script>
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
            measurementId: "G-KRS8D7QGJ7"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        //set up
        (async () => {
            try {
                await messaging.requestPermission();
            } catch (err) {
                console.log(err)
            }
            const token = await messaging.getToken({
                vapidKey: "BGvU9G49x4eRTdLiS69Htv8oZeZFbCdEsDdXx7UMX6hboMIcBA-WWfe0dxaiJqbPHrQGY9_nlPKHpRc_-Bw2Rlg"
            })
            console.log(token)
        })()
        messaging.onMessage(function(payload) {
            console.log('on message', payload)
        })
    </script>
</body>

</html>
