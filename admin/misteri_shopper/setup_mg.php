<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-firestore.js"></script>
<script type="text/javascript">

	/* GREETING */
	var pertanyaan_greeting = [];
	var bobot_greeting = [];
	var jawaban_bantu_greeting = [];
	var jawaban_bantu_greeting_kedua = '';
	var jawaban_real_greeting = [];

	/* SEATING */
	var pertanyaan_seating = [];
	var bobot_seating = [];
	var jawaban_bantu_seating = [];
	var jawaban_bantu_seating_kedua = '';
	var jawaban_real_seating = [];

	/* taking order */
	var pertanyaan_takingorder = [];
	var bobot_takingorder = [];
	var jawaban_bantu_takingorder = [];
	var jawaban_bantu_takingorder_kedua = '';
	var jawaban_real_takingorder = [];

	/* serving product */
	var pertanyaan_servingproduct = [];
	var bobot_servingproduct = [];
	var jawaban_bantu_servingproduct = [];
	var jawaban_bantu_servingproduct_kedua = '';
	var jawaban_real_servingproduct = [];

	/* complaint handling */
	var pertanyaan_complaint = [];
	var bobot_complaint = [];
	var jawaban_bantu_complaint = [];
	var jawaban_bantu_complaint_kedua = '';
	var jawaban_real_complaint = [];

	/* Billing */
	var pertanyaan_billing = [];
	var bobot_billing = [];
	var jawaban_bantu_billing = [];
	var jawaban_bantu_billing_kedua = '';
	var jawaban_real_billing = [];

	/* Thanking */
	var pertanyaan_thanking = [];
	var bobot_thanking = [];
	var jawaban_bantu_thanking = [];
	var jawaban_bantu_thanking_kedua = '';
	var jawaban_real_thanking = [];

	/* cleanliness */
	var pertanyaan_cleanliness = [];
	var bobot_cleanliness = [];
	var jawaban_bantu_cleanliness = [];
	var jawaban_bantu_cleanliness_kedua = '';
	var jawaban_real_cleanliness = [];

	/* prebushing */
	var pertanyaan_prebushing = [];
	var bobot_prebushing = [];
	var jawaban_bantu_prebushing = [];
	var jawaban_bantu_prebushing_kedua = '';
	var jawaban_real_prebushing = [];

	/* parking */
	var pertanyaan_parking = [];
	var bobot_parking = [];
	var jawaban_bantu_parking = [];
	var jawaban_bantu_parking_kedua = '';
	var jawaban_real_parking = [];
	$(function(id)
	{

		/*START*/
		$(document).on('click', '.add-reason', function(e){
			
			e.preventDefault();

			// $(this).closest('.point').append('<div class="form-row reason"><div class="form-group col-md-10"><input type="text" class="form-control input-reason"></div><div class="form-group col-md-2 align-self-end"><button class="btn btn-icons btn-rounded btn-outline-info btn-add add-reason" type="submit"><span class="ion-ios-plus-outline"></span></button></div></div>')
			// 

			$(this).closest('.reason').clone().appendTo($(this).closest('.point'))
			$(this).closest('.point').find('.reason').last().val('')

			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-reason').removeClass('add-reason')

		}).on('click', '.delete-reason', function(e){
			
			e.preventDefault();

			$(this).closest('.reason').remove()

		}).on('click', '.add-question-greeting', function(e){
			
			e.preventDefault();

			/*GREETING*/
			pertanyaan_greeting.push($(this).closest('.question-greeting').find('.pertanyaan-greeting').last().val());
			bobot_greeting.push($(this).closest('.question-greeting').find('.bobot-greeting').last().val());
			jawaban_bantu_greeting.push($(this).closest('.question-greeting').find('.nol-greeting').last().val());
			jawaban_bantu_greeting.push($(this).closest('.question-greeting').find('.satu-greeting').last().val());
			jawaban_bantu_greeting.push($(this).closest('.question-greeting').find('.dua-greeting').last().val());
			jawaban_bantu_greeting_kedua = jawaban_bantu_greeting.join('!@#$');
			jawaban_real_greeting.push(jawaban_bantu_greeting_kedua);
			jawaban_bantu_greeting = [];
			jawaban_bantu_greeting_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-greeting')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-seating', function(e){
			
			e.preventDefault();
			
			/*SEATING*/
			pertanyaan_seating.push($(this).closest('.question-seating').find('.pertanyaan-seating').last().val());
			bobot_seating.push($(this).closest('.question-seating').find('.bobot-seating').last().val());
			jawaban_bantu_seating.push($(this).closest('.question-seating').find('.nol-seating').last().val());
			jawaban_bantu_seating.push($(this).closest('.question-seating').find('.satu-seating').last().val());
			jawaban_bantu_seating.push($(this).closest('.question-seating').find('.dua-seating').last().val());
			jawaban_bantu_seating_kedua = jawaban_bantu_seating.join('!@#$');
			jawaban_real_seating.push(jawaban_bantu_seating_kedua);
			jawaban_bantu_seating = [];
			jawaban_bantu_seating_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-seating')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-takingorder', function(e){
			
			e.preventDefault();
			
			/*takingorder*/
			pertanyaan_takingorder.push($(this).closest('.question-takingorder').find('.pertanyaan-takingorder').last().val());
			bobot_takingorder.push($(this).closest('.question-takingorder').find('.bobot-takingorder').last().val());
			jawaban_bantu_takingorder.push($(this).closest('.question-takingorder').find('.nol-takingorder').last().val());
			jawaban_bantu_takingorder.push($(this).closest('.question-takingorder').find('.satu-takingorder').last().val());
			jawaban_bantu_takingorder.push($(this).closest('.question-takingorder').find('.dua-takingorder').last().val());
			jawaban_bantu_takingorder_kedua = jawaban_bantu_takingorder.join('!@#$');
			jawaban_real_takingorder.push(jawaban_bantu_takingorder_kedua);
			jawaban_bantu_takingorder = [];
			jawaban_bantu_takingorder_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-takingorder')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-servingproduct', function(e){
			
			e.preventDefault();
			
			/*servingproduct*/
			pertanyaan_servingproduct.push($(this).closest('.question-servingproduct').find('.pertanyaan-servingproduct').last().val());
			bobot_servingproduct.push($(this).closest('.question-servingproduct').find('.bobot-servingproduct').last().val());
			jawaban_bantu_servingproduct.push($(this).closest('.question-servingproduct').find('.nol-servingproduct').last().val());
			jawaban_bantu_servingproduct.push($(this).closest('.question-servingproduct').find('.satu-servingproduct').last().val());
			jawaban_bantu_servingproduct.push($(this).closest('.question-servingproduct').find('.dua-servingproduct').last().val());
			jawaban_bantu_servingproduct_kedua = jawaban_bantu_servingproduct.join('!@#$');
			jawaban_real_servingproduct.push(jawaban_bantu_servingproduct_kedua);
			jawaban_bantu_servingproduct = [];
			jawaban_bantu_servingproduct_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-servingproduct')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-complaint', function(e){
			
			e.preventDefault();
			
			/*complaint*/
			pertanyaan_complaint.push($(this).closest('.question-complaint').find('.pertanyaan-complaint').last().val());
			bobot_complaint.push($(this).closest('.question-complaint').find('.bobot-complaint').last().val());
			jawaban_bantu_complaint.push($(this).closest('.question-complaint').find('.nol-complaint').last().val());
			jawaban_bantu_complaint.push($(this).closest('.question-complaint').find('.satu-complaint').last().val());
			jawaban_bantu_complaint.push($(this).closest('.question-complaint').find('.dua-complaint').last().val());
			jawaban_bantu_complaint_kedua = jawaban_bantu_complaint.join('!@#$');
			jawaban_real_complaint.push(jawaban_bantu_complaint_kedua);
			jawaban_bantu_complaint = [];
			jawaban_bantu_complaint_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-complaint')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-billing', function(e){
			
			e.preventDefault();
			
			/*billing*/
			pertanyaan_billing.push($(this).closest('.question-billing').find('.pertanyaan-billing').last().val());
			bobot_billing.push($(this).closest('.question-billing').find('.bobot-billing').last().val());
			jawaban_bantu_billing.push($(this).closest('.question-billing').find('.nol-billing').last().val());
			jawaban_bantu_billing.push($(this).closest('.question-billing').find('.satu-billing').last().val());
			jawaban_bantu_billing.push($(this).closest('.question-billing').find('.dua-billing').last().val());
			jawaban_bantu_billing_kedua = jawaban_bantu_billing.join('!@#$');
			jawaban_real_billing.push(jawaban_bantu_billing_kedua);
			jawaban_bantu_billing = [];
			jawaban_bantu_billing_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-billing')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-thanking', function(e){
			
			e.preventDefault();
			
			/*thanking*/
			pertanyaan_thanking.push($(this).closest('.question-thanking').find('.pertanyaan-thanking').last().val());
			bobot_thanking.push($(this).closest('.question-thanking').find('.bobot-thanking').last().val());
			jawaban_bantu_thanking.push($(this).closest('.question-thanking').find('.nol-thanking').last().val());
			jawaban_bantu_thanking.push($(this).closest('.question-thanking').find('.satu-thanking').last().val());
			jawaban_bantu_thanking.push($(this).closest('.question-thanking').find('.dua-thanking').last().val());
			jawaban_bantu_thanking_kedua = jawaban_bantu_thanking.join('!@#$');
			jawaban_real_thanking.push(jawaban_bantu_thanking_kedua);
			jawaban_bantu_thanking = [];
			jawaban_bantu_thanking_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-thanking')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-cleanliness', function(e){
			
			e.preventDefault();
			
			/*cleanliness*/
			pertanyaan_cleanliness.push($(this).closest('.question-cleanliness').find('.pertanyaan-cleanliness').last().val());
			bobot_cleanliness.push($(this).closest('.question-cleanliness').find('.bobot-cleanliness').last().val());
			jawaban_bantu_cleanliness.push($(this).closest('.question-cleanliness').find('.nol-cleanliness').last().val());
			jawaban_bantu_cleanliness.push($(this).closest('.question-cleanliness').find('.satu-cleanliness').last().val());
			jawaban_bantu_cleanliness.push($(this).closest('.question-cleanliness').find('.dua-cleanliness').last().val());
			jawaban_bantu_cleanliness_kedua = jawaban_bantu_cleanliness.join('!@#$');
			jawaban_real_cleanliness.push(jawaban_bantu_cleanliness_kedua);
			jawaban_bantu_cleanliness = [];
			jawaban_bantu_cleanliness_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-cleanliness')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-prebushing', function(e){
			
			e.preventDefault();
			
			/*prebushing*/
			pertanyaan_prebushing.push($(this).closest('.question-prebushing').find('.pertanyaan-prebushing').last().val());
			bobot_prebushing.push($(this).closest('.question-prebushing').find('.bobot-prebushing').last().val());
			jawaban_bantu_prebushing.push($(this).closest('.question-prebushing').find('.nol-prebushing').last().val());
			jawaban_bantu_prebushing.push($(this).closest('.question-prebushing').find('.satu-prebushing').last().val());
			jawaban_bantu_prebushing.push($(this).closest('.question-prebushing').find('.dua-prebushing').last().val());
			jawaban_bantu_prebushing_kedua = jawaban_bantu_prebushing.join('!@#$');
			jawaban_real_prebushing.push(jawaban_bantu_prebushing_kedua);
			jawaban_bantu_prebushing = [];
			jawaban_bantu_prebushing_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-prebushing')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		}).on('click', '.add-question-parking', function(e){
			
			e.preventDefault();
			
			/*parking*/
			pertanyaan_parking.push($(this).closest('.question-parking').find('.pertanyaan-parking').last().val());
			bobot_parking.push($(this).closest('.question-parking').find('.bobot-parking').last().val());
			jawaban_bantu_parking.push($(this).closest('.question-parking').find('.nol-parking').last().val());
			jawaban_bantu_parking.push($(this).closest('.question-parking').find('.satu-parking').last().val());
			jawaban_bantu_parking.push($(this).closest('.question-parking').find('.dua-parking').last().val());
			jawaban_bantu_parking_kedua = jawaban_bantu_parking.join('!@#$');
			jawaban_real_parking.push(jawaban_bantu_parking_kedua);
			jawaban_bantu_parking = [];
			jawaban_bantu_parking_kedua = '';

			$(this).closest('.question').clone().appendTo($(this).closest('.questions'))

			var last_question = $(this).closest('.questions').find('.question').last()
			var points = last_question.find('.point')

			last_question.find('.input-question').val('')
			last_question.find('.input-reason').val('')

			points.each(function(){
				var except_last_reason = $(this).find('.reason:not(:last)')
				var reasons = $(this).find('.reason')
				if(reasons.length > 1){
					except_last_reason.remove()
				}
			})
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question-parking')

		}).on('click', '.delete-question', function(e){

			e.preventDefault();

			$(this).closest('.question').remove()

		})
		/*END*/
	});
</script>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<h5 class="card-title"><strong>Setup Mystery Guest</strong></h5>

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
							<!-- GREETING -->
							<div class="col-md-6">
								<h6 class="text-uppercase">1. Greeting</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-greeting" id="">
									</div>
								</div>

								<div class="control-group" id="greeting">
									<div class="controls">
										<div class="questions">
											<div class="question question-greeting">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-greeting" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="text" class="form-control input-question bobot-greeting" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-greeting" id="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-greeting" id="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-greeting" id="">
													</div>
												</div>
												<!-- reason -->
												<!-- <div class="point">
													<label for="">Point 1</label>
													<div class="form-row reason">
														<div class="form-group col-md-10">
															<input type="text" class="form-control input-reason">
														</div>
														<div class="form-group col-md-2 align-self-end">
															<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-reason" type="submit">
																<span class="ion-ios-plus-outline"></span>
															</button>
														</div>
													</div>
												</div>
												<div class="point">
													<label for="">Point 2</label>
													<div class="form-row reason">
														<div class="form-group col-md-10">
															<input type="text" class="form-control input-reason">
														</div>
														<div class="form-group col-md-2 align-self-end">
															<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-reason" type="submit">
																<span class="ion-ios-plus-outline"></span>
															</button>
														</div>
													</div>
												</div> -->
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-greeting">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- SEATING -->
							<div class="col-md-6">
								<h6 class="text-uppercase">2. Seating</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="number" class="form-control input-question parameter-seating" id="">
									</div>
								</div>

								<div class="control-group" id="seating">
									<div class="controls">
										<div class="questions">
											<div class="question question-seating">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-seating" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="number" class="form-control input-question bobot-seating" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-seating" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-seating" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-seating" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-seating">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- TAKING ORDER -->
							<div class="col-md-6">
								<h6 class="text-uppercase mt-3">3. Taking Order</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-takingorder" id="">
									</div>
								</div>

								<div class="control-group" id="takingorder">
									<div class="controls">
										<div class="questions">
											<div class="question question-takingorder">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-takingorder" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="text" class="form-control input-question bobot-takingorder" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-takingorder" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-takingorder" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-takingorder" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-takingorder">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- SERVING THE PRODUCT -->
							<div class="col-md-6">
								<h6 class="text-uppercase mt-3">4. Serving The Product</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-servingproduct" id="">
									</div>
								</div>

								<div class="control-group" id="servingproduct">
									<div class="controls">
										<div class="questions">
											<div class="question question-servingproduct">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-servingproduct" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="text" class="form-control input-question bobot-servingproduct" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-servingproduct" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-servingproduct" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-servingproduct" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-servingproduct">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="flexbox pull-right">
								<button class="btn btn-secondary" type="button" id="next-serving">Next</button> 
							</div>
						</div>
						<script>


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

										console.log(pertanyaan_greeting);
										console.log(jawaban_real_greeting);

										/*

										console.log(pertanyaan_seating);
										console.log(jawaban_real_seating);
										console.log(pertanyaan_takingorder);
										console.log(jawaban_real_takingorder);
										console.log(pertanyaan_servingproduct);
										console.log(jawaban_real_servingproduct);
										*/

										/*db.collection('seating1').add({
											bobot: $('.parameter-seating').val(),
											bobotpertanyaan: bobot_seating,
											jawaban: jawaban_real_seating,
											pertanyaan: pertanyaan_seating,
										}).then(function(docRef) {
											console.log('Document seating with ID: ', docRef.id);
										}).catch(function(error) {
											console.log('Error adding document: ', error);
										});

										db.collection('greeting1').add({
											bobot: $('.parameter-greeting').val(),
											bobotpertanyaan: bobot_greeting,
											jawaban: jawaban_real_greeting,
											pertanyaan: pertanyaan_greeting,
										}).then(function(docRef) {
											console.log('Document greeting with ID: ', docRef.id);
										}).catch(function(error) {
											console.log('Error adding document: ', error);
										});

										db.collection('takingOrder1').add({
											bobot: $('.parameter-takingorder').val(),
											bobotpertanyaan: bobot_takingorder,
											jawaban: jawaban_real_takingorder,
											pertanyaan: pertanyaan_takingorder,
										}).then(function(docRef) {
											console.log('Document takingorder with ID: ', docRef.id);
										}).catch(function(error) {
											console.log('Error adding document: ', error);
										});

										db.collection('servingProduct1').add({
											bobot: $('.parameter-servingproduct').val(),
											bobotpertanyaan: bobot_servingproduct,
											jawaban: jawaban_real_servingproduct,
											pertanyaan: pertanyaan_servingproduct,
										}).then(function(docRef) {
											console.log('Document servingproduct with ID: ', docRef.id);
										}).catch(function(error) {
											console.log('Error adding document: ', error);
										});

										$('[href="#complaint"]').tab('show');*/
									});
									} else {
										alert('Please login first');
										window.location.href = '../../../index.php';
									}
								});
							});
						</script>
					</div>

					<div class="tab-pane fade" id="complaint">
						<div class="card-body row">
							<div class="col-md-6">
								<h6 class="text-uppercase">question complaint handling</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="number" class="form-control input-question parameter-complaint" id="">
									</div>
								</div>

								<div class="control-group" id="complaint">
									<div class="controls">
										<div class="questions">
											<div class="question question-complaint">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-complaint" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="number" class="form-control input-question bobot-complaint" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-complaint" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-complaint" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-complaint" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-complaint">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="flexbox pull-right">
								<button class="btn btn-secondary" type="button" id="next-complaint">Next</button> 
								<!-- <button class="btn btn-secondary" data-wizard="prev">Back</button> -->
							</div>
						</div>
						<script>
							$(document).ready(function() {
								firebase.auth().onAuthStateChanged(function (user) {
									if (user) {
										$(document).on('click', '#next-complaint', function(e) {
											e.preventDefault();

												/*console.log(pertanyaan_complaint);
												console.log(jawaban_real_complaint);*/

												db.collection('complaint_handling').add({
													bobot: $('.parameter-complaint').val(),
													bobotpertanyaan: bobot_complaint,
													jawaban: jawaban_real_complaint,
													pertanyaan: pertanyaan_complaint,
												}).then(function(docRef) {
													console.log('Document complaint with ID: ', docRef.id);
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												$('[href="#payment"]').tab('show');
											});
									} else {
										alert('Please login first');
										window.location.href = '../../../index.php';
									}
								});
							});
						</script>
					</div>

					<div class="tab-pane fade" id="payment">
						<div class="card-body row">

							<div class="col-md-6">
								<h6 class="text-uppercase mt-3">1. Billing</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-billing" id="">
									</div>
								</div>

								<div class="control-group" id="billing">
									<div class="controls">
										<div class="questions">
											<div class="question question-billing">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-billing" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="number" class="form-control input-question bobot-billing" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-billing" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-billing" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-billing" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-billing">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<h6 class="text-uppercase mt-3">2. Thanking</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-thanking" id="">
									</div>
								</div>

								<div class="control-group" id="thanking">
									<div class="controls">
										<div class="questions">
											<div class="question question-thanking">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-thanking" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="number" class="form-control input-question bobot-thanking" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-thanking" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-thanking" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-thanking" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-thanking">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="flexbox pull-right">
								<button class="btn btn-secondary" type="button" id="next-payment">Next</button> 
								<!-- <button class="btn btn-secondary" data-wizard="prev">Back</button> -->
							</div>
						</div>
						<script>
							$(document).ready(function() {
								firebase.auth().onAuthStateChanged(function (user) {
									if (user) {
										$(document).on('click', '#next-payment', function(e) {
											e.preventDefault();

												/*console.log(pertanyaan_thanking);
												console.log(jawaban_real_thanking);*/

												db.collection('billing').add({
													bobot: $('.parameter-billing').val(),
													bobotpertanyaan: bobot_billing,
													jawaban: jawaban_real_billing,
													pertanyaan: pertanyaan_billing,
												}).then(function(docRef) {
													console.log('Document billing with ID: ', docRef.id);
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												db.collection('thanking').add({
													bobot: $('.parameter-thanking').val(),
													bobotpertanyaan: bobot_thanking,
													jawaban: jawaban_real_thanking,
													pertanyaan: pertanyaan_thanking,
												}).then(function(docRef) {
													console.log('Document thanking with ID: ', docRef.id);
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});
												$('[href="#review-outlet"]').tab('show');
											});
									} else {
										alert('Please login first');
										window.location.href = '../../../index.php';
									}
								});
							});
						</script>
					</div>

					<div class="tab-pane fade" id="review-outlet">
						<div class="card-body row">
							<div class="col-md-6">
								<h6 class="text-uppercase">1. Pengecekan Kebersihan</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-cleanliness" id="">
									</div>
								</div>

								<div class="control-group" id="cleanliness">
									<div class="controls">
										<div class="questions">
											<div class="question question-cleanliness">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-cleanliness" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="number" class="form-control input-question bobot-cleanliness" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-cleanliness" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-cleanliness" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-cleanliness" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-cleanliness">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<h6 class="text-uppercase">2. Pre-Bushing</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-prebushing" id="">
									</div>
								</div>

								<div class="control-group" id="prebushing">
									<div class="controls">
										<div class="questions">
											<div class="question question-prebushing">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-prebushing" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="number" class="form-control input-question bobot-prebushing" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-prebushing" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-prebushing" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-prebushing" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-prebushing">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<h6 class="text-uppercase mt-3">3. Pengecekan area parkir</h6>
								<hr class="hr-sm mb-2">

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="">Bobot / Parameter (%)</label>
										<input type="text" class="form-control input-question parameter-parking" id="">
									</div>
								</div>

								<div class="control-group" id="parking">
									<div class="controls">
										<div class="questions">
											<div class="question question-parking">
												<!-- question -->
												<div class="form-row">
													<div class="form-group col-md-10">
														<label for="">Question</label>
														<input type="text" class="form-control input-question pertanyaan-parking" id="">
													</div>
													<div class="form-group col-md-2">
														<label for="">Bobot</label>
														<input type="number" class="form-control input-question bobot-parking" id="">
													</div>
												</div>

												<!-- 0 -->
												<div class="form-row">
													<div class="form-group col-md-2 ">
														<label for="">Guideline</label>
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">0</label>
														</div>
													</div>

													<div class="form-group col-md-10 align-self-end">
														<input type="text" class="form-control form-control-sm input-question nol-parking" id="" value="">
													</div>
												</div>

												<!-- 1 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">1</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question satu-parking" id="" value="">
													</div>
												</div>

												<!-- 2 -->
												<div class="form-row">
													<div class="form-group col-md-2 align-self-end">
														<div class="">
															<label class="control-label font-weight-bold" for="ccs-3">2</label>
														</div>
													</div>

													<div class="form-group col-md-10 ">
														<input type="text" class="form-control form-control-sm input-question dua-parking" id="" value="">
													</div>
												</div>
												<!-- add button -->
												<div class="d-flex justify-content-center">
													<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question-parking">
														<span class="ion-ios-plus-outline"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="flexbox pull-right">
								<button class="btn btn-secondary" type="button" id="next-review">Save</button> 
								<!-- <button class="btn btn-secondary" data-wizard="prev">Back</button> -->
							</div>
						</div>
						<script>
							$(document).ready(function() {
								firebase.auth().onAuthStateChanged(function (user) {
									if (user) {
										$(document).on('click', '#next-review', function(e) {
											e.preventDefault();

												/*console.log(pertanyaan_parking);
												console.log(jawaban_real_parking);*/

												db.collection('cleaniness').add({
													bobot: $('.parameter-cleanliness').val(),
													bobotpertanyaan: bobot_cleanliness,
													jawaban: jawaban_real_cleanliness,
													pertanyaan: pertanyaan_cleanliness,
												}).then(function(docRef) {
													console.log('Document cleanliness with ID: ', docRef.id);
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												db.collection('pre-bushing').add({
													bobot: $('.parameter-prebushing').val(),
													bobotpertanyaan: bobot_prebushing,
													jawaban: jawaban_real_prebushing,
													pertanyaan: pertanyaan_prebushing,
												}).then(function(docRef) {
													console.log('Document prebushing with ID: ', docRef.id);
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												db.collection('parking').add({
													bobot: $('.parameter-parking').val(),
													bobotpertanyaan: bobot_parking,
													jawaban: jawaban_real_parking,
													pertanyaan: pertanyaan_parking,
												}).then(function(docRef) {
													console.log('Document parking with ID: ', docRef.id);
												}).catch(function(error) {
													console.log('Error adding document: ', error);
												});

												window.alert('Data setup berhasil dibuat');
												
											});
									} else {
										alert('Please login first');
										window.location.href = '../../../index.php';
									}
								});
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>