<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AccountsTable extends Table
{

  public function initialize(array $config)
  {

    $this->table('tbl_account');

    $this->hasOne('Shippings');

  }

  public function userPlace($username,$email,$password,$birthday,$gender,$fname,$lname)
  {

    return $this->query()
    ->insert(['account_username',
      'account_email',
      'account_password',
      'account_birthday',
      'account_fname',
      'account_lname'])
    ->values(['account_username'=>$username,
      'account_email'=>$email,
      'account_password'=>$password,
      'account_birthday'=>$birthday,
      'account_fname'=>$fname,
      'account_lname'=>$lname])
    ->execute();
  }

  public function updateAccount($fname,$lname,$password,$email,$birthday,$username,$account_id){
    return $this->query()->update()
    ->set(['account_fname'=>$fname,'account_lname'=>$lname,'account_password'=>$password,'account_email'=>$email,
     'account_birthday'=>$birthday,'account_username'=>$username])
    ->where(['account_id' => $account_id])
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

  public function fetchUserData($f_account_id)
  {
   return $this->find()
   ->contain(['Shippings'])
   ->where(['Accounts.account_id' => $f_account_id])
   ->toArray();

 }

 public function getActivated()
 {
   return $this->find()
               ->contain(['Shippings'])
               ->where(['account_activated' => 1])
               ->toArray();
 }

 public function getAccounts()
 {
   return $this->find()
               ->contain(['Shippings'])
               ->toArray();
 }


}