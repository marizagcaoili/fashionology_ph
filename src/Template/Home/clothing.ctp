<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Fashionology PH</title>
      <?php include LAYOUT_DIR . 'front-script.ctp'; ?>
      <script src='/front/public/js/script-sub.js'></script>
      <!-- Core CSS -->
      <?php include LAYOUT_DIR . 'front-css.ctp'; ?>
      <!--scripts-->
      <style>
         .arrow-up{
         display: none;
         }
      </style>
   </head>
   <body class="index-page " ng-controller="ClothingController"  ng-app="SampleApp">
      <?php include LAYOUT_DIR . 'front-category.ctp'; ?>
      <script>
         $(document).ready(function(){
           $('.category').hide();
           $('.revealcategory').mouseenter(function(){
             $('.category').toggle();
           });
         });
         
         /**search box**/
         
         $(function () {
           $('a[href="#search"]').on('click', function(event) {
             event.preventDefault();
             $('#search').addClass('open');
             $('#search > form > input[type="search"]').focus();
           });
         
           $('#search, #search button.close').on('click keyup', function(event) {
             if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
               $(this).removeClass('open');
             }
           });
         
         //Do not include! This prevents the form from submitting for DEMO purposes only!
         $('form').submit(function(event) {
           event.preventDefault();
           return false;
         })
         });
         
      </script>
      <div class='prod-index-page'>
         <div>
            <header class="masthead">
               <img src="/front/public/img/logo-black.png" class="logo" style='width:210px;'>
               <nav class="nav-a">
                  <ul>
                     <a target="_self" style="color:#a8a8a8;" href="/">
                        <li>home </li>
                     </a>
                     <a target="_self" class='revealcategory' href='/clothing'>
                        <li>clothing <i class="fa fa-angle-down category-show" aria-hidden="true"></i></li>
                     </a>
                     <a target="_self" href="/load/canvas">
                        <li>mix n match</li>
                     </a>
                     <a target="_self" href="#">
                        <li>lookbook</li>
                     </a>
                  </ul>
               </nav>
               <nav class="nav-b" ng-controller='testController'>
                  <ul>
                     <?php include LAYOUT_DIR . 'user_actions_black.ctp'; ?>
                     <a href="/cart" style='color:#333;' target='_self'>
                        <li><i class="fa fa-shopping-cart"  aria-hidden="true"></i></li>
                     </a>
                     <a  class="count-cart" style="position:absolute;
                        font-size:8px;
                        padding: 4px 8px;
                        border-radius:50%;
                        background: #e74c3c;" ng-if='cart_items_count>0'>
                        <li>{{cart_items_count}}</li>
                     </a>
                  </ul>
               </nav>
            </header>
            <main class="container_14" style="border:none;">
               <script src="/front/public/js/jquery17.js"></script>
               <script src="/front/public/js/scroller.js"></script>
               <section class="top-header-disp" >
                  <p class="header-p" style="opacity: 1;">Shop by Category</p>
                  <div class='top-header-img'>
                  </div>
               </section>
               <div class="content-group">
                  <section class="group-filter-recent" >
                     <p class="indicator-by" style='display: none;'>Filter By <i class="fa fa-filter" aria-hidden="true"></i></p>
                     <div class="filter-group">
                        <div class="filter-group">
                           <div class='filter-it-by'>
                              <div class='header-filters'>
                                 <p>Filter By: Price</p>
                              </div>
                              <div class='filter-it-body'>
                                 <select class='filter-select'>
                                    <option>PHP 1200.00 - PHP 12000.00</option>
                                 </select>
                              </div>
                           </div>
                           <div class='category-it-by' ng-controller='CategoryPrintController'>
                              <p class='category-top'>TOP CATEGORIES</p>
                              <script type="text/ng-template" id="categoryTree">
                                 <p class='parent'>{{ parent.category_name }}</p>
                                  <ul  ng-if="parent.categories">
                                  <span><li ng-repeat="parent in parent.categories" ng-include="'categoryTree'" class='child'>   
                                  </li></span>
                                  </ul>
                              </script>
                              <ul>
                                 <li ng-repeat="parent in parents" ng-include="'categoryTree'" ></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="recent-group" >
                        <p class="indicator-by" style="top:16px;width:190px;">Recent Products</p>
                        <div class="recent-added-group">
                           <ul class="recent-ul-added" >
                              <li ng-repeat="r_item in recent_items">
                                 <div class="recent-each-item" style='width:96%;'>
                                    <a href="/clothing/item?item_id={{r_item.item_id}}" target="_self"><img src="{{r_item.image.file_key}}"/></a>
                                    <p class="product-recent-name">{{r_item.item_name}}</p>
                                    <p class="product-recent-desc">{{r_item.item_description}}</p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </section>
                  <section class="group-products">
                     <div class="top-bar-menu" id='getFixed'>
                        <p class="found-count"><span style="color:#a60400;">00{{pages}}</span> PRODUCTS FOUND.</p>
                        <select class="form-control select-sort" style="width:110px;margin-top: -24px;
                           margin-left: 20px;" >
                           <option value="">sort by</option>
                           <option value="latest">Latest</option>
                           <option value="name">Item Name</option>
                           <option value="print">Price</option>
                        </select>
                        <div class="item-page">
                           <ul class="pagination pagination-info">
                              <li><a href="javascript:void(0);" 
                                 ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1"
                                 ><i class="fa fa-angle-left" aria-hidden="true"></i>&nbsp; prev</a></li>
                              <li class="active"><a href="javascript:void(0);" href=''>1</a></li>
                              <li><a href="javascript:void(0);">2</a></li>
                              <li ><a href="javascript:void(0);">3</a></li>
                              <li><a href="javascript:void(0);">4</a></li>
                              <li><a href="javascript:void(0);">5</a></li>
                              <li><a ng-disabled="currentPage >= data.length/pageSize - 1" ng-click="currentPage=currentPage+1" href="javascript:void(0);">next &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="product-list">
                        <ul class="product-ul-list">
                           <li class='this-list' ng-repeat="item in items | startFrom:currentPage*pageSize | limitTo:pageSize"
                              >
                              <a target="_self" href='/clothing/item?item_id={{item.item_id}}'>
                                 <div class="product-div"
                                    ng-class='class' >
                                    <figure class="prod-figure" id="zoom_05"><img src="{{item.image.file_key}}"></figure>
                                    <p class="product-desc">{{item.item_name}}</p>
                                    <p class="product-price">PHP {{item.item_srp}}.00</p>
                                    <div class="group-menu" ng-app="app">
                                       <ul class="group-menu-ul" bs-popover>
                              <a href ng-click='addtowish($event,item.item_id)' data-toggle="tooltip" data-placement="top" title="Add to Wishlist" data-container="body"
                                 tooltip ><li class="wlist-add"
                                 >
                              <i class='fa fa-heart-o' ng-show="!item.wished" aria-hidden="true"></i>
                              <i class='fa fa-heart' ng-show="item.wished" aria-hidden="true"></i>
                              </li></a>
                              <a  style='color:#111;' href  ng:click="addItem(item.item_id,item.item_quantity)"   data-toggle="tooltip" data-placement="top" title="Add to Cart" ><li class="cart-add"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              </a>
                              </li>
                              </ul>
                              </div>
                              </div>
                           </li>
                           </a>
                        </ul>
                     </div>
                  </section>
               </div>
               <section ></section>
            </main>
         </div>
      </div>
      <div style='height:100px;margin-top: 120px;background:#141414;
         '>
      </div>
      <?php include LAYOUT_DIR . 'front-search.ctp'; ?>
      <?php include LAYOUT_DIR . 'front-search-modal.ctp'; ?>
      <?php include LAYOUT_DIR . 'front-login.ctp'; ?>
   </body>
   <script src='/front/public/js/scripts-modal.js'></script>
   <!--   Core JS Files   -->
   <script src="/front/assets/js/jquery.min.js" type="text/javascript"></script>
   <script src="/front/assets/js/material.min.js"></script>
   <script src="/front/assets/js/material-kit.js" type="text/javascript"></script>
   <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
   <script src="/front/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
</html>