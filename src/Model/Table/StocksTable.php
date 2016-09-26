<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class StocksTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('tbl_stock');
        $this->belongsTo('Sizes');
    }

    public function newStock($item_id, $size_id, $quantity)
    {
        $this->query()
             ->insert(['item_id', 'size_id', 'quantity'])
             ->values(['item_id' => $item_id, 'size_id' => $size_id, 'quantity' => $quantity])
             ->execute();
    }

    public function updateStock($stock_id, $quantity)
    {
        $this->query()
             ->update()
             ->set(['quantity' => $quantity])
             ->where(['stock_id' => $stock_id])
             ->execute();
    }

    public function getStock($item_id, $size_id)
    {
        return $this->find()
                    ->where(['item_id' => $item_id, 'size_id' => $size_id])
                    ->toArray();
    }

    public function getStockDetails ($item_id, $size_id)
    {
        return $this->find()
                    ->select(['quantity', 'stock_id'])
                    ->where(['item_id' => $item_id, 'size_id' => $size_id])
                    ->toArray();
    }

    public function getItemStockDetails ($item_id)
    {
        return $this->find()
                    ->contain(['Sizes'])
                    ->select(['Sizes.size_id','quantity', 'Sizes.size_description', 'Sizes.size_key'])
                    ->where(['item_id' => $item_id])
                    ->toArray();
    }

}

?>