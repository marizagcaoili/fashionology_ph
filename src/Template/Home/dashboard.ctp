<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<link rel="stylesheet" href="">



	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>



	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>
	<link rel='stylesheet' href='/front/public/css/dashboard.css'/>

	
</head>
<body ng-controller='UserDashboardController' ng-app='SampleApp'>

	<header class="masthead" style='height:58px;'> <!--background: #232323;-->  
		<img src="/front/public/img/logo-white.png" class="logo" style='width:210px;margin-left:36%;'>

	</header>

	<main class='container_14'>

		<div class='dashboard-flex'>

			<div class='db-right'>

				<div class='top-cover'>

					<div class='top-cover-wrap'>
<!-- 
					<div class='img-cover'>
						<img src="" alt="">
					</div>
				-->
				<div class='cover-content'>
					<p class='db-p'>Dashboard </p>
				</div>


			</div>

		</div>

		<div class='db-content'>
			<div class='sub-nav-select'>
				<ul>
					<a class='account'><li>My Account</li></a>

					<a class='wishlist active'><li>Wishlist</li></a>

					<a href='#'><li>Closet</li></a>


					<a href='#'><li>Order History</li></a>

					
					<a class='track'><li>Track my Order</li></a>


					<a href='#'><li>Get Help</li></a>

					<a href='/' style='margin-left:240px;border-bottom: 4px solid;'><li>Back to Store ></li></a>

				</ul>
			</div>

			<div class='db-sub-content out myaccount'>
				<div class='info-flex'>

					<div class='info-left'>
						<ul class='info-ul-left'>

							<a href='#' class='active-a'><li>Summary of Info</li></a>
							<a href='#' class='active-a'><li>Edit Account Information</li></a>
							<a href='#'><li>Edit Shipping Address</li></a>

						</ul>
					</div>

					<div class='info-right'>
						<div class='info-right-wrap'>
							
							<div class='title-info-right'>
								<p style='color:#193441;font-size: 26px;'>Summary of Information</p>
							</div>

							<div class='info-right-field' style='position: relative;top:28px;'>
								<div class='info-right-flex-field'>
									<div class='info-a-flex-field'>
										<p>First Name</p>
										<p>{{userInfos.account_fname}}</p>
										
									</div>
									<div class='info-a-flex-field'>
										<p>Last Name</p>
										<p>{{userInfos.account_lname}}</p>
									</div>
								</div>

								<div class='info-right-flex-field'>
									<div class='info-a-flex-field'>
										<p>Birthday</p>
										<p>{{userInfos.account_birthday}}</p>
										
									</div>
									<div class='info-a-flex-field'>
										<p>Gender</p>
										<p>Male</p>
									</div>
								</div>

								<div class='info-right-flex-field'>
									<div class='info-a-flex-field'>
										<p>Username</p>
										<p>{{userInfos.account_username}}</p>
										
									</div>
									<div class='info-a-flex-field'>
										<p>Password</p>
										<p>{{userInfos.account_password}}</p>
									</div>
								</div>

								<div class='info-right-flex-field'>
									<div class='info-a-flex-field'>
										<p>Email Address</p>
										<p>{{userInfos.account_email}}</p>
										
									</div>
									
								</div>
							</div>


							<div class='shipping-wrap'>
								<div class='title-info-right' style='margin-bottom: 10px;'>
									<p style='color:#2c3e50;font-size: 22px;'>Shipping Details</p>
								</div>

								<div class='title-info-right' style='position:relative;top:10px;border-bottom: 1px dashed #cdcdcd;margin-bottom: 20px;'>
									<p style='font-size: 18px;color:#778691;'>Primary Address</p>
								</div>

								<div style='position: relative;top:14px;'>

									<div class='info-right-field' >
										<div class='info-right-flex-field' >
											<div class='info-a-flex-field'>
												<p>First Name</p>
												<p>{{userInfos.shipping.shipping_fname}}</p>

											</div>
											<div class='info-a-flex-field'>
												<p>Last Name</p>
												<p>{{userInfos.shipping.shipping_lname}}</p>
											</div>
										</div>

									</div>


									<div class='info-right-field'>
										<div class='info-right-flex-field'>
											<div class='info-a-flex-field'>
												<p>City</p>
												<p>{{userInfos.shipping.shipping_city}}</p>

											</div>
											<div class='info-a-flex-field'>
												<p>Zip Code</p>
												<p>{{userInfos.shipping.shipping_zipcode}}</p>
											</div>
										</div>

									</div>

									<div class='info-right-field'>
										<div class='info-right-flex-field'>
											<div class='info-a-flex-field'>
												<p>Landmark</p>
												<p>{{userInfos.shipping.shipping_landmark}}</p>

											</div>
											<div class='info-a-flex-field'>
												<p>Contact No.</p>
												<p>09223660550</p>
											</div>
										</div>

									</div>


									<div class='info-right-field'>
										<div class='info-right-flex-field'>
											<div class='info-a-flex-field'>
												<p>Address</p>
												<p>{{userInfos.shipping.shipping_address}}</p>

											</div>

										</div>

									</div>

								</div>


								<div class='title-info-right' style='position:relative;top:38px;border-bottom: 1px dashed;color:#cdcdcd;margin-bottom: 34px;'>
									<p style='font-size: 18px;color:#778691;'>Secondary Address</p>
								</div>

								<div style='position: relative;top:28px;'>

									<div class='info-right-field' >
										<div class='info-right-flex-field' >
											<div class='info-a-flex-field'>
												<p>First Name</p>
												<p>Mariz Thel</p>

											</div>
											<div class='info-a-flex-field'>
												<p>Last Name</p>
												<p>Agcaoili</p>
											</div>
										</div>

									</div>


									<div class='info-right-field'>
										<div class='info-right-flex-field'>
											<div class='info-a-flex-field'>
												<p>City</p>
												<p>Makati</p>

											</div>
											<div class='info-a-flex-field'>
												<p>Zip Code</p>
												<p>12351</p>
											</div>
										</div>

									</div>

									<div class='info-right-field'>
										<div class='info-right-flex-field'>
											<div class='info-a-flex-field'>
												<p>Landmark</p>
												<p>Red Roof</p>

											</div>
											<div class='info-a-flex-field'>
												<p>Contact No.</p>
												<p>09223660550</p>
											</div>
										</div>

									</div>


									<div class='info-right-field'>
										<div class='info-right-flex-field'>
											<div class='info-a-flex-field'>
												<p>Address</p>
												<p>2362 C. Marconi St. Brgy. Palanan</p>

											</div>

										</div>

									</div>

								</div>





							</div>
						</div>

					</div>
				</div>
			</div>


			<div class='db-sub-content in mywishlist'>

				<?php include LAYOUT_DIR . 'front-wishlist.ctp'; ?>


			</div>


			<div class='db-sub-content in mytrack' style='border:none;height:500px;'>

				<?php include LAYOUT_DIR . 'front-track.ctp'; ?>


			</div>




		</div>	

	</div>

</div>

</div>

</main>


<script>
	$(document).ready(function(){
		$('.in	').show();
		$('.out').hide();
		$('.mytrack').hide();

	})



	$('.account').click(function(){
		$('.myaccount').show();
		$('.mywishlist').hide();
		$('.mytrack').hide();

	})


	$('.wishlist').click(function(){
		$('.myaccount').hide();
		$('.mywishlist').show();
		$('.mytrack').hide();

	})

	$('.track').click(function(){
		$('.myaccount').hide();
		$('.mywishlist').hide();
		$('.mytrack').show();

	})
</script>


</body>
</html>