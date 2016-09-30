<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Account Register</title>
	<link rel="stylesheet" href="">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="/front/assets/css/bootstrap.min.css" rel="stylesheet" />




	<link rel="stylesheet" href="/front/public/css/main-style.css">

	<link rel="stylesheet" href="/front/public/css/account-register.css">

	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

	<script src='/front/angular/validation.js'></script>

	<script src="//www.google.com/recaptcha/api.js?render=explicit&onload=vcRecaptchaApiLoaded" async defer></script>


	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-messages.js"></script>


	<script>

		$(document).ready(function(){
			$('.confirmation-link').hide();

		});


	</script>

</head>
<body ng-app='SampleApp' ng-controller='accountController'>


	<header class="masthead" style='background:transparent;' > <!--background: #232323;-->  
		
		<img src='/front/public/img/logo-white.png' width="270px;" style='position: relative;top:10px;left:116px;opacity: 0.8;'/>

	</header>

	<div class='cover-reg' style='background:url(/front/public/img/register-cover.png);background-size: cover;'>
		<div class='title-bar'>
	<!-- 		 <p style='font-size: 80px;'>Create your account</p>
-->		<!--<p>be part of our fashionology haulers right now.</p> -->
</div>

</div>



<main class='container_14'>


	<div class='register-wrap' >



		<div class='content-form'	>

			<div class='noted' ng-messages="regForm.username.$error" ng-show="!user.name" ng-show='!user.email'  role="alert">
				<p ng-message='required'>Please provide all the blank fields below.</p>
			</div>

			<div class='noted wrong' style='top:-60px;background:#c4374e;display: none;' ng-messages="regForm.username.$error" ng-show="!user.name"  role="alert">
				<p style='color:#fff;' ng-message="">Your field is too short</p>
			</div>

			<form name='regForm' class='form-forms'>
				<div class='content-div-by'>
					<div>
						<label class='frm-lbl'>USERNAME <br><input  name='username' ng-minlength="5" ng-maxlength="20" required type='text' class='form-control' id='username'></label>

						<p ng-show="userForm.name.$invalid && !userForm.name.$pristine" class="help-block">You name is required.</p>	
					</div>

					<div>
						<label class='frm-lbl'>EMAIL ADDRESS <br><input  type='text' id='email' required class='form-control'></label>
					</div>

				</div>

			</div>

			<div class='content-form '>

				<div class='content-div-by'>
					<div>
						<label class='frm-lbl'>PASSWORD <br><input type='password' required id='password' class='form-control'></label>
					</div>

					<div>
						<label class='frm-lbl'>CONFIRM PASSWORD <br><input type='password'  id='password2'required class='form-control'></label>
					</div>



				</div>

			</div>

			<div class='content-form '>

				<div class='content-div-by'>
					<div>
						<label class='frm-lbl'>BIRTHDAY <br><input  type='date' required id='birthday' class='form-control'></label>
					</div>

					<div>
						<label class='frm-lbl'>CONTACT <br><input  type='text' id='contact' required class='form-control'></label>
					</div>



				</div>

			</div>


			




			<div class='billing-info top-space'>

				<div class='title-bill'>
					<p>Billing Information</p>
				</div>




				<div class='content-form top-space'>



					<div class='content-div-by'>
						<div>
							<label class='frm-lbl'>FIRST NAME <br><input type='text' id='fname' class='form-control'></label>
						</div>

						<div>
							<label class='frm-lbl'>LAST NAME <br><input type='text'  required id='lname' class='form-control'></label>
						</div>

					</div>

				</div>







				<div class='content-form '>

					<div class='content-div-by'>
						<div>
							<label class='frm-lbl'>ADDRESS <br><input type='text'  required id='address'  class='form-control'></label>
						</div>

						<div>
							<a style='font-family: Coves;text-transform: uppercase;font-size: 20px;color:#111;font-weight: bold;'>City</a>
							<select style='position:relative;top:10px;font-family:Moon;border:1px solid;width:400px;height:54px;border-radius: 0px;' required id='city' >
							<option style='font-family: Moon;'>Cavite</option>
							<option style='font-family: Moon;'>Alabang</option>
							</select>
						</div>

					</div>

				</div>




				<div class='content-form '>


					<div class='content-div-by'>
						<div>
							<label class='frm-lbl'>STATE/PROVINCE <br><input type='text' required id='state' class='form-control'></label>
						</div>

						<div>
							<label class='frm-lbl'>ZIP/POSTAL CODE <br><input type='text' required id='postal'  class='form-control'></label>
						</div>





					</div>



				<!-- 	<div style='height:100px;'>

						<div
						vc-recaptcha
						theme="'light'"
						key="model.key"
						on-create="setWidgetId(widgetId)"
						on-success="setResponse(response)"
						on-expire="cbExpiration()"
						></div>


					</div>
				-->

			</form>


			<div class='content-div-by'>
				<div>
					<button class='sign-me-up top-space' ng-click='add()'>
						SIGN ME UP
					</button>
				</div>

				<div>
				</div>

			</div>

			<div class='top-space'></div>

		</div>




	</div>



</div>



<section class='confirmation-link' style='position: relative;top: -30px;
width: 66%;margin-left:120px;height:230px;display: none;'>

<p style='font-size: 30px;font-family:Moon;padding-left: 30px;padding-top: 30px;font-weight: bold;'>Account Verification!</p>

<p style='font-size: 18px;font-family: Moon;width:90%;position: relative;left:30px;top:10px;'>An email has been sent to the address below with a link to verify your account. Make sure to check your email and follow the link to complete your account.</p>

<button style='font-size: 18px;font-family: Moon;position: relative;left:30px;top:40px;background:#111;color:#fff;border:1px solid;padding: 4px 20px;'>Go back to Store &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

</section>

</main>


<?php include LAYOUT_DIR . 'front-confirm.ctp'; ?>



</body>

<script src="/front/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/front/assets/js/material.min.js"></script>
<script src="/front/assets/js/material-kit.js" type="text/javascript"></script>



</html>