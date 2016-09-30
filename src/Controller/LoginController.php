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
use Cake\Network\Session\DatabaseSession;
use Cake\Mailer\Email;

/**
 * Dashboard Controller
 */
class LoginController extends AppController
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
      $this->render('login');
    }


    public function getUserDetails()
    {
      $this->autoRender = false;
      header('Content-Type: application/json');

      $admin = TableRegistry::get('Accounts');

      $username = $this->request->query('username');

      $password = $this->request->query('password');

      $result = $admin->getUserDetails($username, $password);

      $count = sizeof($result);

      $count = $count == 1 ? true : false;

      if ($count == true) {
       $account_id = $result[0]['account_id'];

       $session_type = 'front'; 
       $session_token = md5(microtime());

       $sessions = TableRegistry::get('Sessions');

       $result_token = $sessions->storeSessionData($account_id, $session_type, $session_token);

       echo json_encode(array("status" => $count, "f_token" => $session_token, 'f_account_id' => $account_id, 'user_info' => $result[0]));
     } else {
      echo json_encode(array("status" => 0));
    }

    exit();
  }

  public function getAuthentication()
  {
   $this->autoRender = false;
   header('Content-Type: application/json');

   $f_token = $this->request->data('f_token');

   $f_account_id = $this->request->data('f_account_id');

   $sessionDatas = TableRegistry::get('Sessions');

   $result = $sessionDatas->retrieveSessionData($f_account_id,'front',$f_token);

   echo json_encode($result);

   exit();
 }

 public function fetchUserData()
 {
      //disable ui rendering
  $this->autoRender = false;

  header('Content-Type: application/json');

  $f_account_id=$this->request->data('f_account_id');
      $users = TableRegistry::get('Accounts'); // Create Table Object

      $result = $users->fetchUserData($f_account_id);

      echo json_encode($result);

      exit();
    }

    public function destroySession()
    {
     $this->autoRender = false;
     header('Content-Type: application/json');


     $session = $this->request->session();

     $session->destroy('user');

     echo json_encode("Session Destroyed");
     exit();
   }

   public function userEmail()
   {
     $this->autoRender = false;
     header('Content-Type: application/json');

     $email_add=$this->request->data('account_email');
     $id=$this->request->data('account_id');

     $message = 'fashionologyph.com/clothing?account_id='.$id;
     $subject = 'FASHIONOLOGY PH CONTACT SUPPORT!';

     $msg='

     <body>
      <p>Please click the link below to verify your account!</p>
      <a href='.$message.'>'.$message.'</a>
     </body>
      ';

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
     ->to($email_add)
     ->subject('Account Verification!')
     ->attachments(array(
      array(
        'file'=>ROOT.'/webroot/front/public/img/logo-white.png',
        'mimetype'=>'image/png',
        'contentId'=>'12345'
        ),
      ))
     ->transport('gmail')
     ->send($msg);


     exit();  


   }

   public function updateUser(){

    $this->autoRender = false;
    header('Content-Type: application/json');

    $account_id=$this->request->data('account_id');

    $account=TableRegistry::get('Users');

    $result=$account->updateUser($account_id);


    echo json_encode($result);

    exit();

  }

}
