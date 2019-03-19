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
<style type="text/css" media="screen">
#edit-user {
	display: none
}
</style>
<div class="main-content">
	<div class="row">
		<div class="col-lg-12 col-12">
			<div class="card">
				<h5 class="card-title new"><strong>New Users</strong></h5>

				<div id="edit-user">
					<form id="edit_entry">

						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-4">
									<label>NIK</label>
									<input type="hidden" id="edit-userid">
									<input type="number" id="nik-edit" class="form-control input-reason edit-user-input" placeholder="eg. 2020202020" autocomplete="off" required="" data-key='nik'>
								</div>

								<div class="form-group col-8">
									<label>Name</label>
									<input type="text" id="name-edit" class="form-control input-reason edit-user-input" placeholder="eg. Tono" autocomplete="off" required="" data-key='name'>
								</div>

								<div class="form-group col-3">
									<label>Birth Date</label>
									<input type="date" class="form-control" id="birthdate-edit">
								</div>

								<div class="form-group col-3">
									<label>No. Telp</label>
									<input type="number" id="noTelp-edit" class="form-control input-reason" placeholder="" autocomplete="off" required="">
								</div>

								<div class="form-group col-6">
									<label>Email</label>
									<input type="email" id="email-edit" class="form-control input-reason" placeholder="" autocomplete="off" required="">
								</div>


								<div class="form-group col-3">
									<label>Grade</label>
									<input type="text" id="grade-edit" class="form-control input-reason" placeholder="" autocomplete="off" required="">
								</div>

								<div class="form-group col-3">
									<label>PIN</label>
									<input type="number" id="pin-edit" class="form-control input-reason" placeholder="" autocomplete="off" required="">
								</div>

								<div class="form-group col-3">
									<label>Divisi</label>
									<input type="text" id="divisi-edit" class="form-control input-reason" placeholder="" autocomplete="off" required="">
								</div>

								<div class="form-group col-3">
									<label>Department</label>
									<input type="text" id="department-edit" class="form-control input-reason" placeholder="" autocomplete="off" required="">
									<input type="hidden" id="todayDate" value="<?php echo date("F j, Y g:i a");?>">
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="flexbox float-right mb-2">
								<button id="editbutton" type="button" class="btn btn-primary ">SAVE</button>
								<button id="cancelbutton" type="button" class="btn btn-danger ">CANCEL</button>
							</div>
						</div>
					</form>
				</div>

				
				<div id="create-user">
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
		</div>

		<div class="col-md-12 col-12">
			<div class="card card-bordered">
				<h4 class="card-title"><strong>Users Data</strong></h4>

				<div class="card-body">

					<script>

						$(document).ready(function() {
							


							var content = '<table class="table table-striped table-bordered table-responsive-sm" cellspacing="0" data-provide="datatables"><thead><tr><th>#</th><th>NIK</th><th>Nama</th><th width="10%">Action</th></tr></thead><tbody>';
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
										no = 1;
										for (i = 0; i < userName.length; i++) {
											content += '<tr><th scope="row">'+no+++'</th><td>' +  userNIK[i] + ' <input type="hidden" class="textid" value="'+refID[i]+'" placeholder=""></td><td>' +  userName[i] + '</td><td class="text-right table-actions"><a class="table-action hover-primary" href="#" onclick="editFunction(\'' +refID[i]+ '\')"><i class="ti-pencil"></i></a><a class="table-action hover-danger" href="#" onclick="deleteFunction(\'' +refID[i]+ '\')"><i class="ti-trash"></i></a></td></tr>';
										}
										content += "</tbody></table>"
										document.getElementById('content').innerHTML = content;
									});
								}
							});
						});

						function editFunction (id) {
							var id = id;
							document.getElementById('create-user').style.display = "none";
							document.getElementById('edit-user').style.display = "block";
							$('.card-title.new strong').text('Edit Users');

							var docRef = db.collection("user").doc(id);
							docRef.get().then(function(doc) {
								if (doc.exists) {
									document.getElementById('edit-userid').value = id;
									document.getElementById('nik-edit').value = doc.data().nik;
									document.getElementById('name-edit').value = doc.data().nama;
									document.getElementById('birthdate-edit').value = doc.data().birthday;
									document.getElementById('noTelp-edit').value = doc.data().telp;
									document.getElementById('email-edit').value = doc.data().email;
									document.getElementById('grade-edit').value = doc.data().grade;
									document.getElementById('divisi-edit').value = doc.data().divisi;
									document.getElementById('department-edit').value = doc.data().department;
								} else {
							        // doc.data() will be undefined in this case
							        console.log("No such document!");
							    }
							}).catch(function(error) {
								console.log("Error getting document:", error);
							});
						}

						function deleteFunction (idDelete) {
							var idDelete = idDelete;

							var confirmBtn = confirm('Are you sure want to delete?');

							if (confirmBtn) {
								db.collection("user").doc(idDelete).delete().then(function() {
									console.log("Document successfully deleted!");
									window.location.href = '?page=users';
								}).catch(function(error) {
									console.error("Error removing document: ", error);
								});
							}
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
				var birthdate = $('#birthdate-edit').val()
				var department = $('#department-edit').val()
				var divisi = $('#divisi-edit').val()
				var email = $('#email-edit').val()
				var grade = $('#grade-edit').val()
				var name = $('#name-edit').val()
				var nik = $('#nik-edit').val()
				var noTelp = $('#noTelp-edit').val()

				$('#cancelbutton').click(function() {
					document.getElementById('create-user').style.display = "block";
					document.getElementById('edit-user').style.display = "none";
					$('.card-title.new strong').text('New Users');

					$('#edit-userid').val('');
					nik = '';
				})

				$('#editbutton').click(function() {
					db.collection('user').doc($('#edit-userid').val()).update({
						birthday: birthdate,
						department: department,
						divisi: divisi,
						email: email,
						grade: grade,
						nama: name,
						nik: nik,
						telp: noTelp,
					}).then(function(docRef) {
						console.log('Success ');
						window.location.href = '?page=users';
					}).catch(function(error) {
						console.log('Error adding document: ', error);
					});
				})

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