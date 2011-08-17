<?php

/**
 * Skeleton subclass for representing a row from the 'Link' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed Aug 10 15:31:23 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.PubsPlugin.lib.model
 */
class Link extends BaseLink {

    public function getFavlikes() {

        $i = new Criteria();
        $i->add(FavlikePeer::RECORD_ID, $this->getId());
        $i->add(FavlikePeer::RECORD_MODEL, 'link');
        $i->addDescendingOrderByColumn(FavlikePeer::CREATED_AT);
        return $i = FavlikePeer::doSelect($i);
    }

    public function getComments() {
        $i = new Criteria();
        $i->add(CommentPeer::RECORD_ID, $this->getId());
        $i->add(CommentPeer::RECORD_MODEL, 'link');
        $i->addDescendingOrderByColumn(CommentPeer::CREATED_AT);
        return $i = CommentPeer::doSelect($i);
    }

}

// Link
