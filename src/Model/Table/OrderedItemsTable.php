<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class OrderedItemsTable extends Table
{

  public function initialize(array $config)
  {
   
        $this->table('tbl_ordered_item');

        $this->belongsTo('Items');
  }

  // public function orderplace($fname,$lname,$contact,$landmark,$city,$postal,$address,$grandtotal,$account_id)
  // {



  // }
  public function addOrderedItem($item_id, $quantity, $order_id)
  {
        return $this->query()
                 ->insert(['item_id', 'quantity', 'order_id'])
                ->values(['item_id' => $item_id, 'quantity' =>$quantity, 'order_id' =>$order_id])
                ->execute();
  }


   public function orderedItems($order_id)
  {
    return $this->find()
          ->contain(array('Items' => array('Images')))
              ->where(['order_id' => $order_id])
              ->toArray();
  }



}