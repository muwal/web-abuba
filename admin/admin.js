var adminApp = {};

(function(){
	var firebase = app_fireBase;
	var uid = null;
	firebase.auth().onAuthStateChanged(function(user) {
		if (user) {
			// User is signed in.
			uid = user.id;
		}else{
			uid = null;
			window.alert('Login first');window.location.replace("../index.php");
		}
	});

	function logout() {
		firebase.auth().signOut();
	}

	adminApp.logout = logout;
})()