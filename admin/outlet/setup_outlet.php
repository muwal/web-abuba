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
	<div class="col-lg-12">
		<div class="card">
			<h5 class="card-title"><strong>New Outlet</strong></h5>

			
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

	<div class="col-md-12">
		<div class="card card-bordered">
			<h4 class="card-title"><strong>Outlet Data</strong></h4>
			<!-- <div class="media-list media-list-hover" data-provide="selectall">
				<div class="media-list-body scrollable" data-provide="sortable" data-sortable-handle=".sortable-dot" style="height:344px"> -->
				<div class="card-body">
					<script>
						$(document).ready(function() {
							var content = '<table class="table table-striped table-bordered table-responsive-sm" cellspacing="0" data-provide="datatables"><thead><tr><th>Name</th><th>Alamat</th></tr></thead>';
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
										for (i = 0; i < outletName.length; i++) {
											/*content += "<div class='media media-single'><div class='custom-control custom-control-lg flex-grow-1'><label>" + outletName[i] + "</label></div><a class='media-action' href='#' data-provide='tooltip' title='Edit'><i class='ti-pencil'></i></a><a class='media-action hover-danger' onclick='myFunction("+refID[i]+")' data-provide='tooltip' title='Delete'><i class='ti-close'></i></a></div>";*/
												content += '<tr><td>' +  outletName[i] + '</td><td>' +  outletAlamat[i] + '</td></tr>';
											

											// $('#content').append(content);
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
				<!-- </div>
							</div> -->
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		firebase.auth().onAuthStateChanged(function (user) {
			if (user) {
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