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
#edit-outlet {
	display: none
}
</style>
<div class="main-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<h5 class="card-title new"><strong>New Outlet</strong></h5>

				<div id="edit-outlet">
					<form id="new_entry">

						<div class="card-body row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Outlet Name</label>
									<input type="hidden" id="edit-outletid">
									<input type="text" id="outlet-edit" class="form-control input-reason" placeholder="eg. Abuba Jakarta" autocomplete="off" required="">
								</div>

								<div class="form-group">
									<label>Search Key</label>
									<input type="text" id="searchKey-edit" class="form-control input-reason" maxlength="1" placeholder="eg. A, J" autocomplete="off" required="">
								</div>

								<div class="form-group">
									<label>Address</label>
									<textarea id="alamat-edit" class="form-control input-reason" autocomplete="off" required=""></textarea>
								</div>

								<div class="form-group">
									<label>No. Telp</label>
									<input type="text" id="noTelp-edit" class="form-control input-reason" placeholder="" autocomplete="off" required="">
								</div>

								<div class="form-group">
									<label>Outlet Image</label>
									<input type="text" id="image-edit" class="form-control input-reason" value="assets/images/slide2.png" placeholder="Outlet Image" autocomplete="off" required="">
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

				
				<div id="create-outlet">
					<form id="new_entry">

						<div class="card-body row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Outlet Name</label>
									<input type="text" id="outlet" class="form-control input-reason" placeholder="eg. Abuba Jakarta" autocomplete="off" required="">
								</div>

								<div class="form-group">
									<label>Search Key</label>
									<input type="text" id="searchKey" class="form-control input-reason" maxlength="1" placeholder="eg. A, J" autocomplete="off" required="">
								</div>

								<div class="form-group">
									<label>Address</label>
									<textarea id="alamat" class="form-control input-reason" autocomplete="off" required=""></textarea>
								</div>

								<div class="form-group">
									<label>No. Telp</label>
									<input type="text" id="noTelp" class="form-control input-reason" placeholder="" autocomplete="off" required="">
								</div>

								<div class="form-group">
									<label>Outlet Image</label>
									<input type="text" id="image" class="form-control input-reason" value="assets/images/slide2.png" placeholder="Outlet Image" autocomplete="off" required="">
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

		<div class="col-md-12">
			<div class="card card-bordered">
				<h4 class="card-title"><strong>Outlet Data</strong></h4>
			<!-- <div class="media-list media-list-hover" data-provide="selectall">
				<div class="media-list-body scrollable" data-provide="sortable" data-sortable-handle=".sortable-dot" style="height:344px"> -->
					<div class="card-body">
						<script>
							$(document).ready(function() {
								var content = '<table class="table table-striped table-bordered table-responsive-sm" cellspacing="0" data-provide="datatables"><thead><tr><th>#</th><th>Name</th><th>Alamat</th><th>Action</th></tr></thead><tbody>';
								var i;
								firebase.auth().onAuthStateChanged(function(user) {
									if (user) {
										db.collection('outlet')
										.orderBy('nama_outlet', 'asc')
										.onSnapshot(function(querySnapshot) {
											var outletName = [];
											var outletAlamat = [];
											var refID = [];
											querySnapshot.forEach(function(doc) { 
												outletName.push(doc.data().nama_outlet);
												outletAlamat.push(doc.data().alamat);
												refID.push(doc.ref.id);
											});
											no = 1;
											for (i = 0; i < outletName.length; i++) {
												/*content += "<div class='media media-single'><div class='custom-control custom-control-lg flex-grow-1'><label>" + outletName[i] + "</label></div><a class='media-action' href='#' data-provide='tooltip' title='Edit'><i class='ti-pencil'></i></a><a class='media-action hover-danger' onclick='myFunction("+refID[i]+")' data-provide='tooltip' title='Delete'><i class='ti-close'></i></a></div>";*/
												content += '<tr><th scope="row">'+no+++'</th><td>' +  outletName[i] + '</td><td>' +  outletAlamat[i] + '</td><td class="text-right table-actions"><a class="table-action hover-primary" href="#" onclick="editFunction(\'' +refID[i]+ '\')"><i class="ti-pencil"></i></a><a class="table-action hover-danger" href="#" onclick="deleteFunction(\'' +refID[i]+ '\')"><i class="ti-trash"></i></a></td></tr>';
												

											// $('#content').append(content);
											}
											content += "</tbody></table>"
											document.getElementById('content').innerHTML = content;
										});
									}
								});
							});

							function editFunction (id) {
								var id = id;
								document.getElementById('create-outlet').style.display = "none";
								document.getElementById('edit-outlet').style.display = "block";
								$('.card-title.new strong').text('Edit Outlet');

								var docRef = db.collection("outlet").doc(id);
								docRef.get().then(function(doc) {
									if (doc.exists) {
										document.getElementById('edit-outletid').value = id;
										document.getElementById('outlet-edit').value = doc.data().nama_outlet;
										document.getElementById('searchKey-edit').value = doc.data().searchKey;
										document.getElementById('alamat-edit').value = doc.data().alamat;
										document.getElementById('noTelp-edit').value = doc.data().telp;
									} else {

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
									db.collection("outlet").doc(idDelete).delete().then(function() {
										console.log("Document successfully deleted!");
										window.location.href = '?page=outlet';
									}).catch(function(error) {
										console.error("Error removing document: ", error);
									});
								}
							}
						</script>

						<div id="content"></div>
					</div>
				<!-- </div>
				</div> -->
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		firebase.auth().onAuthStateChanged(function (user) {
			if (user) {
				$('#cancelbutton').click(function() {
					document.getElementById('create-outlet').style.display = "block";
					document.getElementById('edit-outlet').style.display = "none";
					$('.card-title.new strong').text('New Users');

					$('#edit-outletid').val('');
				})

				$('#editbutton').click(function() {
					db.collection('outlet').doc($('#edit-outletid').val()).update({
						alamat: $('#alamat-edit').val(),
						nama_outlet: $('#outlet-edit').val(),
						searchKey: $('#searchKey-edit').val(),
						telp: $('#noTelp-edit').val(),
					}).then(function(docRef) {
						console.log('Success ');
						window.location.href = '?page=outlet';
					}).catch(function(error) {
						console.log('Error adding document: ', error);
					});
				})

				$('#save').click(function() {

		  			// get maxid outlet from dumper_outlet
		  			db.collection('dumper_outlet').get().then((querySnapshot) => {
		  				querySnapshot.forEach((doc) => {
		  					const myData = doc.data().max_id;

							// save data outlet
							db.collection('outlet').add({
								nama_outlet: $('#outlet').val(),
								alamat: $('#alamat').val(),
								searchKey: $('#searchKey').val(),
								image: $('#image').val(),
								telp: $('#noTelp').val(),
								id: myData + 1,
							}).then(function(docRef) {
								console.log('Document written with ID: ', docRef.id);
							}).catch(function(error) {
								console.log('Error adding document: ', error);
							});

							// update max_id -> dumper_outlet
							db.collection('dumper_outlet').doc(doc.ref.id).update({
								max_id: myData + 1,
							}).then(function() {
								console.log('Document successfully updated!');
								alert('Data successfully added');
								window.location.href = '?page=outlet';
							}).catch(function(error) {
								console.log('Error updating document: ', error);
								alert('Error');
								window.location.href = '?page=outlet';
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