<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ContentsTable extends Table
{

  public function initialize(array $config)
  {
    $this->table('tbl_content_manager');
  }

  public function getContent
  {
      return $this->find()
            ->toArray();

  }


}