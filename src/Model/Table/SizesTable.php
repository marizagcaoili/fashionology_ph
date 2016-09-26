<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SizesTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('tbl_size');
    }

    public function getSizes()
    {
        return $this->find()
                    ->select(['size_id', 'size_key', 'size_description', 'status'])
                    ->toArray();
    }

    public function insertSize($key, $description)
    {
    	return $this->query()->insert([ 'size_key', 'size_description'])
    				->values(['size_key' => $key, 'size_description' => $description])
    				->execute();
    }

    public function updateSize($size_id, $size_key, $size_description)
    {
        return $this->query()->update()
                    ->set(['size_key' => $size_key, 'size_description' => $size_description])
                    ->where(['size_id' => $size_id])
                    ->execute();
    }


    public function getStockSizes($sizes)
    {
        return $this->find('all', array('conditions' => array('Sizes.size_id IN' => $sizes)))
                    ->toArray();
    }


    public function deleteSize($size_id)
    {
        return $this->query()->delete()
                    ->where(['size_id' => $size_id])
                    ->execute();
    }   
}

?>