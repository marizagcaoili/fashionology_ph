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


</head>
<body ng-controller='testController' ng-app='SampleApp'>

	<main class='container_14' id='exportPdf'>

		

			<div class='receipt-wrap'ng-init='total=0;'>

				<div class='header-receipt'>
					<div class='header-flex'>
						<div>
							<img src='/front/public/img/logo-black.png' />
						</div>
						<div>
							<p>Date: 2/10/2016</p>
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
							<p class='light-text'><b>{{userInfos.shipping.shipping_fname}} {{userInfos.shipping.shipping_lname}} </b></p>
							<p class='light-text'>{{userInfos.shipping.shipping_address}}</p>
							<p class='light-text'>{{userInfos.shipping.shipping_city}}, Philippines {{userInfos.shipping.shipping_zipcode}}</p>
							<p class='light-text'>Phone: {{userInfos.shipping.shipping_contact}}</p>
							<p class='light-text'>Email: {{userInfos.shipping.shipping_email}}</p>

						</div>
						<div class='address-sec'>
							<p class='light-text'><b>Invoice #{{reference}}</b></p>
							<p class='light-text'><b>Payment Method:</b> {{PaymentMethod}}</p>
							<p class='light-text'><b>Order ID:</b> {{branch}}</p>
							<p class='light-text' id='delivery'><b>Delivery Status:</b>{{dateDeliver}}</p>

							<p class='light-text' id='pickup'><b>Pick Up Time:</b>{{timePick}}</p>
						</div>
					</div>


				</div>

				<div class='account-table' ng-init='$scope.total=total=0'>
					<div class='accounts-header'>
						<div class='accounts-header-flex'>
							<div class='qty-top'><p class='header-bold'>Qty</p></div>
							<div class='accounts-top'><p class='header-bold'>Product</p></div>
							<div class='serial-top'><p class='header-bold'>Serial #</p></div>
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
						<p><b><span style='color:#ababab;'>Additional Details</span> &nbsp; I really like your products!</b></p>
					</div>




				</div>



				<div class='accounts-below' style='border:none;'>
					<div class='accounts-flex-below' style='border:none;border-top:1px solid #cdcdcd;'>
						<div class='accounts-a'>

							<p style='padding-top:34px;font-family: Moon;
							font-size: 24px;font-weight: bold;'>Payment Methods:</p>

							<!-- <div class='pickup'>
								<p style='font-size: 20px;'>CASH ON DELIVERY</p>
							</div>

							<div class='pickup' style='position: relative;top:-70px;left:210px;'>
								<p style='font-size: 20px;'>PICK UP</p>
							</div>
 -->

						</div>

					<div class='accounts-b'>

						<div class='accounts-b-under'>
							<p class='t-amount' style='margin: 0;font-size: 20px;'>TAX FEE: &nbsp; PHP 20.00</p>
							<p class='t-amount' style='margin: 0;font-size: 20px;'>SHIPPING FEE: &nbsp; PHP 20.00</p>
							<p class='t-amount' style='margin: 0;margin-top: 20px;'>Total Amount: &nbsp; PHP {{total}}.00</p>

							<button type="" class='place-order' ng-click='generate()'>Generate PDF <i class="fa fa-file-text" aria-hidden="true"></i></button>

							<button type="" class='place-order' ng-click='orderNow()'>Place Order <i class="fa fa-credit-card" aria-hidden="true"></i></button>

						</div>


				<!-- 	<p class='due-p'>Amount Due 2/22/2016</p>
			-->
			<div class='due-group'>

			</div>


			<div class='button-make'>
				<div class='button-flex'>

				</div>

			</div>

		</div>
	</div>


</div>


</main>


</body>
</html>