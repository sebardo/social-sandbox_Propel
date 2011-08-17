<?php 

class locationComponents extends sfComponents
{
    public function executeLocationPub(){
         $i = new Criteria();
         $i->add(LocationPeer::ID, $this->id);
         $this->obj = LocationPeer::doSelectOne($i);
//        $this->obj = Doctrine::getTable('Location')->find($this->id);
    }
}