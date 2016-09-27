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


class AccountController extends AppController
{

  public function initialize(){
    parent::initialize();
    $this->loadComponent('Cookie', ['expiry' => '1 day']);
  }

  public function updateAccount(){

    $this->autoRender = false;
    header('Content-Type: application/json');

    $fname=$this->request->data('fname');
    $lname=$this->request->data('lname');
    $password=$this->request->data('password');
    $email=$this->request->data('email');
    $birthday=$this->request->data('birthday');
    $username=$this->request->data('username');
    $account_id=$this->request->data('account_id');
 

    $account=TableRegistry::get('Accounts');


    $result = $account->updateAccount($fname,$lname,$password,$email,$birthday,$username,$account_id);



    echo json_encode($account_id);


    exit();    


  }


  public function updateShipping(){

    $this->autoRender = false;
    header('Content-Type: application/json');

    $fname=$this->request->data('fname');
    $lname=$this->request->data('lname');
    $city=$this->request->data('city');
    $postal=$this->request->data('postal');
    $landmark=$this->request->data('landmark');
    $address=$this->request->data('address');
    $shipping_id=$this->request->data('shipping_id');
 

    $account=TableRegistry::get('Shippings');


    $result = $account->updateShipping($fname,$lname,$city,$postal,$landmark,$address,$shipping_id);





    exit();    


  }




}
