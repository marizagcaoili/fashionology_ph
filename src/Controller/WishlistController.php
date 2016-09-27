<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */


class WishlistController extends Controller
{

  public function storeWishlist()
  {

   $this->autoRender = false;
   header('Content-Type: application/json');


   $account_id=$this->request->data('account_id');

   $item_id=$this->request->data('item_id');

   // $item_code=1;

   $item = TableRegistry::get('Wishlist');
   
   $result=$item->storeWishlist($account_id,$item_id);

   // $id = $result->lastInsertId('Orders');

   echo json_encode($result);
   exit();

 }

 public function showWishlist()
 {

   $this->autoRender = false;
   header('Content-Type: application/json');


   $account_id=$this->request->data('account_id');


   $item = TableRegistry::get('Wishlist');
   
   $result=$item->showWishlist($account_id);

   echo json_encode($result);
   exit();

 }

 public function removewishlist(){

  $this->autoRender = false;
  header('Content-Type: application/json');


  $wishlist=$this->request->data('wishlist_id');


  $item = TableRegistry::get('Wishlist');

  $result=$item->removeWishlist($wishlist);

  echo json_encode('Success!');


  exit();
}





}
