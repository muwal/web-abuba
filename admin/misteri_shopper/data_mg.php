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
	.input-questionGreeting {
		display: none
	}

	.input-pointGreeting {
		display: none
	}

	.input-questionSeating {
		display: none
	}

	.input-pointSeating {
		display: none
	}

	.input-questionTakingOrder {
		display: none
	}

	.input-pointTakingOrder {
		display: none
	}

	.input-questionServingProduct {
		display: none
	}

	.input-pointServingProduct {
		display: none
	}

	.input-questionBilling {
		display: none
	}

	.input-pointBilling {
		display: none
	}

	.input-questionThanking {
		display: none
	}

	.input-pointThanking {
		display: none
	}

	.input-questioncleanliness {
		display: none
	}

	.input-pointcleanliness {
		display: none
	}

	.input-questionprebushing {
		display: none
	}

	.input-pointprebushing {
		display: none
	}

	.input-questionparking {
		display: none
	}

	.input-pointparking {
		display: none
	}

	.input-categorycomplaint {
		display: none
	}

	.input-questioncomplaint {
		display: none
	}

	.input-pointcomplaint {
		display: none
	}

	.card-footer {
		display: none
	}
</style>
<div class="main-content">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<h5 class="card-title"><strong>Data Question</strong><button id="editbutton" type="button" class="btn btn-primary float-right">EDIT</button></h5>
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
												var refID = [];
												ParameterPertanyaanGreeting = '';

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanGreeting = doc.data().bobot;
													bobotPertanyaan.push(doc.data().bobot_pertanyaan);
													pertanyaan.push(doc.data().pertanyaan);
													jawaban.push(doc.data().jawaban);
													refID.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanGreeting +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaan[0].length; i++) {
													var str = jawaban[0][i];
													var res = str.split("!@#$");
													
													// resArray.push(res)
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletGreeting" value="'+refID[i]+'"></h6>';
													text += '<div class="questionGreeting"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanGreeting">' + pertanyaan[0][i] + '</span><input type="text" name="" value="'+pertanyaan[0][i]+'"  class="input-questionGreeting form-control input-sm" placeholder=""></dd>';
													// console.log(pertanyaan[0][i]);
													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaan[0][i] + '</dd>';
													var element = null;
													noalasan = 0;
													for (a = 0; a < res.length; a++) {
														element = res[a];
														if (element == "null") {
															element = '-';
														}else{
															element = res[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointGreeting">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointGreeting form-control input-sm" placeholder=""></dd>';
													}

													
													
													text += '</dl></div>';

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
												var refIDSeating = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanSeating = doc.data().bobot;
													bobotPertanyaanSeating.push(doc.data().bobot_pertanyaan);
													pertanyaanSeating.push(doc.data().pertanyaan);
													jawabanSeating.push(doc.data().jawaban);
													refIDSeating.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanSeating +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanSeating[0].length; i++) {
													var strSeating = jawabanSeating[0][i];
													var resSeating = strSeating.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletSeating" value="'+refIDSeating[i]+'"></h6>';
													text += '<div class="questionSeating"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanSeating">' + pertanyaanSeating[0][i] + '</span><input type="text" name="" value="'+pertanyaanSeating[0][i]+'"  class="input-questionSeating form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanSeating[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < resSeating.length; a++) {
														element = resSeating[a];
														if (element == "null") {
															element = '-';
														}else{
															element = resSeating[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointSeating">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointSeating form-control input-sm" placeholder=""></dd>';
													}

													text += '</dl></div>';

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
												var refIDTakingOrder = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanTakingOrder = doc.data().bobot;
													bobotPertanyaanTakingOrder.push(doc.data().bobot_pertanyaan);
													pertanyaanTakingOrder.push(doc.data().pertanyaan);
													jawabanTakingOrder.push(doc.data().jawaban);
													refIDTakingOrder.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanTakingOrder +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanTakingOrder[0].length; i++) {
													var strTakingOrder = jawabanTakingOrder[0][i];
													var resTakingOrder = strTakingOrder.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletTakingOrder" value="'+refIDTakingOrder[i]+'"></h6>';
													text += '<div class="questionTakingOrder"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanTakingOrder">' + pertanyaanTakingOrder[0][i] + '</span><input type="text" name="" value="'+pertanyaanTakingOrder[0][i]+'"  class="input-questionTakingOrder form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanTakingOrder[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < resTakingOrder.length; a++) {
														element = resTakingOrder[a];
														if (element == "null") {
															element = '-';
														}else{
															element = resTakingOrder[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointTakingOrder">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointTakingOrder form-control input-sm" placeholder=""></dd>';
													}

													text += '</dl></div>';

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
												var refIDServingProduct = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanServingProduct = doc.data().bobot;
													bobotPertanyaanServingProduct.push(doc.data().bobot_pertanyaan);
													pertanyaanServingProduct.push(doc.data().pertanyaan);
													jawabanServingProduct.push(doc.data().jawaban);
													refIDServingProduct.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanServingProduct +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanServingProduct[0].length; i++) {
													var strServingProduct = jawabanServingProduct[0][i];
													var resServingProduct = strServingProduct.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletServingProduct" value="'+refIDServingProduct[i]+'"></h6>';
													text += '<div class="questionServingProduct"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanServingProduct">' + pertanyaanServingProduct[0][i] + '</span><input type="text" name="" value="'+pertanyaanServingProduct[0][i]+'"  class="input-questionServingProduct form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanServingProduct[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < resServingProduct.length; a++) {
														element = resServingProduct[a];

														if (element == "null") {
															element = '-';
														}else{
															element = resServingProduct[a];
														}

														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointServingProduct">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointServingProduct form-control input-sm" placeholder=""></dd>';
													}

													text += '</dl></div>';

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

										$('#editbutton').click(function() {
											$('.text_pertanyaanGreeting').css('display', 'none');
											$('.text_pointGreeting').css('display', 'none');
											$('.input-questionGreeting').css('display', 'block');
											$('.input-pointGreeting').css('display', 'block');

											$('.text_pertanyaanSeating').css('display', 'none');
											$('.text_pointSeating').css('display', 'none');
											$('.input-questionSeating').css('display', 'block');
											$('.input-pointSeating').css('display', 'block');

											$('.text_pertanyaanTakingOrder').css('display', 'none');
											$('.text_pointTakingOrder').css('display', 'none');
											$('.input-questionTakingOrder').css('display', 'block');
											$('.input-pointTakingOrder').css('display', 'block');

											$('.text_pertanyaanServingProduct').css('display', 'none');
											$('.text_pointServingProduct').css('display', 'none');
											$('.input-questionServingProduct').css('display', 'block');
											$('.input-pointServingProduct').css('display', 'block');

											$('.text_pertanyaanBilling').css('display', 'none');
											$('.text_pointBilling').css('display', 'none');
											$('.input-questionBilling').css('display', 'block');
											$('.input-pointBilling').css('display', 'block');

											$('.text_pertanyaanThanking').css('display', 'none');
											$('.text_pointThanking').css('display', 'none');
											$('.input-questionThanking').css('display', 'block');
											$('.input-pointThanking').css('display', 'block');

											$('.text_pertanyaancleanliness').css('display', 'none');
											$('.text_pointcleanliness').css('display', 'none');
											$('.input-questioncleanliness').css('display', 'block');
											$('.input-pointcleanliness').css('display', 'block');

											$('.text_pertanyaanprebushing').css('display', 'none');
											$('.text_pointprebushing').css('display', 'none');
											$('.input-questionprebushing').css('display', 'block');
											$('.input-pointprebushing').css('display', 'block');

											$('.text_pertanyaanparking').css('display', 'none');
											$('.text_pointparking').css('display', 'none');
											$('.input-questionparking').css('display', 'block');
											$('.input-pointparking').css('display', 'block');

											$('.text_pertanyaancomplaint').css('display', 'none');
											$('.text_categorycomplaint').css('display', 'none');
											$('.text_pointcomplaint').css('display', 'none');
											$('.input-questioncomplaint').css('display', 'block');
											$('.input-categorycomplaint').css('display', 'block');
											$('.input-pointcomplaint').css('display', 'block');

											$('.card-title strong').text('Edit Question');
											$('.card-footer').css('display', 'block')
										})

										$('#savebutton').click(function() {
											var pertanyaan_greeting = [];
											var jawaban_real_greeting = [];

											/* SEATING */
											var pertanyaan_seating = [];
											var jawaban_real_seating = [];

											/* taking order */
											var pertanyaan_takingorder = [];
											var jawaban_real_takingorder = [];

											/* serving product */
											var pertanyaan_servingproduct = [];
											var jawaban_real_servingproduct = [];

											/* complaint handling */
											var pertanyaan_complaint = [];
											var jawaban_real_complaint = [];

											/* Billing */
											var pertanyaan_billing = [];
											var jawaban_real_billing = [];

											/* Thanking */
											var pertanyaan_thanking = [];
											var jawaban_real_thanking = [];

											/* cleanliness */
											var pertanyaan_cleanliness = [];
											var jawaban_real_cleanliness = [];

											/* prebushing */
											var pertanyaan_prebushing = [];
											var jawaban_real_prebushing = [];

											/* parking */
											var pertanyaan_parking = [];
											var jawaban_real_parking = [];

											/* complaint */
											var pertanyaan_complaint = [];
											var jawaban_real_complaint = [];
											var id_real_complaint = [];

											$('.questionGreeting').each(function() {
												var question_greeting = $(this).find('.input-questionGreeting').val()
												var points_greeting = [];

												

												$(this).find('.input-pointGreeting').each(function(){
													var pointGreeting = $(this).val()
													if ($(this).val() == '') {
														points_greeting.push('null')
													} else {
														points_greeting.push(pointGreeting)
													}
												})

												pertanyaan_greeting.push(question_greeting)
												jawaban_real_greeting.push(points_greeting.join('!@#$'))

												

												db.collection('greeting').doc($('#edit-outletGreeting').val()).update({
													pertanyaan: pertanyaan_greeting,
													jawaban: jawaban_real_greeting,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_greeting)
												console.log(pertanyaan_greeting)*/
											})

											$('.questionSeating').each(function() {
												

												var question_seating = $(this).find('.input-questionSeating').val()
												var points_seating = [];

												
												$(this).find('.input-pointSeating').each(function(){
													var pointSeating = $(this).val()
													if ($(this).val() == '') {
														points_seating.push('null')
													} else {
														points_seating.push(pointSeating)
													}
												})

												

												pertanyaan_seating.push(question_seating)
												jawaban_real_seating.push(points_seating.join('!@#$'))

												db.collection('seating').doc($('#edit-outletSeating').val()).update({
													pertanyaan: pertanyaan_seating,
													jawaban: jawaban_real_seating,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_seating)
												console.log(pertanyaan_seating)*/
											})

											$('.questionTakingOrder').each(function() {
												

												var question_TakingOrder = $(this).find('.input-questionTakingOrder').val()
												var points_TakingOrder = [];

												
												$(this).find('.input-pointTakingOrder').each(function(){
													var pointTakingOrder = $(this).val()
													if ($(this).val() == '') {
														points_TakingOrder.push('null')
													} else {
														points_TakingOrder.push(pointTakingOrder)
													}
												})

												

												pertanyaan_takingorder.push(question_TakingOrder)
												jawaban_real_takingorder.push(points_TakingOrder.join('!@#$'))

												db.collection('takingOrder').doc($('#edit-outletTakingOrder').val()).update({
													pertanyaan: pertanyaan_takingorder,
													jawaban: jawaban_real_takingorder,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_takingorder)
												console.log(pertanyaan_takingorder)*/
											})

											$('.questionServingProduct').each(function() {
												

												var question_ServingProduct = $(this).find('.input-questionServingProduct').val()
												var points_ServingProduct = [];

												
												$(this).find('.input-pointServingProduct').each(function(){
													var pointServingProduct = $(this).val()
													if ($(this).val() == '') {
														points_ServingProduct.push('null')
													} else {
														points_ServingProduct.push(pointServingProduct)
													}
												})

												

												pertanyaan_servingproduct.push(question_ServingProduct)
												jawaban_real_servingproduct.push(points_ServingProduct.join('!@#$'))

												db.collection('servingProduct').doc($('#edit-outletServingProduct').val()).update({
													pertanyaan: pertanyaan_servingproduct,
													jawaban: jawaban_real_servingproduct,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_servingproduct)
												console.log(pertanyaan_servingproduct)*/
											})

											$('.questionBilling').each(function() {
												

												var question_Billing = $(this).find('.input-questionBilling').val()
												var points_Billing = [];

												
												$(this).find('.input-pointBilling').each(function(){
													var pointBilling = $(this).val()
													if ($(this).val() == '') {
														points_Billing.push('null')
													} else {
														points_Billing.push(pointBilling)
													}
												})

												

												pertanyaan_billing.push(question_Billing)
												jawaban_real_billing.push(points_Billing.join('!@#$'))

												db.collection('billing').doc($('#edit-outletBilling').val()).update({
													pertanyaan: pertanyaan_billing,
													jawaban: jawaban_real_billing,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_billing)
												console.log(pertanyaan_billing)*/
											})

											$('.questionThanking').each(function() {
												

												var question_Thanking = $(this).find('.input-questionThanking').val()
												var points_Thanking = [];

												
												$(this).find('.input-pointThanking').each(function(){
													var pointThanking = $(this).val()
													if ($(this).val() == '') {
														points_Thanking.push('null')
													} else {
														points_Thanking.push(pointThanking)
													}
												})

												

												pertanyaan_thanking.push(question_Thanking)
												jawaban_real_thanking.push(points_Thanking.join('!@#$'))

												db.collection('thanking').doc($('#edit-outletThanking').val()).update({
													pertanyaan: pertanyaan_thanking,
													jawaban: jawaban_real_thanking,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_thanking)
												console.log(pertanyaan_thanking)*/
											})

											$('.questioncleanliness').each(function() {
												

												var question_cleanliness = $(this).find('.input-questioncleanliness').val()
												var points_cleanliness = [];

												
												$(this).find('.input-pointcleanliness').each(function(){
													var pointcleanliness = $(this).val()
													if ($(this).val() == '') {
														points_cleanliness.push('null')
													} else {
														points_cleanliness.push(pointcleanliness)
													}
												})

												

												pertanyaan_cleanliness.push(question_cleanliness)
												jawaban_real_cleanliness.push(points_cleanliness.join('!@#$'))

												db.collection('cleaniness').doc($('#edit-outletcleanliness').val()).update({
													pertanyaan: pertanyaan_cleanliness,
													jawaban: jawaban_real_cleanliness,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_cleanliness)
												console.log(pertanyaan_cleanliness)*/
											})

											$('.questionprebushing').each(function() {
												

												var question_prebushing = $(this).find('.input-questionprebushing').val()
												var points_prebushing = [];

												
												$(this).find('.input-pointprebushing').each(function(){
													var pointprebushing = $(this).val()
													if ($(this).val() == '') {
														points_prebushing.push('null')
													} else {
														points_prebushing.push(pointprebushing)
													}
												})

												

												pertanyaan_prebushing.push(question_prebushing)
												jawaban_real_prebushing.push(points_prebushing.join('!@#$'))

												db.collection('pre-bushing').doc($('#edit-outletprebushing').val()).update({
													pertanyaan: pertanyaan_prebushing,
													jawaban: jawaban_real_prebushing,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_prebushing)
												console.log(pertanyaan_prebushing)*/
											})

											$('.questionparking').each(function() {
												

												var question_parking = $(this).find('.input-questionparking').val()
												var points_parking = [];

												
												$(this).find('.input-pointparking').each(function(){
													var pointparking = $(this).val()
													if ($(this).val() == '') {
														points_parking.push('null')
													} else {
														points_parking.push(pointparking)
													}
												})

												

												pertanyaan_parking.push(question_parking)
												jawaban_real_parking.push(points_parking.join('!@#$'))

												db.collection('parking').doc($('#edit-outletparking').val()).update({
													pertanyaan: pertanyaan_parking,
													jawaban: jawaban_real_parking,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												/*console.log(jawaban_real_parking)
												console.log(pertanyaan_parking)*/
											})

											$('.questioncomplaint').each(function() {
												
												var id_complaint = $(this).find('#edit-outletcomplaint').val()
												var question_complaint = $(this).find('.input-questioncomplaint').val()
												var category_complaint = $(this).find('.input-categorycomplaint').val()
												var points_complaint = [];

												
												$(this).find('.input-pointcomplaint').each(function(){
													var pointcomplaint = $(this).val()
													if ($(this).val() == '') {
														points_complaint.push('null')
													} else {
														points_complaint.push(pointcomplaint)
													}
												})

												
												id_real_complaint.push(id_complaint)
												pertanyaan_complaint.push(question_complaint)
												jawaban_real_complaint.push(points_complaint.join('!@#$'))

												db.collection('complaint_handling').doc(id_complaint).update({
													pertanyaan: pertanyaan_complaint,
													category: category_complaint,
													jawaban: jawaban_real_complaint,
												}).then(function(docRef) {
													console.log('Success ');
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												// console.log(id_complaint)
											})
										});

										$('#cancelbutton').click(function() {
											$('.text_pertanyaanGreeting').css('display', 'block');
											$('.text_pointGreeting').css('display', 'block');
											$('.input-questionGreeting').css('display', 'none');
											$('.input-pointGreeting').css('display', 'none');

											$('.text_pertanyaanSeating').css('display', 'block');
											$('.text_pointSeating').css('display', 'block');
											$('.input-questionSeating').css('display', 'none');
											$('.input-pointSeating').css('display', 'none');

											$('.text_pertanyaanTakingOrder').css('display', 'block');
											$('.text_pointTakingOrder').css('display', 'block');
											$('.input-questionTakingOrder').css('display', 'none');
											$('.input-pointTakingOrder').css('display', 'none');

											$('.text_pertanyaanServingProduct').css('display', 'block');
											$('.text_pointServingProduct').css('display', 'block');
											$('.input-questionServingProduct').css('display', 'none');
											$('.input-pointServingProduct').css('display', 'none');

											$('.text_pertanyaanBilling').css('display', 'block');
											$('.text_pointBilling').css('display', 'block');
											$('.input-questionBilling').css('display', 'none');
											$('.input-pointBilling').css('display', 'none');

											$('.text_pertanyaanThanking').css('display', 'block');
											$('.text_pointThanking').css('display', 'block');
											$('.input-questionThanking').css('display', 'none');
											$('.input-pointThanking').css('display', 'none');

											$('.text_pertanyaancleanliness').css('display', 'block');
											$('.text_pointcleanliness').css('display', 'block');
											$('.input-questioncleanliness').css('display', 'none');
											$('.input-pointcleanliness').css('display', 'none');

											$('.text_pertanyaanprebushing').css('display', 'block');
											$('.text_pointprebushing').css('display', 'block');
											$('.input-questionprebushing').css('display', 'none');
											$('.input-pointprebushing').css('display', 'none');

											$('.text_pertanyaanparking').css('display', 'block');
											$('.text_pointparking').css('display', 'block');
											$('.input-questionparking').css('display', 'none');
											$('.input-pointparking').css('display', 'none');

											$('.text_pertanyaancomplaint').css('display', 'block');
											$('.text_categorycomplaint').css('display', 'block');
											$('.text_pointcomplaint').css('display', 'block');
											$('.input-questioncomplaint').css('display', 'none');
											$('.input-categorycomplaint').css('display', 'none');
											$('.input-pointcomplaint').css('display', 'none');

											$('.card-title strong').text('Data Question');
											$('.card-footer').css('display', 'none')

											$("html, body").animate({ scrollTop: 0 }, "slow");
											return false;
										})

										$('#next-serving').click(function() {
											$('[href="#complaint"]').tab('show');
										})

										$('#next-complaint').click(function() {
											$('[href="#payment"]').tab('show');
										})

										$('#next-payment').click(function() {
											$('[href="#review-outlet"]').tab('show');
										})
									});
								});
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
						<div class="card-footer">
							<div class="flexbox pull-right">
								<button class="btn btn-secondary" type="button" id="next-serving">Next</button> 
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="complaint">
						<div class="card-body row" id="content-complaint">
							<script>
								$(document).ready(function() {
									firebase.auth().onAuthStateChanged(function(user) {
										if (user) {

											db.collection('complaint_handling')
											.onSnapshot(function(querySnapshot) {
												let text = '';
												let i;
												var parameterPertanyaanComplaint = [];
												var kategoriComplaint = [];
												var bobotPertanyaanComplaint = [];
												var pertanyaanComplaint = [];
												var jawabanComplaint = [];
												var refIDcomplaint = [];

												querySnapshot.forEach(function(doc) {
													parameterPertanyaanComplaint.push(doc.data().bobot);
													kategoriComplaint.push(doc.data().category);
													bobotPertanyaanComplaint.push(doc.data().bobot_pertanyaan);
													pertanyaanComplaint.push(doc.data().pertanyaan);
													jawabanComplaint.push(doc.data().jawaban);
													refIDcomplaint.push(doc.ref.id);
												});
												
												let c;
												text += '<div class="col-md-12"><h5 class="text-uppercase">Complaint</h5></div>'
												for (c = 0; c < parameterPertanyaanComplaint.length; c++) {
												text += '<div class="col-md-6"><div class="questioncomplaint">'
													no = 1;
													text += '<dl class="row">';
													text +=	'<dt class="col-md-4">Category<input type="hidden" id="edit-outletcomplaint" value="'+refIDcomplaint[c]+'"></dt>';
													text += '<dd class="col-md-8"><span class="text_categorycomplaint">' + kategoriComplaint[c] +'</span><input type="text" name="" value="'+kategoriComplaint[c]+'"  class="input-categorycomplaint form-control input-sm" placeholder=""></dd>';
													text +=	'<dt class="col-md-4">Bobot Parameter </dt>';
													text += '<dd class="col-md-8">' + parameterPertanyaanComplaint[c] +'%</dd>';
													text += '</dl>';
													for (i = 0; i < pertanyaanComplaint[c].length; i++) {
														var strComplaint = jawabanComplaint[c][i];
														var resComplaint = strComplaint.split("!@#$");
														text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '</h6>';
														text += '<dl class="row">';
														text +=	'<dt class="col-md-4">Pertanyaan</dt>';
														text += '<dd class="col-md-8"><span class="text_pertanyaancomplaint">' + pertanyaanComplaint[c][i] + '</span><input type="text" name="" value="'+pertanyaanComplaint[c][i]+'"  class="input-questioncomplaint form-control input-sm" placeholder=""></dd>';

														text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
														text += '<dd class="col-md-8">' + bobotPertanyaanComplaint[c][i] + '</dd>';

														let a;
														noalasan = 0;
														for (a = 0; a < resComplaint.length; a++) {
															element = resComplaint[a];
															if (element == "null") {
																element = '-';
															}else{
																element = resComplaint[a];
															}
															text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
															text += '<dd class="col-md-8"><span class="text_pointcomplaint">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointcomplaint form-control input-sm" placeholder=""></dd>';
														}

														text += '</dl>';

														if (i < pertanyaanComplaint[0].length - 1) {
															text += '';
															text += '<hr class="hr-sm">';
														} else {
															text += '<hr>';
														}

														document.getElementById('content-complaint').innerHTML = text;
													}
												text += '</div></div>'
												}
											});
											
										}
									});
								});

								
							</script>
							
						</div>
						<div class="card-footer">
							<div class="flexbox pull-right">
								<button class="btn btn-secondary" type="button" id="next-complaint">Next</button> 
							</div>
						</div>
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
												var refIDBilling = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanBilling = doc.data().bobot;
													bobotPertanyaanBilling.push(doc.data().bobot_pertanyaan);
													pertanyaanBilling.push(doc.data().pertanyaan);
													jawabanBilling.push(doc.data().jawaban);
													refIDBilling.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanBilling +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanBilling[0].length; i++) {
													var strBilling = jawabanBilling[0][i];
													var resBilling = strBilling.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletBilling" value="'+refIDBilling[i]+'"></h6>';
													text += '<div class="questionBilling"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanBilling">' + pertanyaanBilling[0][i] + '</span><input type="text" name="" value="'+pertanyaanBilling[0][i]+'"  class="input-questionBilling form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanBilling[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < resBilling.length; a++) {
														element = resBilling[a];
														if (element == "null") {
															element = '-';
														}else{
															element = resBilling[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointBilling">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointBilling form-control input-sm" placeholder=""></dd>';
													}

													text += '</dl></div>';

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
												var refIDThanking = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanthanking = doc.data().bobot;
													bobotPertanyaanthanking.push(doc.data().bobot_pertanyaan);
													pertanyaanthanking.push(doc.data().pertanyaan);
													jawabanthanking.push(doc.data().jawaban);
													refIDThanking.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanthanking +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanthanking[0].length; i++) {
													var strthanking = jawabanthanking[0][i];
													var resthanking = strthanking.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletThanking" value="'+refIDThanking[i]+'"></h6>';
													text += '<div class="questionThanking"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanThanking">' + pertanyaanthanking[0][i] + '</span><input type="text" name="" value="'+pertanyaanthanking[0][i]+'"  class="input-questionThanking form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanthanking[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < resthanking.length; a++) {
														element = resthanking[a];
														if (element == "null") {
															element = '-';
														}else{
															element = resthanking[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointThanking">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointThanking form-control input-sm" placeholder=""></dd>';
													}

													text += '</dl></div>';

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

								
							</script>
							<div class="col-md-6"><h5 class="text-uppercase">Billing</h5>
								<div id="content-billing"></div>
							</div>

							<div class="col-md-6"><h5 class="text-uppercase">Thanking</h5>
								<div id="content-thanking"></div>
							</div>
						</div>
						<div class="card-footer">
							<div class="flexbox pull-right">
								<button class="btn btn-secondary" type="button" id="next-payment">Next</button> 
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
												var refIDcleanliness = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaancleanliness = doc.data().bobot;
													bobotPertanyaancleanliness.push(doc.data().bobot_pertanyaan);
													pertanyaancleanliness.push(doc.data().pertanyaan);
													jawabancleanliness.push(doc.data().jawaban);
													refIDcleanliness.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaancleanliness +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaancleanliness[0].length; i++) {
													var strcleanliness = jawabancleanliness[0][i];
													var rescleanliness = strcleanliness.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletcleanliness" value="'+refIDcleanliness[i]+'"></h6>';
													text += '<div class="questioncleanliness"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaancleanliness">' + pertanyaancleanliness[0][i] + '</span><input type="text" name="" value="'+pertanyaancleanliness[0][i]+'"  class="input-questioncleanliness form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaancleanliness[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < rescleanliness.length; a++) {
														element = rescleanliness[a];
														if (element == "null") {
															element = '-';
														}else{
															element = rescleanliness[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointcleanliness">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointcleanliness form-control input-sm" placeholder=""></dd>';
													}

													text += '</dl></div>';

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
												var refIDprebushing = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanprebushing = doc.data().bobot;
													bobotPertanyaanprebushing.push(doc.data().bobot_pertanyaan);
													pertanyaanprebushing.push(doc.data().pertanyaan);
													jawabanprebushing.push(doc.data().jawaban);
													refIDprebushing.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanprebushing +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanprebushing[0].length; i++) {
													var strprebushing = jawabanprebushing[0][i];
													var resprebushing = strprebushing.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletprebushing" value="'+refIDprebushing[i]+'"></h6>';
													text += '<div class="questionprebushing"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanprebushing">' + pertanyaanprebushing[0][i] + '</span><input type="text" name="" value="'+pertanyaanprebushing[0][i]+'"  class="input-questionprebushing form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanprebushing[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < resprebushing.length; a++) {
														element = resprebushing[a];
														if (element == "null") {
															element = '-';
														}else{
															element = resprebushing[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointprebushing">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointprebushing form-control input-sm" placeholder=""></dd>';
													}
													text += '</dl></div>';

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
												var refIDparking = [];

												querySnapshot.forEach(function(doc) {
													ParameterPertanyaanparking = doc.data().bobot;
													bobotPertanyaanparking.push(doc.data().bobot_pertanyaan);
													pertanyaanparking.push(doc.data().pertanyaan);
													jawabanparking.push(doc.data().jawaban);
													refIDparking.push(doc.ref.id);
												});
												no = 1;
												text += '<dl class="row">';
												text +=	'<dt class="col-md-4">Bobot Parameter</dt>';
												text += '<dd class="col-md-8">' + ParameterPertanyaanparking +'%</dd>';
												text += '</dl>';
												for (i = 0; i < pertanyaanparking[0].length; i++) {
													var strparking = jawabanparking[0][i];
													var resparking = strparking.split("!@#$");
													text += '<h6 class="text-uppercase">Pertanyaan ' +  no++ + '<input type="hidden" id="edit-outletparking" value="'+refIDparking[i]+'"></h6>';
													text += '<div class="questionparking"><dl class="row">';
													text +=	'<dt class="col-md-4">Pertanyaan</dt>';
													text += '<dd class="col-md-8"><span class="text_pertanyaanparking">' + pertanyaanparking[0][i] + '</span><input type="text" name="" value="'+pertanyaanparking[0][i]+'"  class="input-questionparking form-control input-sm" placeholder=""></dd>';

													text +=	'<dt class="col-md-4">Bobot Pertanyaan</dt>';
													text += '<dd class="col-md-8">' + bobotPertanyaanparking[0][i] + '</dd>';

													let a;
													noalasan = 0;
													for (a = 0; a < resparking.length; a++) {
														element = resparking[a];
														if (element == "null") {
															element = '-';
														}else{
															element = resparking[a];
														}
														text +=	'<dt class="col-md-4">Alasan ' + noalasan++ + '</dt>';
														text += '<dd class="col-md-8"><span class="text_pointparking">' + element + '</span><input type="text" name="" value="'+element+'" class="input-pointparking form-control input-sm" placeholder=""></dd>';
													}

													text += '</dl></div>';

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
						<div class="card-footer">
							<div class="flexbox float-right">
								<button id="cancelbutton" type="button" class="btn btn-danger ">CANCEL</button>
								<button id="savebutton" type="button" class="btn btn-primary ">SAVE</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>