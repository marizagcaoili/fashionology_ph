<!DOCTYPE html>
<html >
<head >
	<base href="/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fashionology PH</title>

	<link rel="stylesheet" href="/front/public/css/main-style.css">
	<link rel="stylesheet" href="/front/public/css/sub-styles.css">

	<!--cdn/ css-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

	<link rel="stylesheet" href="/front/dist/themes/fontawesome-stars.css">


	<!--scripts-->


	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>


	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>

	
	
	<!-- Compiled and minified CSS -->
<!-- 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
 -->
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>



</head>
<body class="index-page" ng-app='SampleApp' ng-controller='ItemDetailsController' >


	<main class="container_14 left-right-container"  ng-repeat='detail in details'>

		<script type='text/javascript'>
			$('.qtyplus').on('click', function(){


				//get
				
			});

			$('.qtyminus').on('click', function(){
				//get
				var txtVal=$('.quantity').val();
				//set
				$('.quantity').val((txtVal*1)-1);

			});


		</script>


		<div class="left-view" style='border:none;'>
			<div class="left-view-contain">
				<figure style='border:none;'>
					<img id='zoom_01' ng-src='{{detail.file_key}}'
					zoom-image='{{detail.file_key}}'
					ng-elevate-zoom>

				</figure>


				<div class='recommended-view'>

					<p class='tags-p'>Tags</p>
					<div class='tags-contain'>

			
					</div>


					<div style='display: none;'>
						<p class="recommend-p">Recommended for you</p>

						<div class='recommend-slide'>

						</div>

					</div>

				</div>


			</div>
		</div>

		<div class="right-view">

			<div class="right-view-contain">
				<div class='detail-view'>
					<a class='back-to-home' href='/clothing' target='_self'>Back to home</a>
					<p class="name">{{detail.item.item_name}}</p>
					<p class="price">{{detail.item.item_srp}}.00</p>

					<article>
						{{detail.item.item_description}}
					</article>

				</div>

				<div class='size-view'>
					<p>Choose a Size</p>
					<ul>
						<li ng-repeat = "detail in item_stock_details" ng-click= 'getSizeId(detail.quantity,detail.size.size_key)'><a><b>{{detail.size.size_key}}</b> {{detail.quantity}}</a></li>

					</ul>

				</div>

				<div class='color-view'>
					<p>Choose a Color</p>

					<div class="color-view-choose">

						<ul>

							<!-- <li>
								<div class="radio">
									<label data-toggle="tooltip" data-placement="top" title="Black" data-container="body">
										<input type="radio" name="optionsRadios" checked="true">

									</label>
								</div>
							</li>
							<li>
								<div class="radio">
									<label data-toggle="tooltip" data-placement="top" title="Beige" data-container="body">
										<input type="radio" name="optionsRadios" checked="true">

									</label>
								</div>
							</li>
							<li>
								<div class="radio">
									<label data-toggle="tooltip" data-placement="top" title="Pink" data-container="body">
										<input type="radio" name="optionsRadios" checked="true">

									</label>
								</div>
							</li> -->

						</ul>

					</div>


					<div class='option-view-select'>
						<ul>
							<li>
								<p class='quantity-p'
								style='font-size: 20px;'>Quantity</p>
							</li>

							<li>
								<button type='button' class='math' id= 'minus' ng-click='qtyminus(itemId)'>-</button>
								<input type='text' style='background: transparent;border:none;width:40px;text-align: center;font-size:20px;font-family: Moon;border-bottom: 1px solid;' id='quantity'  class='qty quantity' name='quantity' value='1' style='width:40px;color:#333;text-align: center;font-size: 18px;' disabled />
								<button type='button' class='math' id= 'plus' ng-click='qtyplus(itemId)'>+</button>
							</li>

							<li>
							</li>

							<li>
							</li>

							<li>
								<button class='add-to-cart' ng-click="addItem(itemId)">add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
							</li>

							<li>
								<button class='add-to-cart' style='background: transparent;color:#000;border:solid 1px;'> <i class="fa fa-heart-o" aria-hidden="true"></i></button>
							</li>
						</ul>

					</div>

				</div>

				<div class='review-view'>
					<p class="review-about" style='text-transform: uppercase;font-family: Moon;font-size: 18px;color:#111;'>USER REVIEWS ABOUT THIS </p>
					<div class="user-view">
						<img src='/front/public/img/.png' style='border:none;'>

						<div class='user-inputs'>

							<div class="form-group title-place">

								<input type="text" id='title' value="" placeholder="Place your Title" class="form-control" />

							</div>

							<div class="form-group message-place">
								<textarea name="" id='message' class='form-control' placeholder="Enter a message here"></textarea>
							</div>


							<p class="how-would">How would you rate this product?</p>

							<div class="rate-a-product">

								<div class="stars stars-example-bootstrap">
									<select id="productrate" name="rating" class='btn4'>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4" >4</option>
										<option value="5">5</option>
									</select>
								</div>

								<button type="submit" class="btn btn-success" ng-click='submitReview()'>Submit</button>

							</div>


						</div>
					</div>

					<ul class='user-view-display'>
						<li ng-repeat='review in reviews'>
							<div class='msg
							'>



							<div class='msg-flex'>
								<div class='msg-flex-a'>
									
									<img src='/front/public/img/user.png' style='width:110px;border:none;height:100px;position: relative;left:20px;top:24px;'>

								</div>
								<div class='msg-flex-b'>
									
									<div class='msg-title'><p>{{review.review_title}}</p></div>
									<div class='msg-message'>
										<p>{{review.review_message}}</p>
									</div>

								</div>

							</div>

						</div>
					</li>


				</ul>



			</div>
		</div>

	</div>

</main>


<?php include LAYOUT_DIR . 'front-cart.ctp'; ?>




</body>

<script>

	$(document).ready(function(){


		// $('#cartModal').modal('toggle');

	})
</script>

<!--Core JS files-->
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="/front/assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- <script src="/front/assets/js/material.min.js"></script>

 -->


<script src="/front/dist/jquery.barrating.min.js"></script>





<script>


	$('.imgClick').click(function($){
		var idA='/front/public/img/a.jpg'+this.id+'';
		$('#mainimage').attr('src',idA);
	});

	$('.btn4').click(function(){
		console.log('3 Ratings!');
	});


	$(function() {
		$('#productrate').barrating({
			theme: 'fontawesome-stars'
		});
	});

	$('#zoom_01').elevateZoom({
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 500,
		lensFadeIn: 500,
		lensFadeOut: 500,
		scrollZoom : true
	}); 

	$('.size').click(function(){
		$('.size').css('background','black').css('color','white');
	});


</script>




</html>