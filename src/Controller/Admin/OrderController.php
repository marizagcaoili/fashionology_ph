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
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Dashboard Controller
 */
class OrderController extends Controller
{

    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
        $this->render('order_list');
        }
    }

    public function viewOrder()
    {   
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
        $this->render('view_order');
        }
    }

    public function getOrders()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $orders = TableRegistry::get('Orders');


        $result = $orders->getOrders();

        echo json_encode($result);
        exit();
    }

    public function orderDetails()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $orders = TableRegistry::get('Orders');

        $order_id = $this->request->query['order_id'];

        $result = $orders->orderDetails($order_id);

        echo json_encode($result);
        exit();
    }


    
    
    public function orderedItems()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $orders = TableRegistry::get('OrderedItems');

        $order_id = $this->request->query['order_id'];

        $result = $orders->orderedItems($order_id);

        echo json_encode($result);
        exit();
    }

    public function updateOrderStatus()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $orders = TableRegistry::get('Orders');

        $order_id = $this->request->data['order_id'];
        $status = $this->request->data['status'];

        $result = $orders->updateStatus($order_id, $status);

        echo json_encode($result);
        exit();
    }

}

