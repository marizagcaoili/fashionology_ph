<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SessionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('tbl_sessions');
    }

    public function storeSessionData($account_id,$session_type,$session_token)
    {

        return $this->query()
        ->insert(['account_id','session_type','session_token'])
        ->values(['account_id'=>$account_id,'session_type'=>$session_type,'session_token'=>$session_token])
        ->execute();
    }

    public function retrieveSessionData($account_id,$session_type,$session_token)
    {

        return $this->find()
        ->where(['account_id' => $account_id,'session_type'=>$session_type,'session_token'=>$session_token,'session_status'=>'0'])
        ->toArray();
    }


}
?>