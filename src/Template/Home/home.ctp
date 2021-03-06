<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Fashionology PH</title>

   <?php include LAYOUT_DIR . 'front-script.ctp'; ?>
   <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
   <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
   <script src="/front/public/js/jquery.sticky.js" /></script>

   <style>
      .is-sticky{
         background:#111;
      }
   </style>

   <script>
      $(window).load(function(){
         $("#sticker").unstick();

      });

      $(document).ready(function(){
       $('.category').hide();

       $('#sticker').on('sticky-start', function() { 
       });

       $('.revealcategory').mouseenter(function(){
        $('.category').toggle();
     })
    });
 </script>
 <!-- Core CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 <link href="/front/assets/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="/front/assets/css/material-kit.css" rel="stylesheet"/>
 <link rel="stylesheet" href="/front/public/css/main-style.css">
 <!-- Core Javascript -->
 <script src="https://storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js"></script>
 <link rel="stylesheet" href="/front/public/css/hottest-style.css" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body class="index-page" id='skrollr-body' ng-app="SampleApp"  ng-controller="HomeController"  style='border:none;'>
   <script>


      jQuery(function($) {
       function fixDiv() {
        var featured = $('.featured-sec');
        var masthead=$('.masthead');
         		// class='each-li-div'
         		var $male=$('.section-hot');
         		if ($(window).scrollTop() > 300) {

                $("#sticker").sticky({topSpacing:0, zIndex:999,className:'is-sticky'});
               
                $('#sticker').css('background', 'rgba(255,255,255,1)').fadeIn('slow');
               

                $('.lognowin').css('color','black');
                $('.signmeup').css('color','black');
                $('.userHi').css('color','black');
                $('.getLog').css('color','black');
                $('.cart').css('color','black');

                featured.fadeIn('slow');
                $('.home-index').fadeOut('slow');

             } else {
               featured.fadeOut('slow');
               $("#sticker").unstick();
               $('#sticker').css('background', 'transparent','z-index','999');

               $('.lognowin').css('color','white');
               $('.signmeup').css('color','white');
               $('.userHi').css('color','white');
               $('.getLog').css('color','white');
               $('.cart').css('color','white');


            }

            if ($(window).scrollTop() > 800) {
               $male.fadeIn('slow');
            } else {
               $male.fadeOut('slow');
            }
         }

         $(window).scroll(fixDiv);

         fixDiv();
      });



   </script>
   <header class="masthead" id='sticker'>
      <img src="/front/public/img/logo-black.png" class="logo" style='width:210px;'>
      <nav class="nav-a">
         <ul>
            <a style="color:#a8a8a8;" href="/">
               <li>home </li>
            </a>
            <a class='revealcategory' href='/clothing'>
               <li>clothing <i class="fa fa-angle-down category-show" aria-hidden="true"></i></li>
            </a>
            <a href="/load/canvas">
               <li>mix n match</li>
            </a>
            <a href="/location">
               <li>contact</li>
            </a>
         </ul>
      </nav>
      <nav class="nav-b" >
         <ul>
            <?php include LAYOUT_DIR . 'user_actions_white.ctp'; ?>
            <a class='cart'href="/checkout" style='color:#fff;'>
               <li><i class="fa fa-shopping-cart"  aria-hidden="true"></i></li>
            </a>
            <a class="count-cart" style="position:absolute;
            font-size:8px;
            padding: 4px 8px;
            border-radius:50%;
            background: #e74c3c;" ng-if='cart_items_count > 0'>
            <li>{{cart_items_count}}</li>
         </a>
      </ul>
   </nav>
</header>
<?php include LAYOUT_DIR . 'front-category.ctp'; ?>
<!--main content-->
<div class="category_bar_header" >
   <nav class="sub-nav">
      <ul>
               <!--<a href="/main"><li>Clothing</li></a>
               <a href="#"><li>Mix n Match</li></a>-->
               <!--<a href="/products/"><li>Wishlist</li></a>-->
               <!--<a href="#"><li>Account</li></a>cm
                  <!--<a href="/products/"><li>Our Store</li></a>
               -->
            </ul>
         </nav>
      </div>
      <main class="main-container container_14"  >
         <div class="flex-container"  data-0="opacity:1;"  data-center='opacity:1;'  data--0-top="opacity:.6;" 
         data--100-bottom-top="opacity:0" data-center='opacity:1;'>
         <div class="cover" style="background:url('/front/public/img/bg.jpg');
         background-size:cover;">
         <!--intro-->
         <article class="cover-front"  >
            <h1 style="color:#111;">It feels brand new!</h1>
            <p style="color:#000;font-size:16px;">Fashion is not something that exists in dresses only. Fashion is in the sky, in the street, fashion has to do with ideas, the way we live, what is happening. 
            </p>
            <a href="/clothing" class="shop-now">Shop Now</a>
         </article>
         <div >
            <div style="width:500px;float:right;
            margin-right: 200px;padding:0;margin-top:-150px;" >
            <div  id="carousel" style='border-radius:0px;'>
               <div >
                  <div >
                     <div class="col-md-8 col-md-offset-2" style="width:500px;height:300px;
                     ">
                     <!-- Carousel Card -->
                     <div class="card card-raised card-carousel"
                     style="width:500px;height:300px;">
                     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:500px;height:300px;">
                        <div class="carousel slide" data-ride="carousel"style="width:584px;height:304px;">
                           <!-- Indicators -->
                           <ol class="carousel-indicators">
                              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                           </ol>
                           <!-- Wrapper for slides -->
                           <div class="carousel-inner" >
                              <div class="item active" >
                                 <img src="/front/public/img/onsale.jpg" alt="Awesome Image">
                                 <div class="carousel-caption">
                                 </div>
                              </div>
                              <div class="item">
                                 <img src="/front/public/img/onsale.jpg" alt="Awesome Image">
                                 <div class="carousel-caption">                                            </div>
                              </div>
                              <div class="item">
                                 <img src="/front/public/img/mouthwash.jpg" alt="Awesome Image">
                                 <div class="carousel-caption">
                                 </div>
                              </div>
                           </div>
                           <!-- Controls -->
                           <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                              <i class="material-icons">keyboard_arrow_left</i>
                           </a>
                           <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                              <i class="material-icons">keyboard_arrow_right</i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <!-- End Carousel Card -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<div class="wrapper" style='background:#1c1c1c;'>
   <div class='featured-sec' >
      <div class='fs-div'>
         <div class='fs-div-a'>
            <div class='fs-state' style='height:100px;'>
               <p class='p-fashion' style='color:#fff;'>Featured this Week.</p>
               <p class='p-quote' style='color:#fff;'>Get in touch with the latest item of fashionology each of the week. Providing a high affordable clothing across the globe. Over hundreds of fashion enthusiasts!</p>
            </div>
         </div>
         <div>
            <div class='fs-state-a' style='height:100px;width:90%;margin:0 auto;'>
               <ul style='z-index:999;'>
                  <li class='each-li-div' style='margin-top:6px' ng-repeat="f_item in featured_items track by $index">
                     <div style='position: absolute;width:120px;
                     height:106px;z-index: 1;'>
                     <a href="/clothing/item?item_id={{f_item.item_id}}">
                      <img src='{{f_item.image.file_key}}' style='width:118px;height:104px;'>
                   </a>
                </div>
             </li>
          </ul>
       </div>
    </div>
 </div>
</div>
</div>
<div style='height:740px;'>
   <section class='section-hot' style='border:none;'>
      <section class='section-header-hot'>
         <p>HOT PICKS.</p>
         <p>Don't be into trends. Don't make fashion own you, but you decide what you are, what you want to express by the way you dress and the way to live. Don't make fashion own you</p>
      </section>
      <section class='group-of-hot'>
         <ul>
            <li ng-repeat="n_item in new_items">
               <a style='color:#333;' href="/clothing/item?item_id={{n_item.item_id}}">
                  <section class='member-hot'>
                     <section class='content-member-hot'>
                        <figure>
                           <img src='{{n_item.image.file_key}}' />
                        </figure>
                        <section class='member-toggle'>
                           <section class='top-member-toggle'>
                              <p>New In!</p>
                           </section>
                           <section class='bottom-member-toggle'>
                              <p>{{n_item.item_name}}</p>
                           </section>
                        </section>
                     </section>
                  </section>
               </a>
            </li>
         </ul>
      </section>
   </section>
</div>
<section class='gender-section'>
   <!--men and women-->
   <div class="wrapper" style="border:solid 1px #fff;" data-0='opacity:0.6;' data-10='opacity:1;'>
      <section style="border:solid 1px #fff;" class="gender-male">
         <div class="gender-select" style="position: absolute;width:540px;height:430px;
         margin-left:56px;margin-top:105px;">
         <p class="gender-chc">Men</p>
         <p class="gender-desc">Don't miss out the style you will ever love. Take the verge of being a high fashionable guy! </p>
         <a href="/clothing?mode=men" class="shop-now shop-adjust" style="top:54px;">shop men</a>
      </div>
   </section>
   <section style="border:solid 1px #fff;" class="gender-female">
      <div class="gender-select" style="position: absolute;width:540px;height:430px;
      margin-left:68px;margin-top:105px;">
      <p class="gender-chc">Women</p>
      <p class="gender-desc">Don't miss the chance of being a girl in you. You deserve to be free. Stand Up!</p>
      <a href="/clothing?mode=women" class="shop-now shop-adjust" style="top:54px;margin-left: 176px;">shop women</a>
   </div>
</section>
</div>
</section>
<!--footer-->
<div >
   <div class='about-below' style='border:none;'>
      <section class='about-below-flex'>
         <section class='headline-about'>
            <p>The Store</p>
         </section>
         <section class='headline-about-flex'>
            <section class='headline-about-a'>
               <section class='history-head'>
                  <p>HISTORY</p>
               </section>
               <section class='history-content' style='padding-right: 20px;'>
                  <p>The History itself has the color combination of black and white. It semblance elengance, fashion, and pure elegentness. It started with a cheap one that started with a gold and black but now as the store turns into minimal it gets fit and feat to the fashion enthusiasts.
                  </p>
                  <p>The History itself has the color combination of black and white. It semblance elengance, fashion, and pure elegentness. It started with a cheap one that started with a gold and black but now as the store turns into minimal it gets fit and feat to the fashion enthusiasts.
                  </p>
               </section>
            </section>
            <section  class='headline-about-a'>
               <section class='history-head' style='padding-left: 60px;'>
                  <p>THE LOGO</p>
               </section>
               <section class='history-content' style='padding-left: 60px;'>
                  <p>The Logo itself has the color combination of black and white. It semblance elengance, fashion, and pure elegentness. It started with a cheap one that started with a gold and black but now as the store turns into minimal it gets fit and feat to the fashion enthusiasts.</p>
               </section>
            </section>
         </section>
         <section class='contact-us' style='display: none;'>
            <section class='contact-headline'>
               <p>Get in Touch with Us!</p>
               <p>The Fashionology PH would like to hear a concern from you. Provide the following details below.</p>
            </section>
            <section class='contact-content contact-forms'>
               <section class='contact-flex'>
                  <section class='contact-a'>
                     <p>Place your Name</p>
                     <input type='text' id='name'>
                  </section>
                  <section class='contact-a'>
                     <p> Contact No.</p>
                     <input type='text' id='contact'>
                  </section>
               </section>
               <section class='contact-flex'>
                  <section class='contact-a'>
                     <p>Email Address</p>
                     <input type='text' id='email'>
                  </section>
               </section>
               <section class='contact-flex'>
                  <section class='contact-a'>
                     <p>Place a Subject</p>
                     <input type='text' id='subject'>
                  </section>
               </section>
               <section class='contact-flex' style='height:34.5%;'>
                  <section class='contact-a'>
                     <p>Enter your message </p>
                     <textarea name="" id='message'></textarea>
                  </section>
               </section>

               <section class='contact-flex'>
                  <section class='contact-a'>
                     <button ng-click='inquiry();emailInquiry()' class='inquiry-btn'>SEND INQUIRY</button>
                  </section>
               </section>
            </section>

            <section class='contact-content' style='display: none;'>
               <section class='status-sent'>
                  <p>Congratulations! Your message has been sent! Please check your email address for verification.</p>
               </section>
            </section>
         </section>
      </section>
   </div>
</div>
</div>
<div class='footer' style='height:140px;bottom:0;display: none;'>
   <div class='footer-flex'>
      <div class='footer-flex-b' style='width:329px;'>
         <div class='footer-det'>
            <img src='/front/public/img/logo1.png'>
         </div>
         <div class='footer-det'>
            <ul>
               <a href='#'>
                  <li><i class="fa fa-facebook-official" aria-hidden="true"></i></li>
               </a>
               <a href='#'>
                  <li><i class="fa fa-google" aria-hidden="true"></i></li>
               </a>
               <a href='#'>
                  <li> <i class="fa fa-instagram" aria-hidden="true"></i></li>
               </a>
            </ul>
         </div>
         <div class='footer-det desby'>
            <p >Designed by: Joe Baltazar</p>
         </div>
      </div>
      <div class='footer-flex-b' style='width:400px;'>
         <div class='footer-det sectors'>
            <p>About Us</p>
            <p>Contact Us</p>
            <p>Faqs (Frequently Asks)</p>
            <p>Contact Us</p>
         </div>
      </div>
      <div class='footer-flex-a'>
      </div>
   </div>
</div>
</div>
</main>
<?php include LAYOUT_DIR . 'front-login.ctp'; ?>
<?php include LAYOUT_DIR . 'front-search.ctp'; ?>
<!---->
<!--scripts-->
<!--   Core JS Files   -->
      <!-- <script src="/front/assets/js/jquery.min.js" type="text/javascript"></script>
   --><script src="/front/assets/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="/front/assets/js/material.min.js"></script>
   <script src="/front/public/js/skrollr.min.js"></script>
   <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
   <script src="/front/assets/js/nouislider.min.js" type="text/javascript"></script>
   <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
   <script src="/front/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
   <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
   <script src="/front/assets/js/material-kit.js" type="text/javascript"></script>
      <!-- <script type="text/javascript">
         $().ready(function(){
         	$('.status-sent').hide();
                // the body of this function is in assets/material-kit.js
                materialKit.initSliders();
                window_width = $(window).width();
         
                if (window_width >= 992){
                	big_image = $('.wrapper > .header');
         
                	$(window).on('scroll', materialKitDemo.checkScrollForParallax);
                }
            });
            // var s=skrollr.init();
         </script> -->
      </body>
   <!-- <script src='/front/public/js/scripts-modal.js'></script>
-->
</html>