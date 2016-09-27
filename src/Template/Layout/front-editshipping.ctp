

<div class='info-right-wrap' class='editaccount'>

	<div class='title-info-right'>
	<p style='color:#333;font-size: 28px;'> Edit Shipping Details</p>
	</div>

	<div class='info-right-field' style='position: relative;top:28px;width:70%;'>
		<div class='info-right-flex-field'	>
			<div class='info-a-flex-field'>
				<p style='font-size: 20px;color:#333;font-weight: normal;'>First Name</p>

				<input type='text' id='shipFname' style='width:92%;height: 40px' value='{{userInfos.shipping.shipping_fname}}'>

			</div>
			<div class='info-a-flex-field'>
				<p style='font-size: 20px;color:#333;font-weight: normal;'>Last Name</p>

				<input type='text' id='shipLname' style='width:84%;height: 40px' value='{{userInfos.shipping.shipping_lname}}'>

			</div>
		</div>

		<div class='info-right-flex-field' style='position: relative;margin-top: 30px;'>
			<div class='info-a-flex-field'>
				<p style='font-size: 20px;color:#333;font-weight: normal;'>City</p>

				<input type='text' id='shipCity' style='width:92%;height: 40px' value='{{userInfos.shipping.shipping_city}}'>

			</div>
		</div>

		<div class='info-right-flex-field'  style='position: relative;margin-top: 30px;'>
			<div class='info-a-flex-field'>
				<p style='font-size: 20px;color:#333;font-weight: normal;'>Zip Code</p>

				<input type='text' id='shipZip' style='width:92%;height: 40px' value='{{userInfos.shipping.shipping_zipcode}}'>

			</div>
			<div class='info-a-flex-field'>
				<p style='font-size: 20px;color:#333;font-weight: normal;'>Landmark</p>

				<input type='text' id='shipLandmark' style='width:84%;height: 40px' value='{{userInfos.shipping.shipping_landmark}}'>

			</div>
		</div>

		<div class='info-right-flex-field'  style='position: relative;margin-top: 30px;'>
			<div class='info-a-flex-field'>
				<p style='font-size: 20px;color:#333;font-weight: normal;'>Address</p>

				<input type='text' id='shipAddress' value='{{userInfos.shipping.shipping_address}}' style='width:92%;height: 46px'>

			</div>

		</div>





		<div class='info-right-flex-field'  style='position: relative;margin-top: 48px;'>
			<div class='info-a-flex-field'>


				<button style='width:84%;height: 40px;font-size: 20px;color:#333;float:left;background:transparent;border:1px solid;font-weight: normal;font-family: Moon;' ng-click='updateShipping(userInfos.shipping.shipping_id)'> SAVE CHANGES <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

			</div>
			<div class='info-a-flex-field'>


				<button style='border:1px solid;background:transparent;width:80%;height: 40px;font-size: 20px;float:left;color:#333;font-weight: normal;font-family: Moon;' ng-click='resetShip()'> RESET FIELDS <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

			</div>
		</div>
	</div>

</div>

