<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact Us</title>
	<link rel="stylesheet" href="">
	
	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>

<!-- 	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>

	<style>
	#mapid { height: 180px; }
	</style>
-->

<link rel="stylesheet" href="/front/public/css/contact-us.css" />

</head>
<body ng-app='SampleApp' ng-controller='InquiryController'>
	<script>



		var bacoor;
		var molino;
		var alabang;
		var imus;


		function initMap() {
			bacoor = new google.maps.Map(document.getElementById('bacoor'), {
				center: {lat: 14.4369242, lng: 120.9635337},
				zoom: 8
			});

			molino = new google.maps.Map(document.getElementById('molino'), {
				center: {lat: 14.3976093, lng: 120.9649388},
				zoom: 8
			});

			imus = new google.maps.Map(document.getElementById('imus'), {
				center: {lat: 14.4004079, lng: 120.9014714},
				zoom: 8
			});

			alabang = new google.maps.Map(document.getElementById('alabang'), {
				center: {lat: 14.423842, lng: 121.0278303},
				zoom: 8
			});

		}


		function loadMap(){

			if($(window).scrollTop()>300){
				console.log('as');

			}
		}

		loadMap();
		

	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6RQk8Zrx3lV-JfvsjumPnoHkc9KxEJq8&callback=initMap"
	async defer></script>



	<header class="masthead" id='sticker'>
		<img src="/front/public/img/logo-black.png" class="logo" style='width:210px;'>
		<nav class="nav-a">
			<ul>
				<a  href="/">
					<li>home </li>
				</a>
				<a class='revealcategory' href='/clothing'>
					<li>clothing <i class="fa fa-angle-down category-show" aria-hidden="true"></i></li>
				</a>
				<a href="/load/canvas">
					<li>mix n match</li>
				</a>
				<a style="color:#a8a8a8;" href="/locations">
					<li>contact</li>
				</a>
			</ul>
		</nav>
		<nav class="nav-b" >
			<ul>
				<?php include LAYOUT_DIR . 'user_actions_black.ctp'; ?>
				<a class='cart'href="/checkout" style='color:#111;'>
					<li><i class="fa fa-shopping-cart"  aria-hidden="true"></i></li>
				</a>
				<a class="count-cart" style="position:absolute;
				font-size:8px;
				padding: 4px 8px;
				border-radius:50%;
				background: #e74c3c;" ng-if='cart_items_count > 0'>
				<li>{{cart_items_count}}</li>
			</a>
		</ul>
	</nav>
</header>


<main class='container_14' style='position: relative;top:54px;'>


	<div class='contact-section'>
		<div class='left-contact'>
			
			<div class='contact-form'>
				
				<div class='contact-header'>
					<p>Send us a Message.</p>
					<p>We would love to hear a concern from you. Kindly include all the asked detials below.
						All the fields below are required.</p>
					</div>

					<div class='contact-content-form'>

						<section class='contact-flex' style='position: relative;top:6px;width:90%;height:auto;'>
							<section class='contact-a'>
								<p>Place your Name</p>
								<input type='text' style='border:none;background: transparent;border-bottom: 1px solid;width:80%;' id='name'>
							</section>
							<section class='contact-a'>
								<p> Contact No.</p>
								<input type='text' style='border:none;background: transparent;border-bottom: 1px solid;'id='contact'>
							</section>
						</section>


						<section class='contact-flex' style='position:relative;top:10px;width:90%;height:auto;'>
							<section class='contact-a'>
								<p>Email Address</p>
								<input type='text' style='border:none;width:80%;background: transparent;border-bottom: 1px solid;' id='email'>
							</section>
							<section class='contact-a'>
								<p>Place a subject</p>
								<input type='text' style='border:none;background: transparent;border-bottom: 1px solid;' id='subject'>
							</section>
						</section>

						<section class='contact-flex' style='height:34.5%;position: relative;top:10px;width:90%;'>
							<section class='contact-a'>
								<p>Enter your message </p>
								<textarea style='border:none;background:transparent;border-bottom:1px solid;width:100%;height:92%;'name="" id='message'></textarea>
							</section>
						</section>

						<section class='contact-flex' style='position: relative;top:64px;width:90%;height:auto;'>
							<section class='contact-a'>
								<button ng-click='inquiry();emailInquiry()' class='send-inquiry'>SEND INQUIRY <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							</section>
							
						</section>



					</div>


				</div>

				<div class='loading-bar loada' style='display:none;border-bottom:1px solid #cdcdcd;width:70%;margin-left:80px;margin-top: 160px;'>
				
				<p style='font-family: Moon;font-size: 28px;padding-top:6px;padding-left:8px;font-weight: bold;'>Sending Email... <i class="fa fa-paper-plane-o" aria-hidden="true"></i></p>

				</div>

				<div class='loading-bar loadb' style='border-bottom:1px solid #cdcdcd;width:70%;display:none;margin-left:80px;margin-top: 160px;'>
				
				<p style='font-family: Moon;font-size: 28px;padding-top:6px;padding-left:8px;font-weight: bold;'>Thank you for inquiring. We will send a reply to you within 48 hours. <i class="fa fa-mail" aria-hidden="true"></i></p>

				</div>



			</div>
			<div class='right-contact' style='border-left:1px solid #cdcdcd	;'></div>
		</div>


		<div class='locator-section' style='border-top:1px solid #cdcdcd;'>
			<div class='locator-left'>


				<div class='header-locator'>
					<p>Look in to fashionology branches.</p>
				</div>

				<div class='branch-wrap'>

					<div class='branch-name'>
						<p>Molino Branch <i class="fa fa-map-marker" aria-hidden="true"></i></p>
					</div>

					<div class='branch-address'>
						<p>{{contents.molino_address}}</p>
					</div>

					<div class='branch-address'>
						<p><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp; {{contents.molino_number}} &nbsp; | &nbsp;{{contents.molino_email}}</p>
					</div>

					<div class='store-wrap'>
						<p>Opening Hours</p>

					</div>
					<div style='position: relative;top:30px;'>

						<div class='store-opened'>
							<p><b>Weekdays:</b> &nbsp; {{contents.molino_weekdays}} 
								<span style='position: relative;left:100px;'>(Mon,Tues,Wed,Thurs,Fri)</span></p>
							</div>
							<div class='store-opened'>
								<p><b>Weekends:</b> &nbsp;{{contents.molino_weekends}} </p>
							</div>

						</div>


					</div>

				</div>

				<div class='locator-right'>

					<div id="molino" style='height: 100%;'></div>
				</div>





			</div>

			<div class='locator-section'>


				<div class='locator-left'>


					<div class='branch-wrap'>

						<div class='branch-name'>
							<p>Bacoor Branch <i class="fa fa-map-marker" aria-hidden="true"></i></p>
						</div>

						<div class='branch-address'>
							<p>{{contents.bacoor_address}}</p>
						</div>

						<div class='branch-address'>
							<p><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp; {{contents.bacoor_number}} &nbsp; | &nbsp;{{contents.bacoor_email}}</p>
						</div>

						<div class='store-wrap'>
							<p>Opening Hours</p>

						</div>
						<div style='position: relative;top:30px;'>

							<div class='store-opened'>
								<p><b>Weekdays:</b> &nbsp; {{contents.bacoor_weekdays}}
									<span style='position: relative;left:100px;'>(Mon,Tues,Wed,Thurs,Fri)</span></p>
								</div>
								<div class='store-opened'>
									<p><b>Weekends:</b> &nbsp;{{contents.bacoor_weekends}}</p>
								</div>

							</div>


						</div>

					</div>

					<div class='locator-right'>
						<div id="bacoor" style='height: 100%;'></div>
					</div>


				</div>


				<div class='locator-section'>


					<div class='locator-left'>


						<div class='branch-wrap'>

							<div class='branch-name'>
								<p>Alabang Branch <i class="fa fa-map-marker" aria-hidden="true"></i></p>
							</div>

							<div class='branch-address'>
								<p>{{contents.alabang_address}}</p>
							</div>

							<div class='branch-address'>
								<p><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp; {{contents.alabang_number}} &nbsp; | &nbsp;{{contents.alabang_email}}</p>
							</div>

							<div class='store-wrap'>
								<p>Opening Hours</p>

							</div>
							<div style='position: relative;top:30px;'>

								<div class='store-opened'>
									<p><b>Weekdays:</b> &nbsp; {{contents.alabang_weekdays}}
										<span style='position: relative;left:100px;'>(Mon,Tues,Wed,Thurs,Fri)</span></p>
									</div>
									<div class='store-opened'>
										<p><b>Weekends:</b> &nbsp; {{contents.alabang_weekends}}</p>
									</div>

								</div>


							</div>

						</div>

						<div class='locator-right'>
							<div id="alabang" style='height: 100%;'></div>
						</div>


					</div>


					<div class='locator-section'>


						<div class='locator-left'>


							<div class='branch-wrap'>

								<div class='branch-name'>
									<p>Imus Branch <i class="fa fa-map-marker" aria-hidden="true"></i></p>
								</div>

								<div class='branch-address'>
									<p>{{contents.imus_address}}</p>
								</div>

								<div class='branch-address'>
									<p><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;{{contents.imus_number}} &nbsp; | &nbsp;{{contents.imus_email}}</p>
								</div>

								<div class='store-wrap'>
									<p>Opening Hours</p>

								</div>
								<div style='position: relative;top:30px;'>

									<div class='store-opened'>
										<p><b>Weekdays:</b> &nbsp; {{contents.imus_weekdays}}
											<span style='position: relative;left:100px;'>(Mon,Tues,Wed,Thurs,Fri)</span></p>
										</div>
										<div class='store-opened'>
											<p><b>Weekends:</b> &nbsp; {{contents.imus_weekends}}</p>
										</div>

									</div>


								</div>

							</div>

							<div class='locator-right'>
								<div id="imus" style='height: 100%;'></div>
							</div>


						</div>



					</main>




					<?php include LAYOUT_DIR . 'front-login.ctp'; ?>

				</body>
				</html>