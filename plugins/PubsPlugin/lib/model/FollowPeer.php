<?php

/**
 * Skeleton subclass for performing query and update operations on the 'Follow' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed Aug 10 14:52:00 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.PubsPlugin.lib.model
 */
class FollowPeer extends BaseFollowPeer {

    public static function getFollowing($user_id=null, $follow_id=null) { 
        $i = new Criteria();
        $i->add(FollowPeer::USER_ID, $user_id);
        $i->add(FollowPeer::FOLLOW_ID, $follow_id);
        return $i = FollowPeer::doSelectOne($i);
    }
    
    public static function retrieveById($id) {
        $c = new Criteria();
        $c->add(self::ID, $id);
        return self::doSelectOne($c);
    }
}

// FollowPeer
