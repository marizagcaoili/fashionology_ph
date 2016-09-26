<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_account');
  }

  public function userPlace($username,$email,$password,$birthday,$gender,$fname,$lname,$address,$city,$state,$postal)
  {

     // array('conditions' => array('Items.item_id IN' => $cart_id)))

    return $this->query()
    ->insert(['account_username',
      'account_email',
      'account_password',
      'account_birthday',
      'account_gender',
      'account_fname',
      'account_lname',
      'account_address',
      'account_city',
      'account_state',
      'account_postal'])
    ->values(['account_username'=>$username,
      'account_email'=>$email,
      'account_password'=>$password,
      'account_birthday'=>$birthday,
      'account_gender'=>$gender,
      'account_fname'=>$fname,
      'account_lname'=>$lname,
      'account_address'=>$address,
      'account_city'=>$city,
      'account_state'=>$state,
      'account_postal'=>$postal])
    ->execute();
  }


  public function getUserDetails($username, $password)
  {
    return $this->find()
    ->where(['account_username' => $username, 'account_password' => $password])
    ->toArray();
  }



  public function getUserData($user)
  {

    return $this->find()
    ->where(['account_username' => $user])
    ->toArray();

  }

  public function getUserId($user)
  {
    return $this->find()
           ->select(['account_id'])
           ->where(['account_username' => $user])
           ->toArray();


  }


}