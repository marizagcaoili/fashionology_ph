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


class ReviewController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Cookie', ['expiry' => '1 day']);
    }

    public function review(){

       $this->autoRender = false ;
       header('Content-Type: application/json');



       $item_id=$this->request->data('item_id');

        $review = TableRegistry::get('Review'); // Create Table Object

        $result = $review->review($item_id);

        echo json_encode($result);
       exit();

   }


   public function placeReview(){

       $this->autoRender = false ;
       header('Content-Type: application/json');

       $title=$this->request->data('title');
       $message=$this->request->data('message');
       $item_id=$this->request->data('item_id');


        $review = TableRegistry::get('Review'); // Create Table Object

        $result = $review->insertReview($title,$message,$item_id);

        echo json_encode($result);
        exit();
    }

}
