 <!-- Start Modal -->
            <div class="modal fade" id="myAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        </button>
                        <h4 class="modal-title" style='color:#898989;'>Enter Address Information</h4>
                     </div>
                     <div class="modal-body" >
                        <div class='edit-info' >
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>First Name</p>
                                 <p><input type='text' id='fname1' style='height:40px;width:250px;text-transform: capitalize;' value=''></p>
                              </div>
                              <div class='field-a'>
                                 <p>Last Name</p>
                                 <p><input type='text' id='lname1' style='height:40px;width:250px;text-transform: capitalize;' value=' '></p>
                              </div>
                           </div>
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>Contact No.</p>
                                 <p><input type='text' id='contact1' style='height:40px;width:250px;' value=' '></p>
                              </div>
                              <div class='field-a'>
                                 <p>Landmark</p>
                                 <p><input type='text' id='landmark1' style='height:40px;width:250px;text-transform: capitalize;' value=''></p>
                              </div>
                           </div>
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>City</p>
                                 <p><input type='text' id='city1' style='height:40px;width:250px;text-transform: capitalize;' value=''></p>
                              </div>
                              <div class='field-a'>
                                 <p>Postal Code</p>
                                 <p><input type='text' id='postal1' style='height:40px;width:250px;' value=''></p>
                              </div>
                           </div>
                           <div class='info-fields' >
                              <div class='field-a'>
                                 <p>Address</p>
                                 <p><input type='text' id='address1' style='height:40px;width:95.4%;text-transform: uppercase;' value=''></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-simple" data-dismiss="modal" ng-click='useAnother()'>Save</button>
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--  End Modal -->