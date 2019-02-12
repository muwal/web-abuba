<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var $tabs = $('.nav-tabs li');

		$('#prevtab').on('click', function() {
			$tabs.filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');
		});

		$('#nexttab').on('click', function() {
			$tabs.filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
		});
	});

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

		}).on('click', '.add-question', function(e){
			
			e.preventDefault();

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
			


			$(this).html('<span class="ion-ios-trash"></span>').addClass('delete-question').removeClass('add-question')

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
				<div data-provide="wizard" data-navigateable="true">
					<!-- Nav tabs -->
					<ul class="nav nav-process nav-process-circle">
						<li class="nav-item">
							<span class="nav-title">Serving Time</span>
							<a class="nav-link" data-toggle="tab" href="#serving-time"></a>
						</li>
						<li class="nav-item">
							<span class="nav-title">Complaint</span>
							<a class="nav-link" data-toggle="tab" href="#complaint"></a>
						</li>
						<li class="nav-item">
							<span class="nav-title">Payment</span>
							<a class="nav-link" data-toggle="tab" href="#payment"></a>
						</li>
						<li class="nav-item">
							<span class="nav-title">Review Outlet</span>
							<a class="nav-link" data-toggle="tab" href="#review-outlet"></a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade active show" id="serving-time">
							<div class="card-body row">
								<div class="col-md-6">
									<h6 class="text-uppercase">Serving</h6>
									<hr class="hr-sm mb-2">

									<div class="form-group">
										<label>Drinks</label>
										<input type="text" class="form-control" data-provide="timepicker" data-show-meridian="false">
									</div>

									<div class="form-group">
										<label>Juice</label>
										<input type="text" class="form-control" data-provide="timepicker" data-show-meridian="false">
									</div>

									<div class="form-group">
										<label>Appetizer</label>
										<input type="text" class="form-control" data-provide="timepicker" data-show-meridian="false">
									</div>
								</div>


								<div class="col-md-6">
									<h6 class="text-uppercase">&nbsp;</h6>
									<hr class="hr-sm mb-2">

									<div class="form-group">
										<label>Main Couse</label>
										<input type="text" class="form-control" data-provide="timepicker" data-show-meridian="false">
									</div>

									<div class="form-group">
										<label>Dessert</label>
										<input type="text" class="form-control" data-provide="timepicker" data-show-meridian="false">
									</div>
								</div>
								<!-- PARKING -->
								<div class="col-md-6">
									<h6 class="text-uppercase">1. Parking</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="parking">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_parking">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- TOILET -->
								<div class="col-md-6">
									<h6 class="text-uppercase">2. Toilet</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="toilet">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_toilet">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- WASHTAFEL -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">3. Washtafel</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="washtafel">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_washtafel">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- GREETING -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">4. Greeting</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="greeting">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_greeting">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
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
									<h6 class="text-uppercase mt-3">5. Seating</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="seating">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_seating">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
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
									<h6 class="text-uppercase mt-3">6. Taking Order</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="takingorder">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_takingorder">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- SERVING DRINKS -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">7. Serving Drinks</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="servingdrinks">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_servingdrinks">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- SERVING STARTER -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">8. Serving Starter</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="servingstarter">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_servingstarter">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- SERVING THE MAIN COURSE -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">9. Serving The Main Course</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="servingcourse">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_servingcourse">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- DONENES -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">10. Donenes</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="donenes">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_donenes">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- FOLLOWING UP AFTER THE MAIN COURSE -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">11. FOLLOWING UP AFTER MAIN COURSE</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="followup">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_followup">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- OFFERING DESSERT -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">12. Offering Dessert</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="offeringdessert">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="offeringdessert">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- DELIVERING DESSERT -->
								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">13. Delivering Dessert</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="deliveringdessert">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="deliveringdessert">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="complaint">
							<div class="card-body row">
								<div class="col-md-6">
									<h6 class="text-uppercase">Mock Complaint</h6>
									<hr class="hr-sm mb-2">
									<!-- Category -->
									<div class="point">
										<label for="">Category</label>
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
										<label for="">Service</label>
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
								</div>

								<div class="col-md-6">
									<h6 class="text-uppercase">&nbsp;</h6>
									<hr class="hr-sm mb-2">

									<div class="point">
										<label for="">Product</label>
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
								</div>

								<div class="col-md-6">
									<h6 class="text-uppercase mt-2">Question Complaint Handling</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="complaint">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_complaint">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="payment">
							<div class="card-body row">
								<div class="col-md-6">
									<h6 class="text-uppercase">1. Offering the Bills</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="offeringbills">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_offeringbills">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<h6 class="text-uppercase">2. Clearing Table</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="clearingtable">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_clearingtable">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">3. Taking Payment and Thanking</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="takingpayment">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_takingpayment">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="review-outlet">
							<div class="card-body row">
								<div class="col-md-6">
									<h6 class="text-uppercase">1. Table Setting</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="tablesetting">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_tablesetting">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<h6 class="text-uppercase">2. Kebersihan dan Kerapihan Outlet</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="kebersihanoutlet">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_kebersihanoutlet">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<h6 class="text-uppercase mt-3">3. Kenyamanan Suasana Outlet</h6>
									<hr class="hr-sm mb-2">

									<div class="control-group" id="suasanaoutlet">
										<div class="controls">
											<div class="questions">
												<div class="question">
													<!-- question -->
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="">Question</label>
															<input type="text" class="form-control input-question" id="question_suasanaoutlet">
														</div>
													</div>
													<!-- reason -->
													<div class="point">
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
													</div>
													<!-- add button -->
													<div class="d-flex justify-content-center">
														<button class="btn btn-icons btn-rounded btn-outline-info btn-add add-question">
															<span class="ion-ios-plus-outline"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="flexbox">
							<button class="btn btn-secondary" data-wizard="prev">Back</button>
							<button class="btn btn-secondary" data-wizard="next">Next</button>
							<button class="btn btn-primary d-none" data-wizard="finish">Finish</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>