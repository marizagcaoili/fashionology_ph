<div class='wishlist-content'style='height:auto;border:none;'>

	<div class='wlist-wrap wlist-header' style='background:#e53941;border:none;'>
		<div class='wlist-content-wrap' style='border:none;'>
			<div class='sets-a'>
				<p class='heading'>Order Reference</p>
			</div>

			<div class='sets'>
				<p class='heading'>Order Amount</p>
			</div>
			<div class='sets'>
				<p class='heading'>Order Status</p>
			</div>
			<div class='sets'>
				<p class='heading'>Action</p>
			</div>
		</div>							
	</div>

	<div ng-repeat="order_detail in order_details" class='wlist-wrap' style='height:100px;border:none;' >

		<div class='wlist-content-wrap wlister'>
			<div class='sets-a'>

				<div class='wlist-product'>
					<div class='wrapper-list'>
						<div style='width:130px;border-bottom: 1px solid #a1a1a1;'>
											<!-- <figure class='fig-img'>
												<img style='height:116px;' src='{{wlist.image.file_key}}' />
											</figure> -->
										</div>
										<div class='wrapper-list-sub' style='position: relative;'>
											<p class='price-wlist' style='font-family: Moon;position:relative;left:-58px;font-weight: bold;'>
												#{{order_detail.order_reference_number}}
											</p>
										</div>
									</div>	
								</div>

							</div>

							<div class='sets'>

								<div class='wlist-product'>
									<div class='wrapper-list'>
										<div class='wrapper-list-sub'>
											<p class='price-wlist' style='font-family: Moon;font-weight: bold;'>
												{{order_detail.order_subtotal}}.00
											</p>
										</div>
									</div>	
								</div>

							</div>



							<div class='sets'>

								<div class='wlist-product'>
									<div class='wrapper-list'>
										<div class='wrapper-list-sub'>
											<p class='stock-stat'>{{order_detail.order_status}}</p>
											<p class='stock-stat' ng-if='wlist.item.item_status=0'>OUT OF STOCK</p>

										</div>
									</div>	
								</div>

							</div>

							<div class='sets' >

								<div class='wlist-product'>
									<div class='wrapper-list'>
										<div class='wrapper-list-sub'>
											<div style='position:relative;border:1px solid #cdcdcd;width:36%;margin:0 auto;top:10px;height:80px;' class='ban'>

												<i class="fa fa-ban" style='font-size: 60px;position: relative;left:20px;top:6px;'aria-hidden="true"></i>

											</div>
										</div>
									</div>	
								</div>



							</div>



						</div>







					</div>







				</div>
