<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DeliveryTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_delivery_details');
  }

  public function deliveryPlace($account_id,$order_id,$delivery_status)
  {
    return $this->query()
               ->insert(['account_id','order_id','delivery_status'])
               ->values(['account_id'=>$account_id,'order_id'=>$order_id,'delivery_status'=>$delivery_status])
               ->execute();

  }


}