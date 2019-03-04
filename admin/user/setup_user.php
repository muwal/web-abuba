<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- File Wajib Firestore -->
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-firestore.js"></script>

<script>
	// Initialize Firebase
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
</script>

<div class="row">
	<div class="col-lg-12 col-12">
		<div class="card">
			<h5 class="card-title"><strong>New Users</strong></h5>

			
			<form id="new_entry">

				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-4">
							<label>NIK</label>
							<input type="number" id="nik" class="form-control input-reason" placeholder="eg. 2020202020" autocomplete="off" required="">
						</div>

						<div class="form-group col-8">
							<label>Name</label>
							<input type="text" id="name" class="form-control input-reason" placeholder="eg. Tono" autocomplete="off" required="">
						</div>

						<div class="form-group col-3">
							<label>Birth Date</label>
							<input type="date" class="form-control" id="birth-date">
						</div>

						<div class="form-group col-3">
							<label>No. Telp</label>
							<input type="number" id="noTelp" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group col-6">
							<label>Email</label>
							<input type="email" id="email" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>


						<div class="form-group col-3">
							<label>Grade</label>
							<input type="text" id="grade" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group col-3">
							<label>PIN</label>
							<input type="number" id="pin" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group col-3">
							<label>Divisi</label>
							<input type="text" id="divisi" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group col-3">
							<label>Department</label>
							<input type="text" id="department" class="form-control input-reason" placeholder="" autocomplete="off" required="">
							<input type="hidden" id="todayDate" value="<?php echo date("F j, Y g:i a");?>">
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="flexbox float-right mb-2">
						<button id="save" type="button" class="btn btn-primary ">ADD</button>
					</div>
				</div>
			</form>
			
		</div>
	</div>

	<div class="col-md-12 col-12">
		<div class="card card-bordered">
			<h4 class="card-title"><strong>Users Data</strong></h4>

			<div class="card-body">

				<script>
					$(document).ready(function() {
						var content = '<table class="table table-striped table-bordered table-responsive-sm" cellspacing="0" data-provide="datatables"><thead><tr><th>NIK</th><th>Nama</th></tr></thead>';
						var i;
						firebase.auth().onAuthStateChanged(function(user) {
							if (user) {
								db.collection('user')
								.orderBy('nama', 'asc')
								.onSnapshot(function(querySnapshot) {
									var userNIK = [];
									var userName = [];
									var refID = [];
									querySnapshot.forEach(function(doc) {
										userNIK.push(doc.data().nik);
										userName.push(doc.data().nama);
										refID.push(doc.ref.id);
									});
									for (i = 0; i < userName.length; i++) {
										content += '<tr><td>' +  userNIK[i] + '</td><td>' +  userName[i] + '</td></tr>';
									}
									content += "</table>"
									document.getElementById('content').innerHTML = content;
								});
							}
						});
					});

					function myFunction(x) {
						console.log(x);
					}
				</script>

				<div id="content"></div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		const outletList = document.querySelector('#outlet-list');

		function renderOutlet(doc) {

		}

		db.collection('user').get().then((snapshot) => {
			snapshot.docs.forEach(doc => {
				renderOutlet(doc);
			})
		})
		firebase.auth().onAuthStateChanged(function (user) {
			if (user) {
				$('#save').click(function() {

		  			// get maxid outlet from dumper_outlet
		  			db.collection('dumper_user').get().then((querySnapshot) => {
		  				querySnapshot.forEach((doc) => {
		  					const myData = doc.data().maxid;

							// save data outlet
							db.collection('user').add({
								birthday: $('#birth-date').val(),
								created_at: $('#todayDate').val(),
								department: $('#department').val(),
								divisi: $('#divisi').val(),
								email: $('#email').val(),
								grade: $('#grade').val(),
								id: myData + 1,
								nama: $('#name').val(),
								nik: $('#nik').val(),
								pin: $('#pin').val(),
								telp: $('#noTelp').val(),
							}).then(function(docRef) {
								console.log('Document written with ID: ', docRef.id);
							}).catch(function(error) {
								console.log('Error adding document: ', error);
							});

							// update maxid -> dumper_outlet
							db.collection('dumper_user').doc(doc.ref.id).update({
								maxid: myData + 1,
							}).then(function() {
								console.log('Document successfully updated!');
								alert('Data successfully added');
								window.location.href = '?page=users';
							}).catch(function(error) {
								console.log('Error updating document: ', error);
								alert('Error');
								window.location.href = '?page=users';
							});
						});
		  			});
		  		});
			} else {
				alert('Please login first');
				window.location.href = '../../../index.php';
			}
		});
	});
</script>