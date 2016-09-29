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


class HomeController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Cookie', ['expiry' => '1 day']);
    }

    public function index(){

        $this->render('home');
    }
     public function email(){

        $this->render('email');
    }

    public function clothing(){

        $this->render('clothing');
    }

    public function apitest(){
        $this->render('apitest');
    }

    public function productview(){  
        $this->render('productview');
    }

    public function register(){
        $this->render('accountregister');
    }


    public function login(){
        $this->render('login');
    }

    public function checkout(){
        // Authenticated user
        $f_token = $this->request->query('f_token');
        $f_account_id = $this->request->query('f_account_id');

        if (isset($f_token) && isset($f_account_id)) {
            $sessionDatas = TableRegistry::get('Sessions');
            $session = $sessionDatas->retrieveSessionData($f_account_id,'front',$f_token);

            if (!sizeof($session)) {
                $this->redirect("/");
            }
        } else {
            $this->redirect("/");
        }


        $this->render('checkout');
    }

    public function cart(){
        $this->render('cart');
    }

    public function dashboard(){
        $this->render('dashboard');
    }

    public function history(){
        $this->render('history');
    }

    public function inquiry(){
        $this->render('inquiry');
    }

    public function mixnandmatch(){
        $this->render('mixandmatch');
    }

    public function userprofile(){
        $this->render('userprofile');
    }

    public function wishlist(){
        $this->render('wishlist');
    }

    public function cooker(){
        $this->render('cookie');
    }

    public function orderprocess(){
        $this->render('orderprocess');
    }

    public function loadcanvas(){
        $this->render('canvasloading');
    }

    public function emailConfirm(){
        $this->render('emailconfirm');
    }

    public function location(){
        $this->render('location');
    }

}
