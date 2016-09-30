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

    public function getNewItemList()
    {
        // Query
        return $this->find()
        ->contain(['Images'])
        ->order('item_created DESC')
        ->limit(8)
        ->toArray();
    }

    public function getRecentItemList()
    {
        // Query
        return $this->find()
        ->contain(['Images'])
        ->order('item_created DESC')
        ->limit(3)
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

    public function getFeaturedItems()
    {
        // Query
        return $this->find()
        ->contain(['Images'])
        ->where(array('featured_flag' => 1))
        ->toArray();
    }

    public function insertItem($item_code, $brand, $srp, $item_name, $desc, $categoryid, $gender, $date)
    {
        return $this->query()
        ->insert(['item_code', 'brand_id', 'item_srp', 'item_name', 'item_description', 'category_id', 'gender','item_created'])
        ->values(['item_code'=>$item_code, 'brand_id'=>$brand,'item_srp'=>$srp, 'item_name'=>$item_name, 'item_description'=>$desc, 'category_id'=>$categoryid,'gender'=>$gender, 'item_created' => $date])

    public function getItemListByGender($gender)
    {
        switch ($gender) {
            case 'men':
            $gid = 1;
            break;
            case 'women':
            $gid = 2;
            break;
            default:
            $gid = 0;
            break;
        }

        // Query
        return $this->find()
        ->contain(['Brands', 'Images'])
        ->where(['gender' => $gid])
        ->toArray();
    }

    public function getDetails($item_id)
    {
        return $this->find()
        ->contain(['Brands', 'Categories', 'Images'])
        ->where(['Items.item_id' => $item_id])
        ->toArray();
    }


    public function deleteItem($item_id)
    {
        return $this->query()
        ->delete()
        ->where(['item_id' => $item_id])
        ->execute();
    } 

    public function updateItemStatus($item_id, $status)
    {
        return $this->query()
        ->update()
        ->set(['featured_flag' => $status])
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

    public function updateItem($item_id, $item_code, $brand, $srp, $item_name, $desc, $categoryid, $gender)
    {
        return $this->query()

                    ->update()
                    ->set(['item_code'=>$item_code, 'brand_id'=>$brand,'item_srp'=>$srp, 'item_name'=>$item_name, 'item_description'=>$desc, 'category_id'=>$categoryid,  'gender'=>$gender])
                    ->where(['item_id' => $item_id])
                    ->execute();
    }

    public function countFeatured()
    {
        return $this->find()
        ->contain(['Brands', 'Images'])
        ->where(['featured_flag' => 1])
        ->toArray();
    }

    public function updateItemStatus1($item_id, $status)
    {
        return $this->query()
                    ->update()
                    ->set(['item_status' => $status])
                    ->where(['item_id' => $item_id])
                    ->execute();
}
    public function getItemModal($item_id)
    {
       return $this->find()
       ->contain(['Brands', 'Categories', 'Images'])
       ->where(['Items.item_id' => $item_id])
       ->toArray();
       
   }

}