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

/**
 * Dashboard Controller
 */
class LoginController extends Controller
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


    public function getAdminDetails()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $admin = TableRegistry::get('Admins');

        $username = $this->request->query('username');
        
        $password = $this->request->query('password');

        $result = $admin->getAdminDetails($username, $password);
        
        $count = sizeof($result);  
       
        $count = $count == 1 ? true : false;

        echo json_encode($count);
        exit();
    }

    public function addSession()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $username = $this->request->data('username');
        
        $password = $this->request->data('password');

        $session = $this->request->session();

        $session->write('user.username', $username);


        echo json_encode($session->read('user.username'));
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

}
