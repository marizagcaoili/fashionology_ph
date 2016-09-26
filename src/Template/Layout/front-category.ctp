
<div class='category' ng-app="SampleApp" ng-controller="CategoryBrandController" >

	<div class='category-flex'>

		<div class='category-a'>
			
			<div class='category-clothing' style='width:64%;position: relative;top:48px;'>

			<div class='arrow-up'>
			</div>
				<div class='categ-title'>
					<p style='border-bottom: none;color:#111;'>Clothing</p>
				</div>

				<div class='category-list'>
					<ul>
						<li ng-repeat= "parent in parents"><a href='/clothing?category_id={{parent.category_id}}'>{{parent.category_name}}</a>
						</li>
					</ul>

				</div>

			</div>

		</div>


		<div class='category-b'>


			<div class='category-clothing' style='width:84%;top:48px;'>

				<div class='categ-title'>
					<p style='width:70%;color:#111;border-bottom-color: transparent;'>Featured Brands</p>
				</div>

				<div class='category-list'>
					<ul>
					<li ng-repeat= "brand in brands"><a href='/clothing?brand_id={{brand.brand_id}}'>{{brand.brand_name}}</a>
						</li>
					</ul>

				</div>

			</div>



		</div>


		<div class='category-c'>

		<div class='img-content' >
			<img src='/front/public/img/d.jpg' />

			<div class='desc-img-content'>
				<p class='sub-desc-content'>Make your Look</p>
				<p class='sub-sub-desc-content'>A FASHIONABLE ONE</p>
			</div>
		</div>

		</div>


	</div>

</div>