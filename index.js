firebase.auth().onAuthStateChanged(function(user) {
	if (user) {
		/*document.getElementById("login_div").style.display = "none";
		document.getElementById("user_div").style.display = "block";

		var user = firebase.auth().currentUser;

		if (user != null) {
			var email_id = user.email;
			document.getElementById("user_para").innerHTML = "Welcome User : " + email_id;
		}*/

		window.location.href = 'admin/';

	} else {
		document.getElementById("login_div").style.display = "block";
		document.getElementById("user_div").style.display = "none";
	}
});

function login() {
	var userEmail = document.getElementById('email_field').value;
	var userPassword = document.getElementById('password_field').value;

	firebase.auth().signInWithEmailAndPassword(userEmail, userPassword).catch(function(error) {
		// Handle Errors here.
		var errorCode = error.code;
		var errorMessage = error.message;
		window.alert("Error : " + errorMessage);
		// ...
	});
}