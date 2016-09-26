<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */




    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);



    // Front

    $routes->connect('/email', ['controller' => 'home', 'action' => 'email']);

    
    $routes->connect('/', ['controller' => 'home', 'action' => 'index']);

    $routes->connect('/api/images/', ['controller' => 'api','action' => 'apiimage']);

    $routes->connect('/clothing', ['controller' => 'home','action' => 'clothing']);

    $routes->connect('/clothing/item', ['controller' => 'home','action' => 'productview']);

    $routes->connect('/register', ['controller' => 'home','action' => 'register']);


    $routes->connect('/clothing/fetchDetails', ['controller' => 'api','action' => 'productviewer']);


    $routes->connect('/checkout', ['controller' => 'home','action' => 'checkout']);

    $routes->connect('/cart', ['controller' => 'home','action' => 'cart']);
    
    $routes->connect('/user/dashboard', ['controller' => 'home','action' => 'dashboard']);

    $routes->connect('/order/history', ['controller' => 'home','action' => 'history']);


    $routes->connect('/branch', ['controller' => 'home','action' => 'inquiry']);


    $routes->connect('/mixandmatch', ['controller' => 'home','action' => 'mixmatch']);


    $routes->connect('/cook', ['controller' => 'home','action' => 'cooker']);


//review section

    $routes->connect('/product/review/insert', ['controller' => 'review','action' => ' placeReview']);

    $routes->connect('/product/review/view', ['controller' => 'review','action' => 'review']);

    //end of review section

    $routes->connect('/user/profile', ['controller' => 'home','action' => 'userprofile']);


    $routes->connect('/wishlist', ['controller' => 'home','action' => 'wishlist']);


    $routes->connect('/checkout/process', ['controller' => 'home','action' => 'orderprocess']);

    //login


    $routes->connect('/user/login/details', ['controller' => 'login','action' => 'getUserDetails']);

    $routes->connect('/user/id', ['controller' => 'api','action' => 'userIdFetch']);

    $routes->connect('/user/login/add_session', ['controller' => 'login','action' => 'addSession']);

    $routes->connect('/user/information/', ['controller' => 'login','action' => 'fetchUserData']);

//end login

    /**wishlist section**/

    $routes->connect('/display/Wishlist', ['controller' => 'wishlist','action' => 'showWishlist']);


    $routes->connect('/add/Wishlist', ['controller' => 'wishlist','action' => 'storeWishlist']);


    /**customization module**/

    $routes->connect('/mixmatch', ['controller' => 'home','action' => 'mixnandmatch']);


    /**end of customization**/


    /**delivery**/
    $routes->connect('/order/process/delivery', ['controller' => 'order','action' => 'placeDeliver']);
    /*end***/

    /**pickup**/
    $routes->connect('/order/process/pickup', ['controller' => 'order','action' => 'placePickup']);
    
    /*end***/


    /***inquiery controller**/

    $routes->connect('/order/email/send', ['controller' => 'inquiry','action' => 'inquiryReply']);
    
    $routes->connect('/index/inquiry', ['controller' => 'inquiry','action' => 'insertInquiry']);
    
    
    $routes->connect('/email/inquiry', ['controller' => 'inquiry','action' => 'inquiryHome']);
    

    /*loading for canvas***/


    $routes->connect('/load/canvas', ['controller' => 'home','action' => 'loadcanvas']);
    
    /****/



    /**data fetching**/

    $routes->connect('/api/viewToCart', ['controller' => 'api','action' => 'cartView']);

    $routes->connect('/api/addToCart', ['controller' => 'api','action' => 'addToCart']);

    $routes->connect('/api/branch', ['controller' => 'api','action' => 'branch']);

    $routes->connect('/api/removeToCart', ['controller' => 'api','action' => 'removeToCart']);



    $routes->connect('/api/viewToCart', ['controller' => 'api','action' => 'cartView']);


    //adding orders checkout

    $routes->connect('/api/placeorder', ['controller' => 'order','action' => 'orderPlace']);

    $routes->connect('/order/add_ordered_item', ['controller' => 'order','action' => 'addOrderedItem']);

    $routes->connect('/api/totalPrice', ['controller' => 'api','action' => 'priceView']);



    $routes->connect('authentication/', ['controller' => 'login','action' => 'getAuthentication']);

    //adding users register

    $routes->connect('/api/register', ['controller' => 'order','action' => 'userAdd']);

    $routes->connect('/api/address', ['controller' => 'order','action' => 'addressAdd']);

    $routes->connect('/place/shippingdetail', ['controller' => 'order','action' => 'addShippingDetail']);


    // Sample Data

    $routes->connect('/apitest', ['controller' => 'home', 'action' => 'apitest']);

    $routes->connect('/api/sum/', ['controller' => 'api', 'action' => 'register']);

    



    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

Router::prefix('Admin', function ($routes) {
       // Admin
    //Dashboard
    $routes->connect('/admin/dashboard', ['controller' => 'dashboard', 'action' => 'index']);

    $routes->connect('/admin/dashboard/archive', ['controller' => 'dashboard', 'action' => 'archive']);

    $routes->connect('/admin/catalog/angularjs', ['controller' => 'catalog', 'action' => 'angularjs']);

    //Catalog

        //ITEM
           $routes->connect('/admin/catalog/item_form', ['controller' => 'catalog', 'action' => 'itemForm']);

           $routes->connect('/admin/catalog/edit_item', ['controller' => 'catalog', 'action' => 'editItem']);

           $routes->connect('/admin/catalog/add_item', ['controller' => 'catalog', 'action' => 'addItem']);

           $routes->connect('/admin/catalog/items_by_category', ['controller' => 'catalog', 'action' => 'itemsByCategory']);

           $routes->connect('/admin/catalog/items_by_brand', ['controller' => 'catalog', 'action' => 'itemsByBrand']);

           $routes->connect('/admin/catalog/items', ['controller' => 'catalog', 'action' => 'items']);

           $routes->connect('/admin/catalog/get_items', ['controller' => 'catalog', 'action' => 'getItems']);

           $routes->connect('/admin/catalog/get_prefix', ['controller' => 'catalog', 'action' => 'getPrefix']);

           $routes->connect('/admin/catalog/get_details', ['controller' => 'catalog', 'action' => 'getDetails']);

           $routes->connect('/admin/catalog/delete_item', ['controller' => 'catalog', 'action' => 'deleteItem']); 

           $routes->connect('/admin/catalog/update_item', ['controller' => 'catalog', 'action' => 'updateItem']); 

           $routes->connect('/admin/catalog/update_item_status', ['controller' => 'catalog', 'action' => 'updateItemStatus']);

           $routes->connect('/admin/catalog/count_featured', ['controller' => 'catalog', 'action' => 'countFeatured']);
    
        //---/>ITEM


        //CATEGORY

          $routes->connect('/admin/catalog/categories', ['controller' => 'catalog', 'action' => 'categories']);

          $routes->connect('/admin/catalog/add_category', ['controller' => 'catalog', 'action' => 'addCategory']);   

          $routes->connect('/admin/catalog/get_categories', ['controller' => 'catalog', 'action' => 'getCategories']);

          $routes->connect('/admin/catalog/second_category', ['controller' => 'catalog', 'action' => 'secondCategory']);

          $routes->connect('/admin/catalog/top_category', ['controller' => 'catalog', 'action' => 'topCategory']);    

          $routes->connect('/admin/catalog/get_parents', ['controller' => 'catalog', 'action' => 'getParents']);

          $routes->connect ('/admin/catalog/get_categorydetails', ['controller' => 'catalog', 'action' => 'getCategoryDetails']);

          $routes->connect ('/admin/catalog/update_category_status', ['controller' => 'catalog', 'action' => 'updateCategoryStatus']);

          $routes->connect ('/admin/catalog/update_category', ['controller' => 'catalog', 'action' => 'updateCategory']);

          $routes->connect('/admin/catalog/delete_category', ['controller' => 'catalog', 'action' => 'deleteCategory']);


        //--/>CATEGORY

        //BRAND

          $routes->connect('/admin/catalog/brands', ['controller' => 'catalog', 'action' => 'brands']);

          $routes->connect('/admin/catalog/get_brands', ['controller' => 'catalog', 'action' => 'getBrands']);

          $routes->connect('/admin/catalog/add_brand', ['controller' => 'catalog', 'action' => 'addBrand']);

          $routes->connect('/admin/catalog/update_brand_status', ['controller' => 'catalog', 'action' => 'updateBrandStatus']);

          $routes->connect('/admin/catalog/update_brand', ['controller' => 'catalog', 'action' => 'updateBrand']);

          $routes->connect('/admin/catalog/delete_brand', ['controller' => 'catalog', 'action' => 'deleteBrand']);

        //--/>BRAND


        //SIZE

          $routes->connect('/admin/catalog/sizes', ['controller' => 'catalog', 'action' => 'sizes']);

          $routes->connect('/admin/catalog/add_size', ['controller' => 'catalog', 'action' => 'addSize']);

          $routes->connect('/admin/catalog/get_sizes', ['controller' => 'catalog', 'action' => 'getSizes']);

          $routes->connect('/admin/catalog/update_size', ['controller' => 'catalog', 'action' => 'updateSize']);

          $routes->connect('/admin/catalog/delete_size', ['controller' => 'catalog', 'action' => 'deleteSize']);
        

        //--/>SIZE


       
        //IMAGE

           $routes->connect('/admin/catalog/upload_image', ['controller' => 'catalog', 'action' => 'uploadImage']);

           $routes->connect('/admin/catalog/update_image', ['controller' => 'catalog', 'action' => 'updateImage']);

           $routes->connect('/admin/catalog/last_inserted', ['controller' => 'catalog', 'action' => 'lastInserted']);



        //--/> IMAGE


       //STOCKS

           $routes->connect('/admin/catalog/get_stock_sizes', ['controller' => 'catalog', 'action' => 'getStockSizes']);

           $routes->connect('/admin/catalog/new_stock', ['controller' => 'catalog', 'action' => 'newStock']);

           $routes->connect('/admin/catalog/update_stock', ['controller' => 'catalog', 'action' => 'updateStock']);

           $routes->connect('/admin/catalog/get_stock', ['controller' => 'catalog', 'action' => 'getStock']);

           $routes->connect('/admin/catalog/get_stock_details', ['controller' => 'catalog', 'action' => 'getStockDetails']);

          $routes->connect('/admin/catalog/get_item_stock_details', ['controller' => 'catalog', 'action' => 'getItemStockDetails']);
       //--/>STOCKS

    //--/>Catalog


      //ORDERS

           $routes->connect('/admin/order', ['controller' => 'order', 'action' => 'index']);

           $routes->connect('/admin/order/view_order', ['controller' => 'order', 'action' => 'viewOrder']);

           $routes->connect('/admin/order/get_orders', ['controller' => 'order', 'action' => 'getOrders']);
          
           $routes->connect('/admin/order/order_details', ['controller' => 'order', 'action' => 'getOrderDetails']);  
           $routes->connect('/admin/order/ordered_items', ['controller' => 'order', 'action' => 'orderedItems']);

           $routes->connect('/admin/order/update_order_status', ['controller' => 'order', 'action' => 'updateOrderStatus']);       
        //--/>ORDERS

        //LOGIN

           $routes->connect('/admin/login', ['controller' => 'login', 'action' => 'index']);

           $routes->connect('/admin/login/get_admin_details', ['controller' => 'login', 'action' => 'getAdminDetails']);

           $routes->connect('/admin/login/add_session',  ['controller' => 'login', 'action' => 'addSession']);

           $routes->connect('/admin/login/destroy_session',  ['controller' => 'login', 'action' => 'destroySession']);
        
        //--/>LOGIN

       //INQUIRY

           $routes->connect('/admin/inquiry', ['controller' => 'inquiry', 'action' => 'index']);

           $routes->connect('/admin/inquiry/get_inquiries', ['controller' => 'inquiry', 'action' => 'getInquiries']);

           $routes->connect('/admin/inquiry/get_replied_inquiries', ['controller' => 'inquiry', 'action' => 'getRepliedInquiries']);

           $routes->connect('/admin/inquiry/get_unread_inquiries', ['controller' => 'inquiry', 'action' => 'getUnreadInquiries']);

           $routes->connect('/admin/inquiry/inquiry_reply', ['controller' => 'inquiry', 'action' => 'inquiryReply']);

           $routes->connect('/admin/inquiry/inquiry_archive', ['controller' => 'inquiry', 'action' => 'inquiryArchive']);

           $routes->connect('/admin/inquiry/update_read_status', ['controller' => 'inquiry', 'action' => 'updateReadStatus']);

           $routes->connect('/admin/catalog/test', ['controller' => 'inquiry', 'action' => 'test']);



       //--/>INQUIRY

    $routes->fallbacks('DashedRoute');

});


/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();


?>
