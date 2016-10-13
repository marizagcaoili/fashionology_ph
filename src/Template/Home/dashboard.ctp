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

						<div class='cover-content'>
							<p class='db-p'>Dashboard </p>
						</div>


					</div>

				</div>

				<div class='db-content'>
					<div class='sub-nav-select'>
						<ul style='height:100%;'>
							<a ng-click='account()' class='account active'><li>My Account</li></a>

							<a ng-click='wlist()' class='wishlist'><li>Wishlist</li></a>

					

							<a ng-click='track()' class='track'><li>Track my Order</li></a>


							<a href='/' style='margin-left:440px;border-bottom: 4px solid;'><li>Back to Store ></li></a>

						</ul>
					</div>

					<div class='db-sub-content out myaccount'>
						<div class='info-flex'>

							<div class='info-left'>
								<ul class='info-ul-left'>

									<a  ng-click='summary()' style='font-family: Moon;color:#fff;' class='active-a' ><li style='background:#333;padding: 10px;'>Summary of Info</li></a>
									<a ng-click='editaccount()' style='font-family: Moon;color:#333;font-size: 16px;font-weight: bold;' class='active-a'><li  style='padding: 10px;'>Edit Account Information</li></a>
									<a ng-click='editshipping()' style='font-family: Moon;font-weight:bold;color:#333;font-size: 16px;' class='active-a'><li  style='padding: 10px;'>Edit Delivery Address</li></a>

								</ul>
							</div>

							<div class='info-right sumOfInfo' >

								
								<?php include LAYOUT_DIR . 'front-summary.ctp'; ?>


							</div>

							<div class='info-right editAccount' style='display: none;'>

								<?php include LAYOUT_DIR . 'front-editaccout.ctp'; ?>

							</div>


							<div class='info-right editshipping' style='display: none;'>

							<?php include LAYOUT_DIR . 'front-editshipping.ctp'; ?>

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
		$('.in	').hide();
		$('.out').show();
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