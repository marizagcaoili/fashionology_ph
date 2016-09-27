<div class='wishlist-content'>

	<div class='wlist-wrap wlist-header'>
		<div class='wlist-content-wrap'>
			<div class='sets-a'>
				<p class='heading'>Product</p>
			</div>

			<div class='sets'>
				<p class='heading'>Price</p>
			</div>
			<div class='sets'>
				<p class='heading'>Stock Status</p>
			</div>
			<div class='sets'>
				<p class='heading'>Action</p>
			</div>
		</div>							
	</div>

	<div class='wlist-wrap' style='height:126px;' ng-repeat='wlist in wishlistItem'>

		<div class='wlist-content-wrap wlister'>
			<div class='sets-a'>

				<div class='wlist-product'>
					<div class='wrapper-list'>
						<div style='width:130px;border-bottom: 1px solid #a1a1a1;'>
							<figure class='fig-img'>
								<img style='height:116px;' src='{{wlist.item.image.file_key}}' />
							</figure>
						</div>
						<div class='wrapper-list-sub'>
							<p class='sets-prod'>
								{{wlist.item.item_name}}
							</p>
							<p class='sets-desc'>
								{{wlist.item.item_description}}
							</p>
						</div>
					</div>	
				</div>

			</div>

			<div class='sets'>

				<div class='wlist-product'>
					<div class='wrapper-list'>
						<div class='wrapper-list-sub'>
							<p class='price-wlist' style='font-family: Moon;font-weight: bold;'>PHP {{wlist.item.item_srp}}.00</p>
						</div>
					</div>	
				</div>

			</div>



			<div class='sets'>

				<div class='wlist-product'>
					<div class='wrapper-list'>
						<div class='wrapper-list-sub'>
							<p class='stock-stat' ng-if='wlist.item.item_status=1'>IN STOCK</p>
							<p class='stock-stat' ng-if='wlist.item.item_status=0'>OUT OF STOCK</p>
						</div>
					</div>	
				</div>

			</div>

			<div class='sets'>

				<div class='wlist-product'>
					<div class='wrapper-list'>
						<div class='wrapper-list-sub'>
											
												<div class='flex-action'>
													<div class='flex-actiona' ng:click="addItem(wlist.item.item_id)">

														<div class='cart-actiona'>
															<i style='font-size: 30px;position: relative;left:16px;top:10px;' class="fa fa-shopping-cart" aria-hidden="true"></i>
														</div>

													</div>
													<div class='flex-actiona' ng:click='removeWishlist(wlist.wishlist_id)'>
														<div class='cart-actiona'>
															<i style='font-size: 30px;position: relative;left:18px;top:10px;' class="fa fa-trash-o" aria-hidden="true"></i>
														</div>
													</div>
												</div>

											</div>
										</div>	
									</div>



								</div>

								

							</div>





						</div>


						

					</div>
