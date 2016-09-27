<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class WishlistTable extends Table
{
	public function initialize(array $config)
	{
		$this->table('tbl_wishlist');

		$this->belongsTo('Items');
	
	}

	public function showWishlist($account_id)
	{
		return $this->find()
		->contain(array('Items' => array('Images')))
		->where(['user_id' => $account_id])
		->toArray();

	}

	public function storeWishlist($account_id,$item_id)
	{

		return $this->query()
		->insert(['user_id','item_id'])
		->values(['user_id'=>$account_id,'item_id'=>$item_id])
		->execute();

	}

	public function removeWishlist($wishlist_id)
	{
		return $this->query()->delete()
		->where(['wishlist_id' => $wishlist_id])
		->execute();


	}


}
?>