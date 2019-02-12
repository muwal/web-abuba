var app_fireBase = {};

(function(){
	// Initialize Firebase
    var config = {
      apiKey: "AIzaSyAeUUGkdEdVJ1u7gcK4kCnc-zNYjD4DUuw",
      authDomain: "flutter-83d2f.firebaseapp.com",
      databaseURL: "https://flutter-83d2f.firebaseio.com",
      projectId: "flutter-83d2f",
      storageBucket: "flutter-83d2f.appspot.com",
      messagingSenderId: "421767019485"
    };
    firebase.initializeApp(config);

    app_fireBase = firebase;
})()