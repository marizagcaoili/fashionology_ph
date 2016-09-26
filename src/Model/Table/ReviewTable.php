<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ReviewTable extends Table
{

	public function initialize(array $config)
	{
		$this->table('tbl_reviews');
	}


	public function review($item_id){
		

		return $this->find()
		->where(['item_id' => $item_id])
		->toArray();

	}

	public function insertReview($title,$message,$item_id){


		return $this->query()
		->insert(['item_id','review_title','review_message'])
		->values(['item_id'=>$item_id,'review_title'=>$title,'review_message'=>$message])
		->execute();

	}


}