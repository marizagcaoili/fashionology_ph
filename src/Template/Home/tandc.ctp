<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Terms and Conditions</title>

	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>

	<link rel="stylesheet" href="/front/public/css/tandc.css" />

</head>
<body ng-app='SampleApp' ng-controller='TermsAndConditionsController'>
	
	<header class='masthead'>
		<a href='/'>   <img src="/front/public/img/logo-black.png" class="logo" style='width:210px;'></a>
        
	</header>

	<main class='container_14'>

		<div class='tandc-wrap'>

			<div class='tandc-flex'>


				<div class='tandc-a'>

					<div class='menu-a aa setactive' ng-click='privacy()'>
						<p>Privacy Policy</p>
					</div>

					<div class='menu-a ab' ng-click='copyright()'>
						<p>Copyright Infringement</p>
					</div>

					<div class='menu-a ac' ng-click='risk()'>
						<p>Risk of loss</p>
					</div>

					<div class='menu-a ag' ng-click='ordering()'>
						<p>Ordering Policy</p>
					</div>

					<div class='menu-a ae' ng-click='deliver()'>
						<p>Delivery Policy</p>
					</div>


					<div class='menu-a af' ng-click='return()'>
						<p>Return to home <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
					</div>





				</div>



				<div class='tandc-b'>

					<div class='tandc-content a'>
						<div class='header-tandc'>
							<p>About Privacy Terms.</p>	
						</div>

						<div class='privacy-content'>
							<p>Please review our Privacy Notice, which also governs your visit to our website, to understand our practices.
							<br><br>
								<b style='font-size:20px;'>ELECTRONIC COMMUNICATIONS<br>
								</b>							When you visit <b>FASHIONOLOGY</b> or send e-mails to us, you are communicating with us electronically. You consent to receive communications from us electronically. We Will communicate with you by e-mail or by posting notices on this site. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.</p>
							</div>
						</div>


						<div class='tandc-content b' style='display: none;'>
						<div class='header-tandc'>
							<p>About Copyright.</p>	
						</div>

						<div class='privacy-content'>
							<p>All content included on this site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of FASHIONOLOGY. The compilation of all content on this site is the exclusive property oF Fashionology, with copyright authorship for this collection by fashionology, and protected by international copyright laws.</p>
							</div>
						</div>

					</div>

				</div>

			</div>

		</main>



	</body>
	</html>