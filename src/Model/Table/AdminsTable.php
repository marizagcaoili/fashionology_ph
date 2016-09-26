<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AdminsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('tbl_admin_details');
    }

    public function getAdminDetails($username, $password)
    {
    	return $this->find()
    				->where(['admin_username' => $username, 'admin_password' => $password])
    				->toArray();
    }

}
?>