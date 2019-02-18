function saveServing() {
	var config = {
		apiKey: "AIzaSyAeUUGkdEdVJ1u7gcK4kCnc-zNYjD4DUuw",
		authDomain: "flutter-83d2f.firebaseapp.com",
		databaseURL: "https://flutter-83d2f.firebaseio.com",
		projectId: "flutter-83d2f",
		storageBucket: "flutter-83d2f.appspot.com",
		messagingSenderId: "421767019485"
	};
	var app = firebase.initializeApp(config);
	
	var db = firebase.firestore(app);
	
	$(document).ready(function() {
		firebase.auth().onAuthStateChanged(function (user) {
			if (user) {
				$(document).on('click', '#next-serving', function(e) {
					e.preventDefault();
					
					db.collection('seating').add({
						bobot: $('.parameter-seating').val(),
						bobotpertanyaan: bobot_seating,
						jawaban: jawaban_real_seating,
						pertanyaan: pertanyaan_seating,
					}).then(function(docRef) {
						console.log('Document written with ID: ', docRef.id);
					}).catch(function(error) {
						console.log('Error adding document: ', error);
					});
					
					/*db.collection('greeting').add({
						bobot: $('.parameter-greeting').val(),
						bobotpertanyaan: bobot_greeting,
						jawaban: jawaban_real_greeting,
						pertanyaan: pertanyaan_greeting,
					}).then(function(docRef) {
						console.log('Document greeting with ID: ', docRef.id);
					}).catch(function(error) {
						console.log('Error adding document: ', error);
					});*/
				});
			} else {
				alert('Please login first');
				window.location.href = '../../../index.php';
			}
		});
	});
}