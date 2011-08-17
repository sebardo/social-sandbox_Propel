<?php

/**
 * Skeleton subclass for representing a row from the 'Favlike' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed Aug 10 15:20:06 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.PubsPlugin.lib.model
 */
class Favlike extends BaseFavlike {

    /**
     * Initializes internal state of Favlike object.
     * @see        parent::__construct()
     */
    public function __construct() {
        // Make sure that parent constructor is always invoked, since that
        // is where any default values for this object are set.
        parent::__construct();
    }

    public function getUser($id=null) {

        return sfGuardUserPeer::retrieveByPk($this->user_id);
    }
    
    public function getDestUser($id=null) {

        return sfGuardUserPeer::retrieveByPk($this->dest_user_id);
    }

    public function getObject() {
        $i = new Criteria();
        $model = $this->getRecordModel() . 'Peer';
        $i->add($model::ID, $this->getRecordId());
        $i->addDescendingOrderByColumn($model::CREATED_AT);
        return $i = $model::doSelect($i);
    }

}

// Favlike
