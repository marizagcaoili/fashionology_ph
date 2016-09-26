<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Dashboard Controller
 */
class CatalogController extends Controller
{


    /**
     * Initialization hook method.
     *
     * @return void
     */

    //pages
    public function initialize()
    {
        parent::initialize();
    }

    public function items()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
        $this->render('item_list');
        }
    }


    public function angularjs()
    {

        $this->render('angularjs');
    }


    public function getItems()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $items = TableRegistry::get('Items'); // Create Table Object

        $result = $items->getItemList();

        // Expose result to UI
        // $this->set('items', $result);  
        echo json_encode($result);
        exit(); 
    }

    public function getCategoryDetails()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $categories = TableRegistry::get('Categories');

        $categ_id = $this->request->query('category_id');

        $result = $categories->getCatDetails($categ_id);

        echo json_encode($result);

        exit();
    } 

    
    public function addItem()
    {

        $this->autoRender = false;
        header('Content-Type: application/json');

        $item = TableRegistry::get('Items');
        //$add = $brand->query();

        $item_code   = $this->request->data('item_code');
        $brand  = $this->request->data('brand');
        $srp   = $this->request->data('srp');
        $item_name = $this->request->data('item_name');
        $desc = $this->request->data('desc');
        $categoryid = $this->request->data('categoryid');
        $sizes = $this->request->data('sizes');


        $result = $item->insertItem($item_code, $brand, $srp, $item_name, $desc, $categoryid, $sizes);

        $id = $result->lastInsertId('Items');
        echo json_encode($id);      
        exit();
    }

    public function updateItemStatus()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $item = TableRegistry::get('Items');

        $item_id   = $this->request->data('item_id');
        $status = $this->request->data('status');

        $result = $item->updateItemStatus($item_id, $status);

        echo json_encode($result);
        exit();
    }

    public function getDetails()
    {

        $this->autoRender = false;
        header('Content-Type: application/json');

        $item = TableRegistry::get('Items');
        $category = TableRegistry::get('Categories');

        $item_id = $this->request->query('item_id');
       
        $details = $item->getDetails($item_id);

        $response['item'] = $details;

        $response['parent_category'] = $category->getCatDetails($details[0]['category']['parent_id']);
        $response['top_parent_category'] = $category->getCatDetails($details[0]['category']['top_parent']);

        echo json_encode($response);
        exit();

    }
    
    public function editItem()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
        $this->render('edit_item');
        }
    }
    public function itemForm()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
        $this->render('add_item');
        }
    }

    public function deleteItem()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $item = TableRegistry::get('Items');

        $item_id   = $this->request->data('item_id');

        $result= $item->deleteItem($item_id);

        echo json_encode($result);
        exit();
    }

    public function itemsByCategory()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $item = TableRegistry::get('Items');

        $categories = json_decode($this->request->query('categories'));

        $result= $item->itemsByCategory($categories);

        echo json_encode($result);
        exit();
    }


    public function itemsByBrand()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $item = TableRegistry::get('Items');

        $brand_id = $this->request->query('brand_id');

        $result= $item->itemsByBrand($brand_id);

        echo json_encode($result);
        exit();
    }


    public function getParents()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $category= TableRegistry::get('Categories');
        
        $categories= $category->getParents();

        echo json_encode($categories);
        exit();
    }

    public function getCategories()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $category= TableRegistry::get('Categories');
        
        $categories= $category->getCategories();

        echo json_encode($categories);
        exit();
    }

    public function addCategory()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $category = TableRegistry::get('Categories');
        //$add = $brand->query();

        $name   = $this->request->data('category_name');
        $parent = $this->request->data('parent_id');

        $category->insertCategory($name, $parent);

        exit();
    }

    public function topCategory()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $category = TableRegistry::get('Categories');

        $top = $this->request->query('top_parent');
       
        $categories = $category->getCategoryByTop($top);

        echo json_encode($categories);
        exit();
    }

    public function categories()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
        $this->render('category_list');
        }
    }

    public function updateCategoryStatus()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $category = TableRegistry::get('Categories');

        $category_id   = $this->request->data('category_id');
        $status = $this->request->data('status');

        $result = $category->updateCategoryStatus($category_id, $status);

        echo json_encode($result);
        exit();
    }

    public function updateCategory()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $category = TableRegistry::get('Categories');

        $category_id   = $this->request->data('category_id');
        $category_name   = $this->request->data('category_name');
        $parent_id   = $this->request->data('parent_id');

        $result = $category->updateCategory($category_id, $category_name, $parent_id);

        echo json_encode($result);
        exit();
    }

    public function deleteCategory()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $category = TableRegistry::get('Categories');

        $category_id = $this->request->data('category_id');

        $result= $category->deleteCategory($category_id);

        echo json_encode($result);
        exit();
    }

    public function secondCategory()
    {

        $this->autoRender = false;
        header('Content-Type: application/json');

        $category = TableRegistry::get('Categories');

        $parent = $this->request->query('parent_id');
       
        $categories = $category->getCategoryByParent($parent);

        echo json_encode($categories);
        exit();

    }


    public function addBrand()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $brand = TableRegistry::get('Brands');
        //$add = $brand->query();

        $name   = $this->request->data('brand_name');
        $prefix = $this->request->data('brand_prefix');

        $brand->insertBrand($name, $prefix);

        exit();
    }

    public function getBrands()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $brand = TableRegistry::get('Brands');

        $brands = $brand->getBrands();

        echo json_encode($brands);
        exit();
    }

    public function updateBrandStatus()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $brand = TableRegistry::get('Brands');

        $brand_id   = $this->request->data('brand_id');
        $status = $this->request->data('status');

        $result = $brand->updateBrandStatus($brand_id, $status);

        echo json_encode($result);
        exit();
    }

    public function updateBrand()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $brand = TableRegistry::get('Brands');

        $brand_id   = $this->request->data('brand_id');
        $brand_name = $this->request->data('brand_name');
        $brand_prefix = $this->request->data('brand_prefix');

        $result = $brand->updateBrand($brand_id, $brand_name, $brand_prefix);

        echo json_encode($result);
        exit();
    }

    public function getPrefix()
    {

        $this->autoRender = false;
        header('Content-Type: application/json');

        $brand = TableRegistry::get('Brands');

        $prefix = $this->request->query('brand_id');
       
        $brands = $brand->getBrandPrefix($prefix);

        echo json_encode($brands);
        exit();

    }

    public function deleteBrand()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $brand = TableRegistry::get('Brands');

        $brand_id = $this->request->data('brand_id');

        $result= $brand->deleteBrand($brand_id);

        echo json_encode($result);
        exit();
    }

    public function brands()
    {
        $this->render('brand_list');
    }

    public function uploadImage()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');
        $image = TableRegistry::get('Images');

        $description = $this->request->data('description');
        $file   = $this->request->data('file');
        $item_id = $this->request->data('item_id');
        $thumbnail = $this->request->data('thumbnail');

        $imageFileType= pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $imageFileName= pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);

        
        $filename = basename($_FILES['file']['name']);

        $fileKey= md5(microtime().$imageFileName).".".$imageFileType;

        $filePath = "/img/".$fileKey;

        $target_file = IMAGE_DIR . $fileKey;
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

        $image->uploadImage($description, $filename, $filePath, $item_id, $thumbnail);
        echo true;
        
        exit();
    }

    public function sizes()
    {
         $session = $this->request->session();
         $user= $session->read('user.username');

         if($user == null){
 
            return $this->redirect(
            array('controller' => 'login', 'action' => 'index'));
        }
        else{
        $this->render('size_list');
        }
    }

    public function getSizes()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $size = TableRegistry::get('Sizes');

        $sizes = $size->getSizes();

        echo json_encode($sizes);
        exit();     
    }


    public function addSize()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $size = TableRegistry::get('Sizes');
        //$add = $brand->query();

        $size_key   = $this->request->data('size_key');
        $description = $this->request->data('description');

        $size->insertSize($size_key, $description);

        exit();
    }


    public function updateSize()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $size = TableRegistry::get('Sizes');

        $size_id   = $this->request->data('size_id');
        $size_key   = $this->request->data('size_key');
        $size_description = $this->request->data('size_description');


        $result = $size->updateSize($size_id, $size_key, $size_description);

        echo json_encode($result);
        exit();
    }


    public function deleteSize()
    {
        //disable ui rendering
        $this->autoRender = false;
        header('Content-Type: application/json');

        $size = TableRegistry::get('Sizes');

        $size_id   = $this->request->data('size_id');

        $result= $size->deleteSize($size_id);

        echo json_encode($result);
        exit();
    }

    public function getStockSizes()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $size = TableRegistry::get('Sizes');

        $sizes   = json_decode($this->request->query('sizes'));

        $result= $size->getStockSizes($sizes);

        echo json_encode($result);
        exit();   
    }

    public function newStock()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $stock = TableRegistry::get('Stocks');

        $item_id = $this->request->data('item_id');
        $quantity = $this->request->data('quantity');
        $size_id = $this->request->data('size_id');; 

        $result= $stock->newStock( $item_id, $size_id, $quantity);

        echo json_encode($result);
        exit();     
    }

    public function updateStock()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $stock = TableRegistry::get('Stocks');

        $stock_id = $this->request->data('stock_id');
        $quantity = $this->request->data('quantity'); 

        $result= $stock->updateStock($stock_id, $quantity);

        echo json_encode($result);
        exit();     
    }

    public function getStock()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $stock = TableRegistry::get('Stocks');

        $item_id = $this->request->query('item_id');
        $size_id = $this->request->query('size_id');


        $result= $stock->getStock($item_id, $size_id);

        $count = sizeof($result);  
       
        $count = $count == 0 ? true : false;

        echo json_encode($count);
        exit();   
    }

    public function getStockDetails()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $stock = TableRegistry::get('Stocks');

        $item_id = $this->request->query('item_id');
        $size_id = $this->request->query('size_id');

        $result= $stock->getStockDetails($item_id, $size_id);

        echo json_encode($result);
        exit();   
    }

    public function getItemStockDetails()
    {
        $this->autoRender = false;
        header('Content-Type: application/json');

        $stock = TableRegistry::get('Stocks');

        $item_id = $this->request->query('item_id');

        $result= $stock->getItemStockDetails($item_id);

        echo json_encode($result);
        exit();   
    }

    public function test()
    {
        $this->render('test');
    }

    //pages/>

    //display
}
