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
			<h5 class="card-title"><strong>Data Question MG</strong></h5>
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#serving-time">Serving Time</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#complaint">Complaint</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#payment">Payment</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#review-outlet">Review Outlet</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade active show" id="serving-time">
						<div class="card-body row">
							<script>
								$(document).ready(function() {
									firebase.auth().onAuthStateChanged(function(user) {
										if (user) {
											db.collection('greeting')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												let a;
												var bobotPertanyaan = [];
												var pertanyaan = [];
												var jawaban = [];
												var resArray = [];
												ParameterPertanyaanGreeting = '';

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanGreeting = doc.data().bobot;
													bobotPertanyaan.push(doc.data().bobot_pertanyaan);
													pertanyaan.push(doc.data().pertanyaan);
													jawaban.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanGreeting +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaan[0].length; i++) {
													var str = jawaban[0][i];
													var res = str.split("!@#$");

													resArray.push(res)

													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaan[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaan[0][i] + '</dd>';
													
													for (a = 0; a < resArray[0].length; a++) {
														text +=	'<dt class="col-md-4">Alasan</dt>';
														text += '<dd class="col-md-8">' + resArray[0][a] + '</dd>';
														
													}
													console.log(resArray)
													text += '</dl>';

													if (i < pertanyaan[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr class="">';
													}

													document.getElementById('content-greeting').innerHTML = text;
												}
											});

											db.collection('seating')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaanSeating = '';
												var bobotPertanyaanSeating = [];
												var pertanyaanSeating = [];
												var jawabanSeating = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanSeating = doc.data().bobot;
													bobotPertanyaanSeating.push(doc.data().bobot_pertanyaan);
													pertanyaanSeating.push(doc.data().pertanyaan);
													jawabanSeating.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanSeating +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanSeating[0].length; i++) {
													var strSeating = jawabanSeating[0][i];
													var resSeating = strSeating.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaanSeating[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanSeating[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + resSeating + '</dd>';
													text += '</dl>';

													if (i < pertanyaanSeating[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr>';
													}

													document.getElementById('content-seating').innerHTML = text;
												}
											});

											db.collection('takingOrder')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaanTakingOrder = '';
												var bobotPertanyaanTakingOrder = [];
												var pertanyaanTakingOrder = [];
												var jawabanTakingOrder = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanTakingOrder = doc.data().bobot;
													bobotPertanyaanTakingOrder.push(doc.data().bobot_pertanyaan);
													pertanyaanTakingOrder.push(doc.data().pertanyaan);
													jawabanTakingOrder.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanTakingOrder +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanTakingOrder[0].length; i++) {
													var strTakingOrder = jawabanTakingOrder[0][i];
													var resTakingOrder = strTakingOrder.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaanTakingOrder[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanTakingOrder[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + resTakingOrder + '</dd>';
													text += '</dl>';

													if (i < pertanyaanTakingOrder[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr class="">';
													}

													document.getElementById('content-takingorder').innerHTML = text;
												}
											});

											db.collection('servingProduct')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaanServingProduct = '';
												var bobotPertanyaanServingProduct = [];
												var pertanyaanServingProduct = [];
												var jawabanServingProduct = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanServingProduct = doc.data().bobot;
													bobotPertanyaanServingProduct.push(doc.data().bobot_pertanyaan);
													pertanyaanServingProduct.push(doc.data().pertanyaan);
													jawabanServingProduct.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanServingProduct +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanServingProduct[0].length; i++) {
													var strServingProduct = jawabanServingProduct[0][i];
													var resServingProduct = strServingProduct.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaanServingProduct[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanServingProduct[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + resServingProduct + '</dd>';
													text += '</dl>';

													if (i < pertanyaanServingProduct[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr class="">';
													}

													document.getElementById('content-servingproduct').innerHTML = text;
												}
											});
										}
									});
								});

								function myFunction(x) {
									console.log(x);
								}
							</script>
							<div class="col-md-6"><h5 class="text-uppercase">Greeting</h5>
								<div id="content-greeting"></div>
							</div>

							<div class="col-md-6"><h5 class="text-uppercase">Seating</h5>
								<div id="content-seating"></div>
							</div>

							<div class="col-md-6"><h5 class="text-uppercase">Taking Order</h5>
								<div id="content-takingorder"></div>
							</div>

							<div class="col-md-6"><h5 class="text-uppercase">Serving The Product</h5>
								<div id="content-servingproduct"></div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="complaint">
						
					</div>

					<div class="tab-pane fade" id="payment">
						<div class="card-body row">
							<script>
								$(document).ready(function() {
									firebase.auth().onAuthStateChanged(function(user) {
										if (user) {

											db.collection('billing')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaanBilling = '';
												var bobotPertanyaanBilling = [];
												var pertanyaanBilling = [];
												var jawabanBilling = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanBilling = doc.data().bobot;
													bobotPertanyaanBilling.push(doc.data().bobot_pertanyaan);
													pertanyaanBilling.push(doc.data().pertanyaan);
													jawabanBilling.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanBilling +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanBilling[0].length; i++) {
													var strBilling = jawabanBilling[0][i];
													var resBilling = strBilling.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaanBilling[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanBilling[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + resBilling + '</dd>';
													text += '</dl>';

													if (i < pertanyaanBilling[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr>';
													}

													document.getElementById('content-billing').innerHTML = text;
												}
											});

											db.collection('thanking')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaanthanking = '';
												var bobotPertanyaanthanking = [];
												var pertanyaanthanking = [];
												var jawabanthanking = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanthanking = doc.data().bobot;
													bobotPertanyaanthanking.push(doc.data().bobot_pertanyaan);
													pertanyaanthanking.push(doc.data().pertanyaan);
													jawabanthanking.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanthanking +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanthanking[0].length; i++) {
													var strthanking = jawabanthanking[0][i];
													var resthanking = strthanking.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaanthanking[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanthanking[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + resthanking + '</dd>';
													text += '</dl>';

													if (i < pertanyaanthanking[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr class="">';
													}

													document.getElementById('content-thanking').innerHTML = text;
												}
											});

											
										}
									});
								});

								function myFunction(x) {
									console.log(x);
								}
							</script>
							<div class="col-md-6"><h5 class="text-uppercase">Billing</h5>
								<div id="content-billing"></div>
							</div>

							<div class="col-md-6"><h5 class="text-uppercase">Thanking</h5>
								<div id="content-thanking"></div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="review-outlet">
						<div class="card-body row">
							<script>
								$(document).ready(function() {
									firebase.auth().onAuthStateChanged(function(user) {
										if (user) {

											db.collection('cleaniness')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaancleanliness = '';
												var bobotPertanyaancleanliness = [];
												var pertanyaancleanliness = [];
												var jawabancleanliness = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaancleanliness = doc.data().bobot;
													bobotPertanyaancleanliness.push(doc.data().bobot_pertanyaan);
													pertanyaancleanliness.push(doc.data().pertanyaan);
													jawabancleanliness.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaancleanliness +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaancleanliness[0].length; i++) {
													var strcleanliness = jawabancleanliness[0][i];
													var rescleanliness = strcleanliness.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaancleanliness[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaancleanliness[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + rescleanliness + '</dd>';
													text += '</dl>';

													if (i < pertanyaancleanliness[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr>';
													}

													document.getElementById('content-cleanliness').innerHTML = text;
												}
											});

											db.collection('pre-bushing')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaanprebushing = '';
												var bobotPertanyaanprebushing = [];
												var pertanyaanprebushing = [];
												var jawabanprebushing = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanprebushing = doc.data().bobot;
													bobotPertanyaanprebushing.push(doc.data().bobot_pertanyaan);
													pertanyaanprebushing.push(doc.data().pertanyaan);
													jawabanprebushing.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanprebushing +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanprebushing[0].length; i++) {
													var strprebushing = jawabanprebushing[0][i];
													var resprebushing = strprebushing.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaanprebushing[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanprebushing[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + resprebushing + '</dd>';
													text += '</dl>';

													if (i < pertanyaanprebushing[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr class="">';
													}

													document.getElementById('content-prebushing').innerHTML = text;
												}
											});

											db.collection('parking')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var ParameterPertanyaanparking = '';
												var bobotPertanyaanparking = [];
												var pertanyaanparking = [];
												var jawabanparking = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanparking = doc.data().bobot;
													bobotPertanyaanparking.push(doc.data().bobot_pertanyaan);
													pertanyaanparking.push(doc.data().pertanyaan);
													jawabanparking.push(doc.data().jawaban);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Pertanyaan</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanparking +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanparking[0].length; i++) {
													var strparking = jawabanparking[0][i];
													var resparking = strparking.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + pertanyaanparking[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanparking[0][i] + '</dd>';

													text +=	'<dt class="col-md-4">Alasan</dt>';
													text += '<dd class="col-md-8">' + resparking + '</dd>';
													text += '</dl>';

													if (i < pertanyaanparking[0].length - 1) {
														text += '';
														text += '<hr class="hr-sm">';
													} else {
														text += '<hr class="">';
													}

													document.getElementById('content-parking').innerHTML = text;
												}
											});											
										}
									});
								});

								function myFunction(x) {
									console.log(x);
								}
							</script>
							<div class="col-md-6"><h5 class="text-uppercase">Pengecekan Kebersihan</h5>
								<div id="content-cleanliness"></div>
							</div>

							<div class="col-md-6"><h5 class="text-uppercase">Pre - Bushing</h5>
								<div id="content-prebushing"></div>
							</div>

							<div class="col-md-6"><h5 class="text-uppercase">Pengecekan Area Parkir</h5>
								<div id="content-parking"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>