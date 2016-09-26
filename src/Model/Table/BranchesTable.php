<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class BranchesTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('tbl_branch');

    }

    public function branch(){
        return $this->find()
                    ->toArray();
    }
}