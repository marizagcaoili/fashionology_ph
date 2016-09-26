<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class BrandsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('tbl_brand');
    }

    public function getBrands()
    {
    	return $this->find()
    				->select(['brand_id', 'brand_name', 'brand_prefix', 'status'])
    				->toArray();
    }

    public function insertBrand($name, $prefix)
    {
    	return $this->query()->insert([ 'brand_name', 'brand_prefix'])
    				->values([ 'brand_name'=>$name, 'brand_prefix'=>$prefix])
    				->execute();
    }

    public function getBrandPrefix($prefix)
    {
        return $this->find()
                    ->select(['brand_id', 'brand_prefix', 'brand_name'])
                    ->where(['brand_id' => $prefix])
                    ->toArray();
    }

    public function updateBrandStatus($brand_id, $status)
    {
        return $this->query()->update()
                    ->set(['status' => $status])
                    ->where(['brand_id' => $brand_id])
                    ->execute();
    }

    public function updateBrand($brand_id, $brand_name, $brand_prefix)
    {
        return $this->query()->update()
                    ->set(['brand_name' => $brand_name, 'brand_prefix' => $brand_prefix])
                    ->where(['brand_id' => $brand_id])
                    ->execute();
    }  

    public function deleteBrand($brand_id)
    {
        return $this->query()->delete()
                    ->where(['brand_id' => $brand_id])
                    ->execute();
    }     
}
?>