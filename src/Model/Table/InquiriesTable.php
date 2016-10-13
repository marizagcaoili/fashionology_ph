<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class InquiriesTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('tbl_inquiry');
    }

    public function placeInquiry($name,$contact,$email,$subject,$message){
        return $this->query()->insert([ 'inquiry_sender_name','inquiry_subject','inquiry_message','inquiry_contact_no','inquiry_email_add'])
                            ->values(['inquiry_sender_name' => $name, 'inquiry_subject' => $subject,
                              'inquiry_message'=>$message,'inquiry_contact_no'=>$contact,'inquiry_email_add'=>$email])
                            ->execute();

    }

    public function getInquiries()
    {
        return $this->find()
                    ->where(['archive_flag' => 0])
                    ->toArray();
    }

    public function getUnreadInquiries()
    {
        return $this->find()
                    ->where(['read_flag' => 0])
                    ->andWhere(['archive_flag' => 0])
                    ->toArray();
    }

    public function getRepliedInquiries()
    {
        return $this->find()
                    ->where(['replied_flag' => 1])
                    ->andWhere(['archive_flag' => 0])
                    ->toArray();
    }

    public function archiveInquiry($inquiry_id)
    {
        return $this->query()->update()
                    ->set(['archive_flag' => 1])
                    ->where(['inquiry_id' => $inquiry_id])
                    ->execute();
    }

    public function updateRead()
    {
        return $this->query()->update()
                    ->set(['read_flag' => 1])
                    ->where(['read_flag' => 0])
                    ->execute();
    }
    public function updateReplied($inquiry_id)
    {
        return $this->query()->update()
                    ->set(['replied_flag' => 1])
                    ->where(['inquiry_id' => $inquiry_id])
                    ->execute();
    }

    public function getArchives()
    {
        return $this->find()
                    ->andWhere(['archive_flag' => 1])
                    ->toArray();
    }

    public function restoreInquiry($inquiry_id)
    {
        return $this->query()->update()
                    ->set(['archive_flag' => 0])
                    ->where(['inquiry_id' => $inquiry_id])
                    ->execute();
    }

    public function deleteInquiry($inquiry_id)
    {
        return $this->query()->delete()
                    ->where(['inquiry_id' => $inquiry_id])
                    ->execute();
    }  
}

?>