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
use Cake\Network\Session\DatabaseSession;
use Cake\Mailer\Email;
/**
 * Dashboard Controller
 */
class DashboardController extends Controller
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
                  
            $this->render('dashboard');  
        }         
             
    }

    public function archiveItems()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
                  
            $this->render('archive_items');  
        }         
             
    }

    public function archiveCategories()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
                  
            $this->render('archive_categories');  
        }         
             
    }

    public function archiveSizes()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
                  
            $this->render('archive_sizes');  
        }         
             
    }

    public function archiveBrands()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
                  
            $this->render('archive_brands');  
        }         
             
    }

    public function archiveOrders()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
                  
            $this->render('archive_orders');  
        }         
             
    }

    public function archiveInquiries()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
                  
            $this->render('archive_inquiries');  
        }         
             
    }

    public function count()
    {

        $this->autoRender = false;
        header('Content-Type: application/json');

        $orders = TableRegistry::get('Orders');
        $inquiries = TableRegistry::get('Inquiries');
        $accounts = TableRegistry::get('Accounts');

        $order = sizeof($orders->getUnseen());
        $inquiry = sizeof($inquiries->getUnreadInquiries());
        $account = sizeof($accounts->getActivated());

        $count = array("orders"=>$order, "inquiries"=>$inquiry, "accounts"=>$account);

        echo json_encode($count);
        exit(); 

    }

     public function getContent()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');
        
        $contents = TableRegistry::get('Contents'); // Create Table Object

        $result = $contents->getContent();

        // Expose result to UI
        // $this->set('items', $result);  
        echo json_encode($result);
        exit();   
    }

    public function reports()
    {
            $this->render('reports');  
    }




}
