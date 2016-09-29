<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class OrdersTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_order');

    $this->belongsTo('Accounts');

    $this->belongsTo('Shippings');

    $this->hasOne('Deliveries');
  }
  public function orderplace($grandtotal,$reference,$accountId,$paymentmethod,$shippingid)
  {
    return $this->query()
    ->insert(['account_id','order_subtotal','order_reference_number','order_payment_method','shipping_id'])
    ->values(['account_id'=>$accountId,'order_subtotal'=>$grandtotal,'order_reference_number'=>$reference,'order_payment_method'=>$paymentmethod,'shipping_id'=>$shippingid])
    ->execute();
  }

  public function getOrders()
  {
    return $this->find()
    ->contain(['Accounts', 'Shippings'])
    ->toArray();
  }

  public function orderDetails($order_id)
  {
    return $this->find()
    ->contain(['Accounts', 'Shippings', 'Deliveries'])
    ->where(['Orders.order_id' => $order_id])
    ->toArray();
  }

  public function updateStatus($order_id, $status)
  {
    return $this->query()->update()
    ->set(['order_status' => $status])
    ->where(['order_id' => $order_id])
    ->execute();
  }

  public function cancelOrder($order_id, $status)
  {
    return $this->query()->update()
    ->set(['order_status' => $status])
    ->where(['order_id' => $order_id])
    ->execute();
  }



  public function getTrack($account_id)
  {
    return $this->find()
    ->where(['account_id'=>$account_id])
    ->toArray();
  }

  public function itemList(){

  }



}