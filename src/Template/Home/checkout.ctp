	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Checkout</title>

		<!--Core CSS-->
		<?php include LAYOUT_DIR . 'front-css.ctp'; ?>

		<!--script-->

		<?php include LAYOUT_DIR . 'front-script.ctp'; ?>
		
		<script src='/front/public/js/jquery.js'></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link href="/front/public/switch/bootstrap-switch.css" rel="stylesheet">
		<script src="/front/public/switch/bootstrap-switch.js"></script>

		<link rel='stylesheet' href='/front/public/css/checkout.css' />


	</head>
	<body ng-app="SampleApp" ng-controller="testController">
		
		

		<header class="masthead"  style='background: #fff;'> <!--background: #232323;-->  

		</header>


		<main class='container_14'>

			<div class='checkout-wrap'>
				<div>

					<div class='checkout-header'>
						<p><span> <i class="fa fa-user" aria-hidden="true"></i></span> sign in <span class='notespan' style='font-size: 20px;font-color:#111;margin-left:36px;'>Please provide an email address and a password below to continue placing order. </span></p>

					</div>

					<div class='sec-a collapse' ng-controller='LoginController' style='margin-bottom: 1px;' >

						<div class='signin logmein'>


							<div class='signin-flex logcheckoutin' id='signin'>

								<div class='signin-a' style='border-right:1px solid;'>

									<div>

									</div>

									<div  class='signin-form' style='margin-top:70px;'>

										<div class='signin-form-a'>
											<p style='color:#333;font-family:Moon;'>Email Address</p>
											<input type='text' id='username' class='signin-input'>
										</div>

										<div class='signin-form-a'>
											<p style='font-family: Moon;'>Password</p>
											<input type='password' id='password' class='signin-input'>
										</div>


										<div class='signin-form-a'>
											<!-- 									<button type='button' class='btn-continue-a' data-toggle="collapse" data-target="#delivery" ng-click='test()'>CONTINUE</button> -->

											<buon type='button' class='btn-continue-a' ng-click='login()'>LOG ME IN</button>
											</div>
										</div>


									</div>

									<div class='signin-a'>

										<div class='register-or'>
											<p>OR</p>


										</div>

										<div class='register-form'>	
											<div class='register-p'>
												<p class='register-me'>Register a new account</p>
												<p class='note-please'>Please note that once you already registered your account you may now be able to store datas and place an order.</p>
											</div>

											<div>
												<button class='reg-now' ng-click='register()'>create an account</button>
											</div>
										</div>

										<div>
										</div>

									</div>

								</div>

							</div>



						<div class='signin welcome-user'>
							<div class='userDetails-welcome' >
								<p class='welcomeback'>Welcome back {{userInfos.account_username}} !</p>
								<p style='font-family: Moon;font-size: 18px;font-weight: bold;margin-top:-10px;color:#555555;'>you may now be able to place an order</p>

								<div class='userDetails-detail'>
									<p class='userDetails-p'>Your Email Address</p>
									<p class='userDetails-p' style='font-size: 20px;font-family: Coves;color:#333;'>{{userInfos.account_email}}</p>

									<div style='margin-top:16px;'>
										<p class='userDetails-p'>full name</p>
										<p class='userDetails-p' style='text-transform:uppercase;font-size: 18px;font-family:Moon;color:#333;'>{{userInfos.account_fname}} {{userInfos.account_lname}}</p>
									</div>


									<button type='button'data-toggle="collapse" data-target="#delivery" ng-click='seca()' class='btn-continue-a'>CONTINUE</button>

								</div>
							</div>
						</div>

					</div>

				</div>


				<div>

					<div class='checkout-header' style='border-top:solid 1px #cdcdcd;'>

						<p><span ><i class="fa fa-map-marker" aria-hidden="true"></i></span> delivery address </p>
					</div>

					<div class='sec-b collapse in' style='margin-bottom: 1px;'>

						<div class='billing-info'>

							<div >
								<div class='title-addrs'>
									<!-- <p>Billing Information</p>--></div>

									<div class='bill-flex'>

										<div class='each-bill-flex'>

											<div class='menu-bar'>
												<p><span class='bill-title'>Billing Information</span><a  data-toggle="modal" data-target="#myModal"><span>Edit <i class="fa fa-pencil" aria-hidden="true"></i></span></a> <a href='#' class='delete'><span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></p>
											</div>

											<div class='info-shipment'  >



												<div class='info-fields' >

													<div class='field-a'>
														<p>First Name</p>
														<p style='text-transform: capitalize;'>{{userInfos.shipping.shipping_fname}} </p>
													</div>


													<div class='field-a'>
														<p>Last Name</p>
														<p style='text-transform: capitalize;'>{{userInfos.shipping.shipping_lname}} </p>
													</div>

												</div>

												<div class='info-fields'>

													<div class='field-a'>
														<p>Contact No.</p>
														<p>{{userInfos.shipping.shipping_contact}} </p>
													</div>


													<div class='field-a'>
														<p>Landmark</p>
														<p>{{userInfos.shipping.shipping_landmark}} </p>
													</div>

												</div>

												<div class='info-fields'>

													<div class='field-a'>
														<p>City</p>
														<p style='text-transform: capitalize;'>{{userInfos.shipping.shipping_city}} </p>
													</div>


													<div class='field-a'>
														<p>Postal Code</p>
														<p>{{userInfos.shipping.shipping_zipcode}} </p>
													</div>

												</div>


												<div class='info-fields' >

													<div class='field-a'>
														<p>Address</p>
														<p>{{userInfos.shipping.shipping_address}} </p>
													</div>



												</div>



											</div>



										</div>



									</div>

									<button class='proceed btn-bill' ng-click='delivery()' >Proceed <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
									<div>

									</div>
								</div>
							</div>

							<!--end class-->
						</div>

						<div style='border-top:solid 1px #dcdcdc;' >
							<div class='checkout-header'>

								<p><span><i class="fa fa-key" aria-hidden="true"></i></span> mode of payment</p>
							</div>


							<div class='sec-c collapse in' id='method'>

								<div class='select-grp'>


									<div class='select-grp-header'>
										<p>Please select your mode of payment below:</p>
									</div>

									<div class='select-grping'>
										<ul>
											<li>
												<div class='select-div' data-toggle="modal" data-target="#deliverySelect">

													<div class='cash-on'>

														<div class='cash-desc'>
															<p>Cash on Delivery</p>
														</div>

														<div class='line'></div>

														<div class='under-desc' style='border:none;'>
															<p>Please note that your items will be deliver right on your doorstep.</p>
														</div>

													</div>

												</div>
											</li>


											<li><div class='select-div' data-toggle="modal" data-target="#branchSelect">

												<div class='cash-on'>
													<div class='cash-desc'>
														<p>Pick Up</p>
													</div>
													<div class='line'>
													</div>


													<div class='under-desc pickup-time' style='border:none;'>
														<div class='under-desc-flex' style='border:none;'>

															<div class='flexible-a' style='border:none;'>
																<p><b>TIME OF PICKUP</b></p>
																<p>9:00 AM</p>
															</div>

															<div class='flexible-a'>
																<p><b>DATE OF PICKUP</b></p>
																<p>10.10.16</p>
															</div>

														</div>
													</div>
												</div>
											</div>


										</li>
									</ul>


								</div>


								<button class='btn-continue-a btn-o' style='margin-top: -2px;' data-toggle="collapse" data-target="#reviewplace" ng-click='secD()'>Continue</button>

							</div>


						</div>


					</div>


					<div style='border-top:solid 1px #dcdcdc;'>
						<div class='checkout-header'>
							<p><span> <i class="fa fa-shopping-bag" aria-hidden="true"></i></span> review and place order</p>
						</div>


						<div class='sec-d collapse in ' id='reviewplace'  ng-init='total=0'>

							<div class='flex-set'>

								<div class='left-flex'>
									<ul>
										<li ng-repeat='item in item track by $index'>
											<div class='each-of-item'>
												<img src='{{item.file_key}}'>

												<div class='each-of-detail'>
													<p class='itemname'>{{item.item.item_name}}</p>
													<p class='check-desc'>{{item.item.item_description}}</p>
													<p class='check-desc' ng-init="$parent.total = $parent.total + (item.item.item_srp * cart_items_quantity[$index])" ><b>Quantity:</b> {{cart_items_quantity[$index]}}</p>

													<div class='close-x'>
														<p><i class="fa fa-trash-o" aria-hidden="true"></i></p>
													</div>
												</div>


											</div>
										</li>


									</ul>
								</div>



								<div class='right-flex'>

									<div class='total-menu'>

										<div class='total-this-menu'>
											<div class='total-this-flex-menu'>
												<div class='total-direction'>
													<div class='total-content-direction'>
														<p style='font-weight:bold;'>sub total</p>
														<p style='font-weight:bold;'>shipping fee</p>
														<p style='font-weight:bold;'>VOUCHER</p>
													</div>
												</div>

												<div class='total-this-direction'>
													<div class='total-content-direction' style='padding-left:10px;'>
														<p style='color:#464646;text-align: left;font-family:Moon;font-weight: bold;'>PHP {{total}}.00</p>
														<p style='color:#464646;text-align: left;font-family:Moon;font-weight: bold;'>NO FEE</p>
														<p style='color:#464646;text-align: left;font-family:Moon;font-size: 18px;font-weight: bold;'>0.00 %</p>
													</div>

												</div>
											</div>

										</div>

										<div class='total-this-menu' style='height:46px;'>

											<div class='total-this-flex-menu'>
												<div class='total-direction'>
													<p class='total-grand-direction'>grand total</p>
												</div>

												<div class='total-this-direction'>
													<p class='total-grandp-direct'>PHP {{total}}.00</p>
												</div>
											</div>

										</div>

									</div>

									<div class='total-menu' style='height:118px;'>
										<button type="" class='place-btn' ng-click='nextStep();email()'>PLACE MY ORDER</button>
										<button type="" class='place-btn' style='margin-right: 10px;'ng-click='backToStore()'>BACK TO STORE  </button>
									</div>
<!-- 
									<div class='btn-this'>
										<button class='order-now'>ORDER NOW</button>
									</div> -->



								</div>

							</div>


						</div>
					</div>

					<div>
						<div class='sec-e'>
						</div>
					</div>

				</div>


				<!-- Start Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content" ng-controller='LoginController'>
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">

								</button>
								<h4 class="modal-title" style='color:#898989;'>Edit Information</h4>
							</div>
							<div class="modal-body" >
								<div class='edit-info' >

									<div class='info-fields' >

										<div class='field-a'>
											<p>First Name</p>
											<p><input type='text' id='fname' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_fname}} '></p>
										</div>


										<div class='field-a'>
											<p>Last Name</p>
											<p><input type='text' id='lname' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_lname}} '></p>
										</div>

									</div>

									<div class='info-fields' >

										<div class='field-a'>
											<p>Contact No.</p>
											<p><input type='text' id='contact' style='height:40px;width:250px;' value='{{userInfos.shipping.shipping_contact}} '></p>
										</div>


										<div class='field-a'>
											<p>Landmark</p>
											<p><input type='text' id='landmark' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_landmark}} '></p>
										</div>

									</div>


									<div class='info-fields' >

										<div class='field-a'>
											<p>City</p>
											<p><input type='text' id='city' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_city}} '></p>
										</div>


										<div class='field-a'>
											<p>Postal Code</p>
											<p><input type='text' id='postal' style='height:40px;width:250px;' value='{{userInfos.shipping.shipping_zipcode}} '></p>
										</div>

									</div>


									<div class='info-fields' >

										<div class='field-a'>
											<p>Address</p>
											<p><input type='text' id='address' style='height:40px;width:95.4%;text-transform: uppercase;' value='{{userInfos.shipping.shipping_address}} '></p>
										</div>

									</div>




								</div>


							</div>
							<div class="modal-footer">

								<button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='updateData(userInfos.shipping.shipping_id)'>Save</button>
								<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!--  End Modal -->



				<!-- Sart Modal -->
				<div class="modal fade" id="branchSelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content" style='padding: 0;'>
							<div class="modal-header">
								<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

								</button>
								<h4 class="modal-title" style='color:#898989;'>SPECIFY DATE AND TIME OF PICK UP</h4> -->
							</div>
							<div class="modal-body" style='height:200px;'>


								<div class='setdate-wrap'>
									<div class='setdatewrap-a'>
										<p><b>Note</b></p>
										<p style='margin-top: 6px;'>Take note that we only accept pick ups only weekdays. Between 9AM to 10PM as part of our rules and regulations. </p>
									</div>
									<div class='setdatewrap-a' style='margin-top: 10px;'>
										<p><b>Time of Pick Up</b></p>
										<div class='timeof'>
											<div class='timeof-flex'>
												<div class='each-timeof'>
													<select class='timeof-select' id='hours'>
														<option>11 :</option>
														<option>12 :</option>
														<option>04 :</option>
													</select>
												</div>
												<div class='each-timeof'>
													<select class='timeof-select'  id='minutes'>
														<option>  30</option>
														<option>  00</option>
														<option>  20</option>
													</select>
												</div>
												<div class='each-timeof'>
													<select class='timeof-select' id='format'>
														<option>  AM</option>
														<option>  PM</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>


							</div>
							<div class="modal-footer">

								<button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='setSchedule()'>Set Schedule</button>
								<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!--  End Modal -->

				<!--start modal-->

				<div class="modal fade" id="deliverySelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content" style='padding: 0;'>
							<div class="modal-header">
								<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

								</button>
								<h4 class="modal-title" style='color:#898989;'>SPECIFY DATE AND TIME OF PICK UP</h4> -->
							</div>
							<div class="modal-body" style='height:200px;'>


								<div class='setdate-wrap'>
									<div class='setdatewrap-a'>
										<p><b>Note</b></p>
										<p style='margin-top: 6px;'>Please kindly specify the date of delivery. </p>
									</div>
									<div class='setdatewrap-a' style='margin-top: 10px;'>
										<p><b>Date of Delivery</b></p>
										<div class='timeof'>
											<div class='timeof-flex'>
												<div class='each-timeof'>
													<input type='date' class='timeof-select' style='width: 250px;' id='date'>
												</div>
											</div>
										</div>
									</div>
								</div>


							</div>
							<div class="modal-footer">

								<button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='setDelivery()'>Set Schedule</button>
								<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!--  End Modal -->





			</main>


		</body>
		<script>
			$("[name='my-checkbox']").bootstrapSwitch();

			$(".collapse").collapse();

			$(document).ready(function(){


				$('.each-branch').click(function(){
					$('branches_name').show();
				});
				// $('#signin').hide();


				$('.btn-bill').click(function(){

				})

			


			});



			$('.select-div').click(function(){
				$(this).addClass('shadow');
			})
		</script>
		</html>