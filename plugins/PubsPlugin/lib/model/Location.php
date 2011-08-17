<?php

/**
 * Skeleton subclass for representing a row from the 'Location' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Aug 11 13:23:50 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.PubsPlugin.lib.model
 */
class Location extends BaseLocation {

    /**
     * Initializes internal state of Location object.
     * @see        parent::__construct()
     */
    public function __construct() {
        // Make sure that parent constructor is always invoked, since that
        // is where any default values for this object are set.
        parent::__construct();
    }

    public function getFavlikes() {
        
        $i = new Criteria();
        $i->add(FavlikePeer::RECORD_ID, $this->getId());
        $i->add(FavlikePeer::RECORD_MODEL, 'location');
        $i->addDescendingOrderByColumn(FavlikePeer::CREATED_AT);
        return $i = FavlikePeer::doSelect($i);
    }

    public function getComments() {
        $i = new Criteria();
        $i->add(CommentPeer::RECORD_ID, $this->getId());
        $i->add(CommentPeer::RECORD_MODEL, 'location');
        $i->addDescendingOrderByColumn(CommentPeer::CREATED_AT);
        return $i = CommentPeer::doSelect($i);

    }

}

// Location
