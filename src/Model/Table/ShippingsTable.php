<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ShippingsTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_shipping_details');

  }

  public function addShippingDetail($user_id){

    return $this->query()
    ->insert(['account_id'])
    ->values(['account_id' => $user_id])
    ->execute();
  }

  public function addressInsert($account_id,$account_fname,$account_lname,$account_address,$account_city,$account_postal)
  {
    return $this->query()
    ->insert(['account_id','shipping_fname','shipping_lname','shipping_address','shipping_city','shipping_zipcode'])
    ->values(['account_id'=>$account_id,'shipping_fname'=>$account_fname,'shipping_lname'=>$account_lname,
     'shipping_address'=>$account_address,'shipping_city'=>$account_city,'shipping_zipcode'=>$account_postal])
    ->execute();
  }

  public function updateBilling($shipping_id,$fname,$lname,$contact,$landmark,$city,$postal,$address)
  {

    return $this->query()->update()
    ->set(['shipping_fname'=>$fname,'shipping_lname'=>$lname,'shipping_contact'=>$contact,
           'shipping_landmark'=>$landmark,'shipping_city'=>$city,'shipping_zipcode'=>$postal,
           'shipping_address'=>$address])
    ->where(['shipping_id' => $shipping_id])
    ->execute();


  }


}