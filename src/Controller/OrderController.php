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
use Cake\Mailer\Email;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */


class OrderController extends Controller
{

  public function orderPlace()
  {

   $this->autoRender = false;
   header('Content-Type: application/json');


   $grandtotal=$this->request->data('grandtotal');
   $reference=$this->request->data('order_reference_number');
   $accountId=$this->request->data('account_id');
   $paymentmethod=$this->request->data('order_payment_method');
   $shippingid=$this->request->data('shipping_id');


   // $item_code=1;

   $item = TableRegistry::get('Orders');
   
   $result=$item->orderplace($grandtotal,$reference,$accountId,$paymentmethod,$shippingid);

   $id = $result->lastInsertId('Orders');

   echo json_encode($id);
   exit();

 }

 public function userAdd()
 {

  $username = $this->request->data('account_username');
  $email = $this->request->data('account_email');
  $password = $this->request->data('account_password');
  $birthday = $this->request->data('account_birthday');
  $gender = $this->request->data('account_gender');
  $fname = $this->request->data('account_fname');
  $lname = $this->request->data('account_lname');
  $contact=$this->request->data('account_contact');

  // $address = $this->request->data('account_address');
  // $city = $this->request->data('account_city');
  // $state = $this->request->data('account_state');
  // $postal = $this->request->data('account_postal');

  $this->autoRender=false;
  header('Content-Type: application/json');

  $user=TableRegistry::get('Accounts');


  $result=$user->userPlace($username,$email,$password,$birthday,$gender,$fname,$lname,$contact);

  $id = $result->lastInsertId('Users');
  echo json_encode($id);

  exit();

}

public function addressAdd()  
{
    // $address = $this->request->data('account_address');
  // $city = $this->request->data('account_city');
  // $state = $this->request->data('account_state');
  // $postal = $this->request->data('account_postal');

  $this->autoRender=false;
  header('Content-Type: application/json');

  $account_id=$this->request->data('account_id');
  $account_fname=$this->request->data('account_fname');
  $account_lname=$this->request->data('account_lname');
  $account_address=$this->request->data('account_address');
  $account_city=$this->request->data('account_city');
  $account_postal=$this->request->data('account_zipcode');



  $address=TableRegistry::get('Shippings');

  $address->addressInsert($account_id,$account_fname,$account_lname,$account_address,$account_city,$account_postal);

  // echo json_encode($account_id);

  exit();

}

public function addOrderedItem()
{

 $this->autoRender=false;
 header('Content-Type: application/json');

 $order=TableRegistry::get('OrderedItems');

 $item_id = $this->request->data('item_id');
 $quantity = $this->request->data('quantity');
 $order_id = $this->request->data('order_id');

 $order->addOrderedItem($item_id, $quantity, $order_id);


 exit();
}

public function placeDeliver()
{

  $this->autoRender=false;
  header('Content-Type: application/json');

  $order=TableRegistry::get('Deliveries');

  $order_id =$this->request->data('order_id');

  $quantity = $this->request->data('quantity');
  $call = $this->request->data('call_time');
  $email_address =$this->request->data('email_address');


  $order->deliveryPlace($call,$order_id);





  $message = '


  <body>

    Thank you for ordering to Fashionology PH. We will send to you another email once the
    order has been confirmed!
    This is the selected time of your call  <b>'.$call.'</b>

  </body>

  ';
  $subject = 'FASHIONOLOGY PH CONTACT SUPPORT!';

  Email::configTransport('gmail', [
    'host' => 'ssl://smtp.gmail.com',
    'port' =>  465,
    'username' => 'fashionologyph@gmail.com',
    'password' => 'fashiono',
    'className' => 'Smtp',
    ]);


  $email = new Email('default');
  $email->template('default')
  ->emailFormat('html')
  ->from(['fashionologyph@gmail.com' => 'Fashionology'])
  ->to($email_address)
  ->subject('$subject')
  ->attachments(array(
    array(
      'file'=>ROOT.'/webroot/front/public/img/logo-white.png',
      'mimetype'=>'image/png',
      'contentId'=>'12345'
      ),
    ))
  ->transport('gmail')
  ->send($message);

  echo json_encode($call);

  exit();  





}


public function placePickup()
{

  $this->autoRender=false;
  header('Content-Type: application/json');

  $order=TableRegistry::get('Pickup');

  $account_id = $this->request->data('account_id');
  $order_id = $this->request->data('order_id');
  $pickup_time = $this->request->data('pickup_time');


  $order->pickupPlace($account_id,$order_id,$pickup_time);



  exit();
}



public function emailNotify()
{

  $this->autoRender=false;
  header('Content-Type: application/json');


  $email_address =$this->request->data('email_address');



  $message = '


  <body>

    Thank you for ordering to Fashionology PH. We will send to you another email once the
    order has been confirmed!

  </body>

  ';
  $subject = 'FASHIONOLOGY PH CONTACT SUPPORT!';

  Email::configTransport('gmail', [
    'host' => 'ssl://smtp.gmail.com',
    'port' =>  465,
    'username' => 'fashionologyph@gmail.com',
    'password' => 'fashiono',
    'className' => 'Smtp',
    ]);


  $email = new Email('default');
  $email->template('default')
  ->emailFormat('html')
  ->from(['fashionologyph@gmail.com' => 'Fashionology'])
  ->to($email_address)
  ->subject($subject)
  ->attachments(array(
    array(
      'file'=>ROOT.'/webroot/front/public/img/logo-white.png',
      'mimetype'=>'image/png',
      'contentId'=>'12345'
      ),
    ))
  ->transport('gmail')
  ->send($message);

  exit();  




}

public function trackOrder(){
 $this->autoRender=false;
 header('Content-Type: application/json');


 // $account_id = $this->request->data('account_id');
 // $order_id = $this->request->data('order_id');
 // $pickup_time = $this->request->data('pickup_time');

 $account_id=$this->request->data('f_account_id');


 $order=TableRegistry::get('Orders');


 $result= $order-> getTrack($account_id);

 echo json_encode($result);


 exit();

}

public function orderCancel(){

  $this->autoRender=false;
 header('Content-Type: application/json');


 // $account_id = $this->request->data('account_id');
 // $order_id = $this->request->data('order_id');
 // $pickup_time = $this->request->data('pickup_time');

 $order_id=$this->request->data('order_id');
 $status='CANCELLED';


 $order=TableRegistry::get('Orders');


 $result= $order->cancelOrder($order_id, $status);

 echo json_encode($result);


 exit();

}



}
