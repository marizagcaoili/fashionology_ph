  <!-- Start Modal -->
  <div class="modal fade" modal='showModal'class='modalItem' id="itemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='border-radius: 0px;'>
    <div class="modal-dialog" style='border-radius: 0px;padding:2px;width:880px;'>
        <div class="modal-content" style='border-radius: 0px;width: 880px;height:440px;' ng-repeat='items in itemModal'>


            <section class='modal-a-flex'>

                <div class='modal-flex-a'>
                    <img src='{{items.image.file_key}}' width='100%' height='100%'>
                </div>
                <div class='modal-flex-b'>
                    
                <div class='item-wrap'>
                    
                    <div class='item-name'>
                        <p>{{items.item_name}}</p>
                    </div>

                    <div class='item-price'>
                        <p>PHP {{items.item_srp}}.00</p>
                    </div>

                    <div class='item-desc'>
                        <p>{{items.item_description}}</p>
                    </div>

                    <div class='item-size'>
                        <p>Available Size(s)</p>

                        <ul>
                            <li>S</li>
                            <li>M</li>
                        </ul>
                    </div>

                    <div class='item-action'>
                        <button class='action-cart'  ng:click="addItem(items.item_id,items.item_quantity)"><i class="fa fa-plus" aria-hidden="true"></i> add to bag</button>

                          <button class='action-cart'  ng-click='addtowish($event,items.item_id)' style='background: transparent;color:#111;'><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                    </div>

                </div>


                <div>
                </div>

                </div>


            </section>

        </div>
    </div>
</div>
    <!--  End Modal -->