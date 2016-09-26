<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PickupTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_pickup_details');
  }

  public function pickupPlace($account_id,$order_id,$pickup_time)
  {
    return $this->query()
               ->insert(['account_id','order_id','pickup_time'])
               ->values(['account_id'=>$account_id,'order_id'=>$order_id,'pickup_time'=>$pickup_time])
               ->execute();

  }


} 