
							<div class='info-right-wrap' class='editaccount'>
							
							<div class='title-info-right'>
								<p style='color:#333;font-size: 28px;font-weight: bold;'> Edit Account Information</p>
							</div>

							<div class='info-right-field' style='position: relative;top:28px;width:70%;'>
								<div class='info-right-flex-field'	>
									<div class='info-a-flex-field'>
										<p style='font-size: 20px;color:#333;font-weight: normal;'>First Name</p>
										
										<input type='text' id='accountFname' style='width:92%;height: 40px' value='{{userInfos.account_fname}}'>
										
									</div>
									<div class='info-a-flex-field'>
										<p style='font-size: 20px;color:#333;font-weight: normal;'>Last Name</p>
										
										<input type='text' id='accountLname' style='width:84%;height: 40px' value='{{userInfos.account_lname}}'>
										
									</div>
								</div>

								<div class='info-right-flex-field' style='position: relative;margin-top: 30px;'>
									<div class='info-a-flex-field'>
										<p style='font-size: 20px;color:#333;font-weight: normal;'>Birthday</p>
										
										<input type='text' id='accountBday' style='width:92%;height: 40px' value='{{userInfos.account_bday}}'>
										
									</div>
								</div>

								<div class='info-right-flex-field'  style='position: relative;margin-top: 30px;'>
									<div class='info-a-flex-field'>
										<p style='font-size: 20px;color:#333;font-weight: normal;'>Username</p>
										
										<input type='text' id='accountUsername' style='width:92%;height: 40px' value='{{userInfos.account_username}}'>
										
									</div>
									<div class='info-a-flex-field'>
										<p style='font-size: 20px;color:#333;font-weight: normal;'>Password</p>
										
										<input type='password' id='accountPassword' style='width:84%;height: 40px' value='{{userInfos.account_password}}'>
										
									</div>
								</div>

								<div class='info-right-flex-field'  style='position: relative;margin-top: 30px;'>
									<div class='info-a-flex-field'>
										<p style='font-size: 20px;color:#333;font-weight: normal;'>Email Address</p>
										
										<input type='email' id='accountEmail' value='{{userInfos.account_email}}' style='width:92%;height: 46px'>
										
									</div>
									
								</div>





								<div class='info-right-flex-field'  style='position: relative;margin-top: 48px;'>
									<div class='info-a-flex-field'>
									

										<button style='width:84%;height: 40px;font-size: 20px;color:#333;float:left;background:transparent;border:1px solid;font-weight: normal;font-family: Moon;' ng-click='updateAccount(userInfos.account_id)'> SAVE CHANGES <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
										
									</div>
										<div class='info-a-flex-field'>
									

										<button style='border:1px solid;background:transparent;width:80%;height: 40px;font-size: 20px;float:left;color:#333;font-weight: normal;font-family: Moon;' ng-click='reset()'> RESET FIELDS <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
										
									</div>
								</div>
							</div>

						</div>

