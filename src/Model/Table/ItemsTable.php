<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ItemsTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('tbl_items');

        $this->belongsTo('Brands');

        $this->hasOne('Images');

        $this->belongsTo('Categories');
    }

    public function getItemList()
    {
    	// Query
        return $this->find()
        ->contain(['Brands', 'Images'])
        ->toArray();
    }

    public function getCategorized($category)
    {
        // Query
        return $this->find()
        ->contain(['Brands'])
        ->where(['category_id' => $category])
        ->toArray();
    }

    
     public function insertItem($item_code, $brand, $srp, $item_name, $desc, $categoryid, $sizes)
    {
        return $this->query()
        ->insert(['item_code', 'brand_id', 'item_srp', 'item_name', 'item_description', 'category_id', 'sizes'])
        ->values(['item_code'=>$item_code, 'brand_id'=>$brand,'item_srp'=>$srp, 'item_name'=>$item_name, 'item_description'=>$desc, 'category_id'=>$categoryid, 'sizes'=>$sizes])
        ->execute();
    }

    public function getDetails($item_id)
    {
        return $this->find()
        ->contain(['Brands', 'Categories'])
        ->where(['item_id' => $item_id])
        ->toArray();
    }


    public function deleteItem($item_id)
    {
        return $this->query()->delete()
        ->where(['item_id' => $item_id])
        ->execute();
    } 

    public function updateItemStatus($item_id, $status)
    {
        return $this->query()->update()
        ->set(['item_status' => $status])
        ->where(['item_id' => $item_id])
        ->execute();
    }


    public function itemsByCategory($categories)
    {
        return $this->find('all', array('conditions' => array('Items.category_id IN' => $categories)))
                    ->contain(['Brands', 'Images'])
                    ->toArray();
    }


    public function itemsByBrand($brand_id)
    {
        return $this->find()
        ->contain(['Brands', 'Images'])
        ->where(['Items.brand_id' => $brand_id])
        ->toArray();
    }

}