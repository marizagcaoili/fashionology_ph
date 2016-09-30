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
         <p style='color:#111;font-family: Moon;text-transform: uppercase;'><span ><i class="fa fa-shopping-bag" aria-hidden="true"></i></span> MY BAG </p>


         <div style='float:right;width:70%;height:40px;margin-top:-44px;margin-right:90px;'>
            <div style='width:70%;height:100%;font-size: 20px;font-family: Coves;text-transform: lowercase;' >
               <i class="fa fa-user" aria-hidden="true"></i> Logged in as: <b  ng-show="{{f_account_id == null}}">not logged in</b>
               <b  ng-show="{{f_account_id != null}}">{{userInfos.account_username}}</b>
               &nbsp; &nbsp;<a href='/' style=''>back to store <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>

         </div>

      </div>


      <div class='sec-a collapse '>


         <div class='no-cart' style='border:none;'>
            <p>Currently no items to load in your cart.</p>

            <button class='return-to' ng-click='returnToShop()'>Return to Shop <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
         </div>

         <div class='loaded-items'>
            <div class='loaded-flex'>
               <div class='loaded-a'>

                  <ul ng-init='total=0'>
                     <li ng-repeat='item in items track by $index'>
                        <div class='item-wrap' style='border-color:#cdcdcd;'>
                           <div class='item-wrap-flex'>

                              <div class='item-ab'>
                                 <img src='{{item.file_key}}' width='100%' height='100%'>
                              </div>

                              <div class='item-ac'>
                                    <div class='item-details'>
                                    <p>{{item.item.item_name}} <b style='float:right;'> x {{cart_items_quantity[$index]}} = {{item.item.item_srp * cart_items_quantity[$index]}}.00</b></p>
                                    <p style='font-size: 18px;margin:0;'>PHP {{item.item.item_srp}}.00</p>
                                       <p style='height: 66px;'>{{item.item.item_description}}</p>

                                          <div class='mod-view'  style='position:relative;left: -140px;top:12px;'>
                                             <div class='mod-view-det'>
                                            
                                                <div class='quanti-grp'>
                                                   <div class='quanti-grp-flex'>
                                                      <div class='quanti-grp-a'>
                                                         <button class='qtyminus qty'  ng-click='subtract_quantity(item.item_id, cart_items_quantity[$index],item.item.item_srp)'>
                                                         -
                                                         </button>
                                                      </div>
                                                      <div class='quanti-grp-a'>
                                                         <input type='text' class='qty-txt quantity' value='{{cart_items_quantity[$index]}}' disabled>   
                                                      </div>
                                                      <div class='quanti-grp-a'>
                                                         <button class=' qty qtyright qtyplus' ng-click='add_quantity(item.item_id, cart_items_quantity[$index],item.item.item_srp)'>
                                                         +
                                                         </button>
                                                      </div>
                                                   </div>
                                                </div>
                                                </p>
                                                <p style='display: none;'><span class='det-align'></span></p>
                                                <p> <span class='det-align' style='left:34px;'></span></p
                                             </div>

                                             <button style='position: relative;top:-34px;left:238px;font-family: Moon;border:1px solid;background: transparent;padding: 3px;' ng-click='removeCart(item.item_id,cart_items_quantity[$index], item.item.item_srp)'>Remove</button>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </li>

                  </ul>

               </div>

               <div class='loaded-b'>
                  <div class='load-cash'>
                     <p style='text-align: right;font-family: Moon;padding-right: 8px;font-size: 12px;top:60px;position: relative;'>Note: Delivery fee is offered for free since the ordering transanction in line with delivery is for cavite only.</p>


                     <p style='position:relative;padding-right:10px;top:170px;text-align:right;font-size:20px;font-family: Moon;'>SUBTOTAL = {{total-total *0.12}}</p>

                     <p style='text-align:right;padding-right:10px;position: relative;top:170px;font-size:20px;font-family: Moon;'>VAT = {{total*0.12}}</p>
                  </div>
                  <div class='load-total'>
                     <p >GRAND TOTAL: PHP {{total}}</p>


 
                     <button ng-click='next()'   style='float:right;margin-right: 10px;font-family: Moon;font-size:20px;padding: 4px 24px;margin-top: 16px;font-weight: bold;border:1px solid;background: transparent;'>Checkout <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>



                       
                  </div>
               </div>
            </div>
         </div>



      </div>



      <div class='checkout-header' style='border-top:solid 1px #cdcdcd;'>
         <p style='font-family: Moon;color:#111;'><span ><i class="fa fa-map-marker" aria-hidden="true"></i></span style='margin-left:220px;position: relative;'> delivery address </p>
      </div>
      <div class='sec-b collapse in' style='margin-bottom: 1px;'>

      </style>
      <div class='billing-info'>
         <div >
           <!--  <div class='title-addrs'>
                <p>Billing Information</p>
            </div> -->

            <div class='bill-flex'>
               <div class='each-bill-flex'>
                  <div class='menu-bar'>
                     <p><span class='bill-title'></span><a  data-toggle="modal" data-target="#myModal"><span>Edit <i class="fa fa-pencil" aria-hidden="true"></i></span></a> <a href='#' class='delete'><span><i class="fa fa-trash-o" aria-hidden="true"></i></span></a></p>
                  </div>
                  <div class='info-shipment'  >
                     <div class='info-fields' >
                        <div class='field-a'>
                           <p>First Name</p>
                           <input type="hidden" id="tempid" value='{{userInfos.shipping.shipping_id}}'>
                           <input type="hidden" id="fname2" value='{{userInfos.shipping.shipping_fname}}'>
                           <input type="hidden" id="lname2" value={{userInfos.shipping.shipping_lname}}>
                           <input type="hidden" id="contact2" value="{{userInfos.shipping.shipping_contact}}">
                           <input type="hidden" id="landmark2" value={{userInfos.shipping.shipping_landmark}}>
                           <input type="hidden" id="city2" value={{userInfos.shipping.shipping_city}}>
                           <input type="hidden" id="zipcode2" value="{{userInfos.shipping.shipping_zipcode}}">
                           <input type="hidden" id="address2" value="{{userInfos.shipping.shipping_address}}">
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
                           <p>{{userInfos.shipping.shipping_contact}}</p>
                        </div>
                        <div class='field-a'>
                           <p>Landmark</p>
                           <p>{{userInfos.shipping.shipping_landmark}}</p>
                        </div>
                     </div>
                     <div class='info-fields'>
                        <div class='field-a'>
                           <p>City</p>
                           <p style='text-transform: capitalize;'>{{userInfos.shipping.shipping_city}}</p>
                        </div>
                        <div class='field-a'>
                           <p>Postal Code</p>
                           <p>{{userInfos.shipping.shipping_zipcode}}</p>
                        </div>
                     </div>
                     <div class='info-fields' >
                        <div class='field-a'>
                           <p>Address</p>
                           <p>{{userInfos.shipping.shipping_address}} </p>
                        </div>
                     </div>
                  </div>



                  <div class='add-new'>
                     <a  class='secondary' style='font-family: Moon;position: relative;top:20px;font-weight: bold;margin:0 auto;left:94px;'href='' data-toggle="modal" data-target="#myAddress">Use another Address</a>
                     <a class='primary' style='font-family: Moon;position: relative;top:20px;font-weight: bold;margin:0 auto;left:94px;'href='' data-toggle="modal" ng-click="setPrimary()">Switch to Primary Address</a>
                  </div>




               </div>
            </div>

            <button class='proceed btn-bill' ng-click='delivery()' >Proceed <i class="fa fa-chevron-down" aria-hidden="true"></i></button>




            <div>
            </div>
         </div>
      </div>


   </div>
   <div style='border-top:solid 1px #dcdcdc;' >
      <div class='checkout-header'>
         <p style='color:#111;font-family: Moon;'><i class="fa fa-credit-card-alt" aria-hidden="true"></i><span></span> Cash on Delivery</p>
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

               </ul>
            </div>
            <button class='btn-continue-a btn-o' style='margin-top: -2px;' data-toggle="collapse" data-target="#reviewplace" ng-click='nextStep()'>Proceed to Summary of Orders <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
   </div>
   <div style='border-top:solid 1px #dcdcdc;'>
      
      <div class='sec-d collapse in' style='display: none;' id='reviewplace'  >
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
                              <p style='font-weight:bold;display: none;'>No. of Items Placed</p>
                              <!--     <p style='font-weight:bold;'>shipping fee</p> 
                              <!--       <p style='font-weight:bold;'>VOUCHER</p> -->
                           </div>
                        </div>
                        <div class='total-this-direction'>
                           <div class='total-content-direction' style='padding-left:10px;'>
                              <p style='color:#464646;display:none;text-align: left;font-family:Moon;font-weight: bold;'>{{cart_items_count}}</p>
                              <!--          <p style='color:#464646;text-align: left;font-family:Moon;font-weight: bold;'>NO FEE</p> -->
                              <!--      <p style='color:#464646;text-align: left;font-family:Moon;font-size: 18px;font-weight: bold;'>0.00 %</p> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class='total-this-menu' style='height:46px;'>
                     <div class='total-this-flex-menu'>
                        <div class='total-direction'>
                           <p class='total-grand-direction'>Grand Total</p>
                        </div>
                        <div class='total-this-direction'>
                           <p class='total-grandp-direct'>PHP {{total}}.00</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class='total-menu' style='height:118px;'>
                  <button type="" class='place-btn' ng-click='checkout()'>Proceed to order summary</button>
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
            <?php include LAYOUT_DIR . 'front-editinfo.ctp'; ?>

            <?php include LAYOUT_DIR . 'front-address.ctp'; ?>

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
                        <button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='setSchedule()'>Submit</button>
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
                              <p style='font-family: Coves;font-size: 18px;'>Once your order has been placed. You will receive an ongoing call from our Customer Support. For further notice, you might wanted to check your Delivery Status under "Track my Order" module in User Dashboard!. <br>
                                 Thank you and Happy Shopping!</p>

                                 <p style='position: relative;top:20px;font-weight: bold;'>Please choose the best time to call:</p>

                                 <div style='position: relative;top:30px;height:40px;'>

                                   <div class='timeof-flex' >

                                    <select id='timetoCall' style='width:490px;font-family: Moon;padding: 4px;text-align:center;font-weight:bold;font-size:20px;'>
                                       <option id='timetoCall'>01:00 PM - 03:00 PM</option>
                                       <option id='timetoCall'>03:00 PM - 05:00 PM</option>
                                       <option id='timetoCall'>05:00 PM - 07:00 PM</option>
                                    </select>

                                 </div>

                              </div>

                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='setDelivery()'>Submit</button>
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--  End Modal -->
         </main>
            <?php include LAYOUT_DIR . 'front-login.ctp'; ?>
   

      </body>
      <script>
         $("[name='my-checkbox']").bootstrapSwitch();

         $(".collapse").collapse();


      // $('.select-div').click(function(){
      // 	$(this).addClass('shadow');
      // })
   </script>
   </html>