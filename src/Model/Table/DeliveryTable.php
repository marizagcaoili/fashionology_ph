<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DeliveryTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_delivery_details');
  }

  public function deliveryPlace($call,$order_id)
  {
    return $this->query()
               ->insert(['order_id','call_time'])
               ->values(['order_id'=>$order_id,'call_time'=>$call])
               ->execute();

  }


}