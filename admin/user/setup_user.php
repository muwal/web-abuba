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
	<div class="col-lg-6">
		<div class="card">
			<h5 class="card-title"><strong>New Users</strong></h5>

			
			<form id="new_entry">

				<div class="card-body row">
					<div class="col-md-12">
						<div class="form-group">
							<label>NIK</label>
							<input type="number" id="nik" class="form-control input-reason" placeholder="eg. 2020202020" autocomplete="off" required="">
						</div>

						<div class="form-group">
							<label>Name</label>
							<input type="text" id="name" class="form-control input-reason" placeholder="eg. Tono" autocomplete="off" required="">
						</div>

						<div class="form-group">
							<label>Birth Date</label>
							<input type="date" class="form-control" id="birth-date">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group">
							<label>No. Telp</label>
							<input type="number" id="noTelp" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group">
							<label>Grade</label>
							<input type="text" id="grade" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group">
							<label>PIN</label>
							<input type="number" id="pin" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group">
							<label>Divisi</label>
							<input type="text" id="divisi" class="form-control input-reason" placeholder="" autocomplete="off" required="">
						</div>

						<div class="form-group">
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

	<div class="col-md-6">
		<div class="card card-bordered">
			<h4 class="card-title"><strong>Outlet Data</strong></h4>

			<div class="media-list media-list-hover" data-provide="selectall">
				<div class="media-list-body scrollable" data-provide="sortable" data-sortable-handle=".sortable-dot" style="height:344px">

					<script>
						$(document).ready(function() {
							var content = '';
							var i;
							firebase.auth().onAuthStateChanged(function(user) {
								if (user) {
									db.collection('outlet')
									.orderBy('nama_outlet', 'asc')
									.onSnapshot(function(querySnapshot) {
										var outletName = [];
										var refID = [];
										querySnapshot.forEach(function(doc) {
											outletName.push(doc.data().nama_outlet);
											refID.push(doc.ref.id);
										});
										for (i = 0; i < outletName.length; i++) {
											content += "<div class='media media-single'><div class='custom-control custom-control-lg flex-grow-1'><label>" + outletName[i] + "</label></div><a class='media-action' href='#' data-provide='tooltip' title='Edit'><i class='ti-pencil'></i></a><a class='media-action hover-danger' onclick='myFunction("+refID[i]+")' data-provide='tooltip' title='Delete'><i class='ti-close'></i></a></div>";
										}
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
</div>

<script>
	$(document).ready(function() {
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