
<div class='sidebar' style='width:100%;background:rgba(15,15,15,0.8);'>
    <div style='width:26%;float:right;height:100%;background: #fff;'>
        <div class='close-this' style='background: #333;'>
            <p class='closer'> <i class="fa fa-minus-square-o" aria-hidden="true"></i></p>
        </div>

        <div class='cart-side' >

            <div class='cart-head'>
                <p>Cart </p>
            </div>

            <div class='cart-content'>
                <ul class='cart-scroll' style='height: 500px;'>
                    <li ng-repeat='item in item'>
                        <div class='cart-each-content'>
                            <img src='{{item.file_key}}'>

                            <div class='cart-list-content'>
                              
                                <p class='cart-name' style='font-family: Moon;font-weight:normal;font-size: 18px;color:#111;'>{{item.item.item_name}}</p>

                                <p class='cart-price cart-pricer' style='border:none;color:#111;font-size: 26px;font-family:Moon;'>{{item.item.item_srp}}.00</p>
                            </div>
                        </div>
                    </li>



                </ul>

            </div>

            <div class='cart-total'>
                
                <button class='checker'  ng-click='viewcart()'>Check my Cart</button>
                <button class='checker' ng-click='checkout()'>Secure Checkout</button>


           <!--  <button class='cart-view' ng-click='viewcart()'><i class="fa fa-shopping-cart " aria-hidden="true"></i></button><br>
        <button class='cart-checkout' ng-click='checkout()'></button> -->
            </div>

            <div class='cart-button'>
<!--            <button class='cart-view'><i class="fa fa-shopping-cart " aria-hidden="true"></i></button><br>
        <button class='cart-checkout' ></button>
    -->        </ul>
</div>



</div>

</div>
</div>

