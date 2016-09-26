<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CategoriesTable extends Table
{
 
    public function initialize(array $config)
    {
        $this->table('tbl_category');
    }

    public function getCategories()
    {
    	return $this->find()
    				->select(['category_id', 'category_name', 'parent_id',  'status'])
    				->toArray();
    }

    public function getParents()
    {
        return $this->find()
                    ->select(['category_id', 'category_name', 'parent_id'])
                    ->where(['parent_id' => 0])
                    ->toArray();
    }

    public function getCategoryByParent($parent)
    {
        return $this->find()
                    ->select(['category_id', 'category_name'])
                    ->where(['parent_id' => $parent])
                    ->toArray();
    }

    public function getCatDetails($category)
    {
        return $this->find()
                    ->select(['category_name', 'parent_id', 'status'])
                    ->where(['category_id'=>$category])
                    ->toArray();
    }

    public function insertCategory($name, $parent)
    {
        return $this->query()
                    ->insert(['category_name', 'parent_id'])
                    ->values(['category_name'=>$name, 'parent_id'=>$parent])
                    ->execute();
    }

    public function updateCategoryStatus($category_id, $status)
    {
        return $this->query()->update()
                    ->set(['status' => $status])
                    ->where(['category_id' => $category_id])
                    ->execute();
    }

    public function updateCategory($category_id, $category_name, $parent_id)
    {
        return $this->query()->update()
                    ->set(['category_name' => $category_name, 'parent_id' => $parent_id])
                    ->where(['category_id' => $category_id])
                    ->execute();
    }  

    public function deleteCategory($category_id)
    {
        return $this->query()->delete()
                    ->where(['category_id' => $category_id])
                    ->execute();
    }      
}

?>