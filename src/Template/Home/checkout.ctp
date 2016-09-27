<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Checkout</title>
   <!--Core CSS-->
   <?php include LAYOUT_DIR . 'front-css.ctp'; ?>
   <!--script-->
   <?php include LAYOUT_DIR . 'front-script.ctp'; ?>
   <script src='/front/public/js/jquery.js'></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <link href="/front/public/switch/bootstrap-switch.css" rel="stylesheet">
   <script src="/front/public/switch/bootstrap-switch.js"></script>
   <link rel='stylesheet' href='/front/public/css/checkout.css' />
</head>
<body ng-app="SampleApp" ng-controller="CheckoutController">
   <header class="masthead"  style='background: #fff;'>
      <!--background: #232323;-->  
   </header>
   <main class='container_14'>
      <div class='checkout-wrap'>


         <div class='checkout-header' style='border-top:solid 1px #cdcdcd;'>
            <p><span ><i class="fa fa-map-marker" aria-hidden="true"></i></span> delivery address </p>
         </div>
         <div class='sec-b collapse' style='margin-bottom: 1px;'>

         </style>
         <div class='billing-info'>
            <div >
               <div class='title-addrs'>
                  <!-- <p>Billing Information</p>-->
               </div>
               <div class='bill-flex'>
                  <div class='each-bill-flex'>
                     <div class='menu-bar'>
                        <p><span class='bill-title'>Billing Information</span><a  data-toggle="modal" data-target="#myModal"><span>Edit <i class="fa fa-pencil" aria-hidden="true"></i></span></a> <a href='#' class='delete'><span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></p>
                     </div>
                     <div class='info-shipment'  >
                        <div class='info-fields' >
                           <div class='field-a'>
                              <p>First Name</p>
                              <p style='text-transform: capitalize;'>{{userInfos.shipping.shipping_fname}} </p>
                           </div>
                           <div class='field-a'>
                              <p>Last Name</p>
                              <p style='text-transform: capitalize;'>{{userInfos.shipping.shipping_lname}} </p>
                           </div>
                        </div>
                        <div class='info-fields'>
                           <div class='field-a'>
                              <p>Contact No.</p>
                              <p>{{userInfos.shipping.shipping_contact}} </p>
                           </div>
                           <div class='field-a'>
                              <p>Landmark</p>
                              <p>{{userInfos.shipping.shipping_landmark}} </p>
                           </div>
                        </div>
                        <div class='info-fields'>
                           <div class='field-a'>
                              <p>City</p>
                              <p style='text-transform: capitalize;'>{{userInfos.shipping.shipping_city}} </p>
                           </div>
                           <div class='field-a'>
                              <p>Postal Code</p>
                              <p>{{userInfos.shipping.shipping_zipcode}} </p>
                           </div>
                        </div>
                        <div class='info-fields' >
                           <div class='field-a'>
                              <p>Address</p>
                              <p>{{userInfos.shipping.shipping_address}} </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button class='proceed btn-bill' ng-click='delivery()' >Proceed <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
               <div>
               </div>
            </div>
         </div>
         <!--end class-->
      </div>
      <div style='border-top:solid 1px #dcdcdc;' >
         <div class='checkout-header'>
            <p><span><i class="fa fa-key" aria-hidden="true"></i></span> mode of payment</p>
         </div>
         <div class='sec-c collapse in' id='method'>
            <div class='select-grp'>
               <div class='select-grp-header'>
                  <p>Please select your mode of payment below:</p>
               </div>
               <div class='select-grping'>
                  <ul>
                     <li>
                        <div class='select-div' id='cash' data-toggle="modal" data-target="#deliverySelect">
                           <div class='cash-on'>
                              <div class='cash-desc'>
                                 <p>Cash on Delivery</p>
                              </div>
                              <div class='line'></div>
                              <div class='under-desc' style='border:none;'>
                                 <p>Please note that your items will be deliver right on your doorstep.</p>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class='select-div' id='pickup'data-toggle="modal" data-target="#branchSelect">
                           <div class='cash-on'>
                              <div class='cash-desc'>
                                 <p>Pick Up</p>
                              </div>
                              <div class='line'>
                              </div>
                              <div class='under-desc pickup-time' style='border:none;'>
                                 <div class='under-desc-flex' style='border:none;'>
                                    <div class='flexible-a' style='border:none;'>
                                       <p><b>TIME OF PICKUP</b></p>
                                       <p style='position: relative;top:10px;'>{{pickUpTime}}</p>
                                    </div>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
               <button class='btn-continue-a btn-o' style='margin-top: -2px;' data-toggle="collapse" data-target="#reviewplace" ng-click='secD()'>Continue</button>
            </div>
         </div>
      </div>
      <div style='border-top:solid 1px #dcdcdc;'>
         <div class='checkout-header'>
            <p><span> <i class="fa fa-shopping-bag" aria-hidden="true"></i></span> review and place order</p>
         </div>
         <div class='sec-d collapse in' id='reviewplace'  ng-init='total=0'>
            <div class='flex-set'>
               <div class='left-flex'>
                  <ul>
                     <li ng-repeat='item in items track by $index'>
                        <div class='each-of-item'>
                           <img src='{{item.file_key}}'>
                           <div class='each-of-detail'>
                              <p class='itemname'>{{item.item.item_name}}</p>
                              <p class='check-desc'>{{item.item.item_description}}</p>
                              <p class='check-desc' style='position:relative;top:34px;left:-142px;text-transform: uppercase;font-weight: bold;font-family: Moon;' ng-init="$parent.total = $parent.total + (item.item.item_srp * cart_items_quantity[$index])" ><b>Quantity:</b> {{cart_items_quantity[$index]}}</p>
                              <div class='close-x'>
                                 <p ng-click='removeCart(item.item_id,cart_items_quantity[$index], item.item.item_srp)'><i class="fa fa-trash-o" aria-hidden="true"></i></p>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class='right-flex'>
                  <div class='total-menu'>
                     <div class='total-this-menu'>
                        <div class='total-this-flex-menu'>
                           <div class='total-direction'>
                              <div class='total-content-direction'>
                                 <p style='font-weight:bold;'>No. of Items Placed</p>
                                 <!--     <p style='font-weight:bold;'>shipping fee</p> -->
                                 <!--       <p style='font-weight:bold;'>VOUCHER</p> -->
                              </div>
                           </div>
                           <div class='total-this-direction'>
                              <div class='total-content-direction' style='padding-left:10px;'>
                                 <p style='color:#464646;text-align: left;font-family:Moon;font-weight: bold;'>{{cart_items_count}}</p>
                                 <!--          <p style='color:#464646;text-align: left;font-family:Moon;font-weight: bold;'>NO FEE</p> -->
                                 <!--      <p style='color:#464646;text-align: left;font-family:Moon;font-size: 18px;font-weight: bold;'>0.00 %</p> -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class='total-this-menu' style='height:46px;'>
                        <div class='total-this-flex-menu'>
                           <div class='total-direction'>
                              <p class='total-grand-direction'>grand total</p>
                           </div>
                           <div class='total-this-direction'>
                              <p class='total-grandp-direct'>PHP {{total}}.00</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class='total-menu' style='height:118px;'>
                     <button type="" class='place-btn' ng-click='nextStep();email()'>PLACE MY ORDER</button>
                     <button type="" class='place-btn' style='margin-right: 10px;'ng-click='backToStore()'>BACK TO STORE  </button>
                  </div>
                        <!-- 
                           <div class='btn-this'>
                           	<button class='order-now'>ORDER NOW</button>
                           </div> -->
                        </div>
                     </div>
                  </div>
               </div>
               <div>
                  <div class='sec-e'>
                  </div>
               </div>
            </div>
            <!-- Start Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content" ng-controller='LoginController'>
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        </button>
                        <h4 class="modal-title" style='color:#898989;'>Edit Information</h4>
                     </div>
                     <div class="modal-body" >
                        <div class='edit-info' >
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>First Name</p>
                                 <p><input type='text' id='fname' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_fname}} '></p>
                              </div>
                              <div class='field-a'>
                                 <p>Last Name</p>
                                 <p><input type='text' id='lname' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_lname}} '></p>
                              </div>
                           </div>
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>Contact No.</p>
                                 <p><input type='text' id='contact' style='height:40px;width:250px;' value='{{userInfos.shipping.shipping_contact}} '></p>
                              </div>
                              <div class='field-a'>
                                 <p>Landmark</p>
                                 <p><input type='text' id='landmark' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_landmark}} '></p>
                              </div>
                           </div>
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>City</p>
                                 <p><input type='text' id='city' style='height:40px;width:250px;text-transform: capitalize;' value='{{userInfos.shipping.shipping_city}} '></p>
                              </div>
                              <div class='field-a'>
                                 <p>Postal Code</p>
                                 <p><input type='text' id='postal' style='height:40px;width:250px;' value='{{userInfos.shipping.shipping_zipcode}} '></p>
                              </div>
                           </div>
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>Address</p>
                                 <p><input type='text' id='address' style='height:40px;width:95.4%;text-transform: uppercase;' value='{{userInfos.shipping.shipping_address}} '></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='updateData(userInfos.shipping.shipping_id)'>Save</button>
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--  End Modal -->
            <!-- Sart Modal -->
            <div class="modal fade" id="branchSelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content" style='padding: 0;'>
                     <div class="modal-header">
                     <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        </button>
                        <h4 class="modal-title" style='color:#898989;'>SPECIFY DATE AND TIME OF PICK UP</h4> -->
                     </div>
                     <div class="modal-body" style='height:200px;'>
                        <div class='setdate-wrap'>
                           <div class='setdatewrap-a'>
                              <p><b>Note</b></p>
                              <p style='margin-top: 6px;'>Take note that we only accept pick ups only weekdays. Between 9AM to 10PM as part of our rules and regulations. </p>
                           </div>
                           <div class='setdatewrap-a' style='margin-top: 10px;'>
                              <p><b>Time of Pick Up</b></p>
                              <div class='timeof'>
                                 <div class='timeof-flex'>
                                    <div class='each-timeof'>
                                       <select class='timeof-select' id='hours'>
                                          <option>11 :</option>
                                          <option>12 :</option>
                                          <option>04 :</option>
                                       </select>
                                    </div>
                                    <div class='each-timeof'>
                                       <select class='timeof-select'  id='minutes'>
                                          <option>  30</option>
                                          <option>  00</option>
                                          <option>  20</option>
                                       </select>
                                    </div>
                                    <div class='each-timeof'>
                                       <select class='timeof-select' id='format'>
                                          <option>  AM</option>
                                          <option>  PM</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='setSchedule()'>Set Schedule</button>
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--  End Modal -->
            <!--start modal-->
            <div class="modal fade" id="deliverySelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content" style='padding: 0;'>
                     <div class="modal-header">
                     <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        </button>
                        <h4 class="modal-title" style='color:#898989;'>SPECIFY DATE AND TIME OF PICK UP</h4> -->
                     </div>
                     <div class="modal-body" style='height:300px;'>
                        <div class='setdate-wrap'>
                           <div class='setdatewrap-a'>
                              <p><b>A friendly reminder from Fashionology PH</b></p>

                           </div>
                           <div class='setdatewrap-a' style='margin-top: -44px;'>
                              <p style='font-family: Coves;font-size: 18px;'>Once your order was already confirmed. You will receive an ongoing call from our Customer Support. For further notice, you might wanted to check your Delivery Status under "Track my Order" module in User Dashboard!. <br>
                                 Thank you and Happy Shopping!</p>

                                 <p style='position: relative;top:20px;font-weight: bold;'>Please choose the best time to call:</p>

                                 <div style='position: relative;top:30px;height:40px;'>

                                   <div class='timeof-flex' >
                                    
                                       <select id='timetoCall' style='width:490px;font-family: Moon;padding: 4px;text-align:center;font-weight:bold;font-size:20px;'>
                                          <option id='timetoCall'>01:00 PM - 03:00 PM</option>
                                          <option id='timetoCall'>03:00 PM - 05:50 PM</option>
                                          <option id='timetoCall'>05:00 PM - 07:00 PM</option>
                                       </select>
                                 
                                 </div>

                              </div>

                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='setDelivery()'>Set as Delivery</button>
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--  End Modal -->
         </main>
      </body>
      <script>
         $("[name='my-checkbox']").bootstrapSwitch();

         $(".collapse").collapse();

         $(document).ready(function()
            $('.each-branch').click(function(){
             $('branches_name').show();
          });
      	// $('#signin').hide();

      	$('.btn-bill').click(function(){

      	})
      });

      // $('.select-div').click(function(){
      // 	$(this).addClass('shadow');
      // })
   </script>
   </html>