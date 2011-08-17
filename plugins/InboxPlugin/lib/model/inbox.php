<?php

/**
 * Skeleton subclass for representing a row from the 'inbox' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed Aug  3 17:54:07 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.InboxPlugin.lib.model
 */
class inbox extends Baseinbox {
    
    public function getUser($id=null) {

        return sfGuardUserPeer::retrieveByPk($this->user_id);
    }
    
     public function getUserDest($id=null) {

        return sfGuardUserPeer::retrieveByPk($this->dest_user_id);
    }
    
    public function getCountMessages($id=null) {
        $criteria = new Criteria();
        $criteria->add(InboxPeer::RECORD_ID, $id);

        return InboxPeer::getCountMessages($criteria);
    }
    
    public function getParentMessage($id=null) {
 
        return InboxPeer::getParentMessage($id);
    }

}

// inbox