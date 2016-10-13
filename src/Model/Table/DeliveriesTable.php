<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DeliveriesTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_delivery_details');
  }


  public function deliveryPlace($call,$order_id, $delivery_date)
  {
    return $this->query()
               ->insert(['order_id','call_time', 'delivery_date'])
               ->values(['order_id'=>$order_id,'call_time'=>$call, 'delivery_date'=> $delivery_date])
               ->execute();

  }

public function updateDeliveryDetails($order_id, $date)
  {
      return $this->query()->update()
                  ->set(['delivery_date' => $date])
                  ->where(['order_id' => $order_id])
                  ->execute();
  }  

  public function countDeliveries($date)
  {

      return $this->find()
                  ->where(['delivery_date'=>$date])
                  ->toArray();
  }  



}