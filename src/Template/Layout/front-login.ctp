  <!-- Start Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='border-radius: 0px;'>
    <div class="modal-dialog" style='border-radius: 0px;padding:2px;width:740px;'>
        <div class="modal-content" style='border-radius: 0px;width: 740px;'>
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                    <h4 class="modal-title">Modal title</h4>
                </div> -->
                <div class="modal-body" style='width:740px;padding:0px;'>

                  <div class='modal-wrap-body'>
                    <div class='modal-this-flex'>
                        <div class='modal-a'>
                            <div class='modal-a-wrap'>
                                <div class='modal-a-a'>
                                    <figure>
                                        <img src='/front/public/img/logo-white.png' />
                                    </figure>
                                </div>
                                <div class='modal-a-b'>
                                    <p>The collaboration of your top online brands.</p>
                                </div>
                            </div>
                        </div>

                        <div class='modal-b' ng-controller='LoginController'>
                            <div class='modal-wrap-b'>
                                <div class='modal-wrap-flex-b'>
                                <p class='login-head'>Login to your account</p>
                                <p class='log-access'>Login to your account to get access with some of the features</p>
                                </div>
                                <div class='modal-wrapper'>
                                    <div class='modal-wrapper-flex'>
                                        <div class='modal-wrapper-a-flex'>
                                            <p class='usa-name'>Username</p>
                                            <input type='text'  id='username'>
                                        </div>
                                    </div>

                                    <div class='modal-wrapper-flex'>
                                        <div class='modal-wrapper-a-flex'>
                                            <p class='usa-name'>Password</p>
                                            <input type='password' id='password'>
                                        </div>
                                    </div>

                                    <div class='modal-wrapper-flex'>
                                        <div class='modal-wrapper-a-flex'>
                                            <a href='/register' target="_self"><p class='keep-me'><!-- <input type='radio'> -->Don't have an account?</p></a>
                                        </div>
                                        <div class='modal-wrapper-a-flex'>
                                            <a class='forgot' href='#'>Forgot your password?</a>
                                        </div>

                                    </div>

                                     <div class='modal-wrapper-flex'>
                                        <div class='modal-wrapper-a-flex'>
                                            <button  ng-click='login()' class='logger-in'>LOG IN <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                        </div>
                                      

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div><!-- 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple">Nice Button</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <!--  End Modal -->