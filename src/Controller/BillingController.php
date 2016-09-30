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


class BillingController extends AppController
{

  public function initialize(){
    parent::initialize();
    $this->loadComponent('Cookie', ['expiry' => '1 day']);
  }

  public function updateBill(){

    $this->autoRender = false;
    header('Content-Type: application/json');

    $fname= $this->request->data('fname');
    $lname= $this->request->data('lname');
    $contact = $this->request->data('contact');
    $landmark= $this->request->data('landmark'); 
    $city= $this->request->data('city'); 
    $postal= $this->request->data('postal');
    $address= $this->request->data('address');
    $shipping_id= $this->request->data('shipping_id');

    $shipData=TableRegistry::get('Shippings');


    $result = $shipData->updateBilling($shipping_id,$fname,$lname,$contact,$landmark,$city,$postal,$address);



    echo json_encode($postal);


    exit();    


  }

  public function shippingDetail(){



    $this->autoRender = false;
    header('Content-Type: application/json');

    $shipping_id= $this->request->query('shipping_id');

    $shipData=TableRegistry::get('Shippings');


    $result = $shipData->fetchBilling($shipping_id);



    echo json_encode($result);


    exit();   


  }

}
