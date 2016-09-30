<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Official Receipt</title>
	<link rel="stylesheet" href="">



	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>



	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

	<link rel="stylesheet" href="/front/public/css/order-process.css" />

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>


	<link rel="stylesheet" href="https://cdn.rawgit.com/gilf/ngPrint/master/ngPrint.min.css" />
	<script src="https://rawgit.com/gilf/ngPrint/master/ngPrint.min.js"></script>
	
</head>
<body ng-controller='OrderSummaryController' ng-app='SampleApp'>

	<main class='container_14' id='exportPdf' >

		<div class='receipt-wrap'ng-init='total=0;' id='content' style='width:74%;'>

			<div class='header-receipt'>
				<div class='header-flex'>
					<div>
						<img src='/front/public/img/logo-black.png' />
					</div>
					<div>
						<p>Placed On: <span  id='date'></span></p>
					</div>
				</div>
			</div>

			<div class='address-wrap'>
				<div class='address-flex-wrap'>
					<div class='address-sec'>
						<p class='light-text'>From</p>
						<p class='light-text'><b>Fashionology Boutique</b></p>
						<p class='light-text'>2362 C. Marconi St., Brgy. Palanan</p>
						<p class='light-text'>Makati, Philippines 4017</p>
						<p class='light-text'>Phone: (804) 123-5432</p>
						<p class='light-text'>Email: jab.j16@gmail.com</p>
					</div>
					<div class='address-sec'>

						<p class='light-text'>To</p>
						<p class='light-text'><b>{{billing.shipping_fname}} {{billing.shipping_lname}} </b></p>
						<p class='light-text'>{{billing.shipping_address}}</p>
						<p class='light-text'>{{billing.shipping_city}}, Philippines {{billing.shipping_zipcode}}</p>
						<p class='light-text'>Phone: {{billing.shipping_contact}}</p>
						<p class='light-text'>Email: {{userInfos.account_email}}</p>

					</div>
					<div class='address-sec'>
						<p class='light-text'><b>Transaction #{{reference}}</b></p>
						<p class='light-text'><b>Payment Method:</b> {{PaymentMethod}}</p>	
						<p class='light-text' id='delivery'><b>Delivery Status:</b>PENDING</p>

						<p class='light-text' id='pickup'><b>Pick Up Time:</b>{{timePick}}</p>
					</div>
				</div>


			</div>

			<div class='account-table' ng-init='$scope.total=total=0'>
				<div class='accounts-header'>
					<div class='accounts-header-flex'>
						<div class='qty-top'><p class='header-bold'>Qty</p></div>
						<div class='accounts-top'><p class='header-bold'>Product</p></div>
						<div class='serial-top'><p class='header-bold'>Item Code</p></div>
						<div class='desc-top'><p class='header-bold'>Description</p></div>
						<div class='subtotal-top'><p class='header-bold'>Subtotal</p></div>
					</div>
				</div>

				<div class='accounts-content' ng-repeat='item in item track by $index'>

					<div class='accounts-content-flex'>
						<div class='qty-top'><p class='content-bold'>{{cart_items_quantity[$index]}}</p></div>
						<div class='accounts-top'><p class='content-bold'>{{item.item.item_name}}</p></div>
						<div class='serial-top'><p class='content-bold'>{{item.item.item_code}}</p></div>
						<div class='desc-top'><p class='content-bold'>{{item.item.item_description}}</p></div>
						<div class='subtotal-top'  ng-init="$parent.total = $parent.total + (item.item.item_srp * cart_items_quantity[$index])"><p class='content-bold'>PHP {{item.item.item_srp * cart_items_quantity[$index]}}.00</p></div>


					</div>

				</div>

				<div class='additional'>
					<!-- 	<p><b><span style='color:#ababab;'>Additional Details</span> &nbsp; I really like your products!</b></p> -->
				</div>




			</div>



			<div class='accounts-below' style='border:none;'>
				<div class='accounts-flex-below' style='border:none;border-top:1px solid #cdcdcd;'>
					<div class='accounts-a'>
						<div style='position: relative;top:40px;'>
							<div style='width:90%;'>
								<p style='font-family: Moon;font-size: 18px;font-weight: bold;'>Fashionology PH Rules and Regulations</p>
							</div>

							<div style='width: 88%;'>
								<p style='font-family: Coves;font-size: 18px;'>When placing an ordering make sure that all the inputs are written in legit. If you mistyped any invalid information this will reflect your profile when placing an order which will cause to customer details interruption. <br>
									Thank you!</p>
								</div>

							</div>
						</div>

						<div class='accounts-b'>

							<div class='accounts-b-under'>
								<p class='t-amount' style='margin: 0;font-size: 20px;'>SUBTOTAL: &nbsp; PHP {{total-total *0.12}}</p>
								<p class='t-amount' style='margin: 0;font-size: 20px;'>VAT: &nbsp; PHP {{total*0.12}}</p>
								<!-- <p class='t-amount' style='margin: 0;font-size: 20px;'>SHIPPING FEE: &nbsp; PHP 0.00</p> -->
								<p class='t-amount' style='margin: 0;margin-top: 20px;color:#d42740;'>Grand Total: &nbsp; PHP {{total}}.00</p>


							</div>


				<!-- 	<p class='due-p'>Amount Due 2/22/2016</p>
			-->
			<div class='button-make'>
				<div class='button-flex'>

				</div>

			</div>

		</div>
	</div>


</div>


</main>

<div style='width:38%;float:right;margin-right: 140px;margin-top:-220px;'>

	<button type="" class='place-order' ng-click='print()'>Print a Copy <i class="fa fa-file-text" aria-hidden="true"></i></button>	

	<button type="" class='place-order' ng-click='orderNow(total,billing.shipping_id,userInfos.account_email)'>Place Order <i class="fa fa-credit-card" aria-hidden="true"></i></button>

</div>

<div class='loadingBar' style='border:none;display: none;'>
	<div style='width:10%;margin:0 auto;'>
		<div class="preloader-wrapper big active">
			<div class="spinner-layer spinner-blue-only">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div><div class="gap-patch">
				<div class="circle"></div>
			</div><div class="circle-clipper right">
			<div class="circle"></div>
		</div>
	</div>

</div>



</div>

<div style='position: relative;top:80px;'>
	<p style='text-align: center;font-family: Moon;font-size:20px;font-weight: bold;color:#858484;'>Processing orders...</p>
</div>



</div>


<div class='thankyou' >

	<div style='position:relative;width:80%;left:40px;top:20px;'>
		<p style='font-family: Moon;font-size: 24px;font-weight: bold;'>Thank you for ordering to Fashionology PH!</p>
	</div>

	<div style='position:relative;top:30px;width:80%;left:40px;'>

		<p style='font-family: Moon;
		font-size: 16px;'>We hope that you really had a good and a great user experience while ordering online in our store. The team Fashionology are looking forward to our next transaction sooner.</p>
	</div>

	<div style='position: relative;top:40px;width:80%;left:40px;'>
		<p style='font-family: Moon;'>Here is your order transaction # : </p>
		<p style='font-family: Moon;font-size:34px;font-weight: bold;'>{{reference}}</p>
	</div>

	<div style='position:relative;top:50px;width:80%;left:40px;background:#f6f5f5;'>
		<p style='font-family: Moon;padding:8px;word-spacing: 2px;font-size:18px;'>Please check your email for more details. We have sent it under <b>{{userInfos.account_email}}</b></p>
	</div>

	<div style='position: relative;top:80px;width:80%;left:40px;'>

		<button class='return' ng-click='sendEmail(userInfos.account_email)'>Resend Email</button>

		<button class='return' ng-click='goHome()'>Return to Shop <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

	</div>

</div>

<script src='/front/public/js/jspdf.min.js'></script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

today = mm+'/'+dd+'/'+yyyy;
 document.getElementById("date").innerHTML = today;
</script>

</body>
</html>