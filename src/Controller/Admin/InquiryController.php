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
class InquiryController extends Controller
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
                  
            $this->render('inquiry');  
        }         
             
    }

    public function getInquiries()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $inquiries = TableRegistry::get('Inquiries'); // Create Table Object

        $result = $inquiries->getInquiries();

        // Expose result to UI
        // $this->set('items', $result);  
        echo json_encode($result);
        exit();    
    }

    public function inquiryReply()
    {
        $this->autoRender = false;
        
        header('Content-Type: application/json');

        $inquiry_id = $this->request->data('inquiry_id');
        $email_address = $this->request->data('email_address');
        $message = $this->request->data('message');
        $subject = $this->request->data('subject');

        Email::configTransport('gmail', [
        'host' => 'ssl://smtp.gmail.com',
        'port' =>  465,
        'username' => 'fashionologyph@gmail.com',
        'password' => 'fashiono',
        'className' => 'Smtp',
        ]);


        $email = new Email('default');
        $email->template('default')
              ->from(['fashionologyph@gmail.com' => 'Fashionology'])
              ->to($email_address)
              ->subject($subject)
              ->transport('gmail')
              ->template('default')
              ->send($message);

        $inquiries = TableRegistry::get('Inquiries'); // Create Table Object
        $result = $inquiries->updateReplied($inquiry_id);      

        exit();  
 
    }

    public function inquiryArchive()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $inquiry_id = $this->request->query('inquiry_id');
        
        $inquiries = TableRegistry::get('Inquiries'); // Create Table Object

        $result = $inquiries->archiveInquiry($inquiry_id);

        // Expose result to UI
        // $this->set('items', $result);  
        echo json_encode($inquiry_id);
        exit();    
    }

    public function getUnreadInquiries()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');
        
        $inquiries = TableRegistry::get('Inquiries'); // Create Table Object

        $result = $inquiries->getUnreadInquiries();

        // Expose result to UI
        // $this->set('items', $result);  
        echo json_encode($result);
        exit();   
    }


    public function getRepliedInquiries()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');
        
        $inquiries = TableRegistry::get('Inquiries'); // Create Table Object

        $result = $inquiries->getRepliedInquiries();

        // Expose result to UI
        // $this->set('items', $result);  
        echo json_encode($result);
        exit();   
    }

    public function updateReadStatus()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');
        
        $inquiries = TableRegistry::get('Inquiries'); // Create Table Object

        $result = $inquiries->updateRead();

        // Expose result to UI
        // $this->set('items', $result);  
        echo json_encode($result);
        exit();   
    }



}
