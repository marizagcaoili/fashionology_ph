<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My Bag</title>

	<!--Core CSS-->
	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>
	<link rel='stylesheet' href='/front/public/css/cart.css' />

	<!--Core Script-->
	<script src='/front/public/js/jquery.js'></script>


	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

</head>
<body ng-app='SampleApp' ng-controller="testController">


	
	<header class="masthead" style='background: #111;'> <!--background: #232323;-->  
		<img src="/front/public/img/logo-white.png" class="logo" style='width:210px;margin-left:36%;'>

	</header>

	<main class='container_14'>

		<div class='cart-headline'>
			<p class='shop-p' style='font-size:58px;'>Shopping Bag</p>
			<p class='shop-p-under'>modify items in bag.</p>
		</div>

		<div class='cart-container'>

			<div class='cart-wrap'>

				<div class='cart-container-a' >
					<div class='cart-content-left'  >
						<ul >
							<li ng-repeat='item in item track by $index'>
								<div class='views-each'>
									<div class='views-each-head'>
										<p class='views-brand'>{{item.item.item_name}}</p>
										<p class='views-type'>{{item.item.item_name}} <span  ng-init="$parent.total = $parent.total + (item.item.item_srp * cart_items_quantity[$index])" class='quantifier'>X {{cart_items_quantity[$index]}} = {{item.item.item_srp * cart_items_quantity[$index]}}.00</span> </p>
										<p class='views-price'>PHP {{item.item.item_srp}}.00</p>

									</div>
									<div class='view-each-modif' style='height:220px;'>

										<div class='views-each-flex'>
											<div style='width:800px;'>

												<div class='this-flex'>

													<div class='img-view'>
														<img src='{{item.file_key}}'>
													</div>

													<div class='mod-view'  >
														<div class='mod-view-det'>
															<p>Quantity
																
																<div class='quanti-grp'>
																	<div class='quanti-grp-flex'>
																		<div class='quanti-grp-a'>
																			<button class='qtyminus qty'  ng-click='qtyminus(item.item_id, cart_items_quantity[$index],item.item.item_srp)'>
																				-
																			</button>
																		</div>

																		<div class='quanti-grp-a'>
																			<input type='text' class='qty-txt quantity' value='{{cart_items_quantity[$index]}}' disabled>	
																		</div>

																		<div class='quanti-grp-a'>
																			<button class=' qty qtyright qtyplus' ng-click='qtyplus(item.item_id, cart_items_quantity[$index],item.item.item_srp)'>
																				+
																			</button>

																		</div>
																	</div>
																</div>

															</p>

															<p>Size <span class='det-align'>Sample Size</span></p>

															<p> <span class='det-align' style='left:34px;'></span></p

															</div>
														</div>

													</div>

													<div style='width:420px;' class='delivery'>
														<p>Delivery can be varied on the places selected.</p>

														<div class='del-rem'>
															<p ng-click='removeCart(item.item_id,cart_items_quantity[$index])'><i class="fa fa-minus" aria-hidden="true"></i></p>
														</div>
													</div>

												</div>



											</div>


										</div>
									</div>
								</li>



							</ul>
						</div>
					</div>

					<div class='cart-container-b'>
						<div class='instructions'>

							<div class='instructions-head'>
							</div>

							<div class='instructions-content'>
								<div class='totalize-content'>
									<p class='total-p'>Total <span>PHP {{total}}.00</span></p>

									<!-- <p class='total-p'>Shipping <i class="fa fa-info-circle" aria-hidden="true"></i><span>Free</span></p>

									<p class='total-p'>Discount <span>No Discount</span></p>

									<p class='total-p' style='font-weight:bold;font-size: 18px;'>Grand Total <span>PHP {{total}}.00</span></p> -->
								</div>
							</div>

							<div class='set-button'>
								<a class='btn-secure' href='/checkout' style='color:#111;'>SECURE CHECKOUT</a>
								<button class='btn-cont' ng-click='continueShop()'>CONTINUE SHOPPING</button>
							</div>

							<div class='enter-pro'>
								<div class='enter-pro-p'>
									<p>HAVE A VOUCHER ?</p>
								</div>

								<div class='enter-pro-txt'>
									<input type='text' placeholder="ENTER PROMOTIONAL CODE">
								</div>

								<div class='enter-pro-btn'>
									<button class='enter-now'>SUBMIT</button>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>

		</main>

	</body>
	</html>		