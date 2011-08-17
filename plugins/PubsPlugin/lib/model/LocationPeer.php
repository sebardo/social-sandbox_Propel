<?php

/**
 * Skeleton subclass for performing query and update operations on the 'Location' table.
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
class LocationPeer extends BaseLocationPeer {

    public static function insertLocation($user=null, $desc=null) {

        $loc = new Location();
        $loc->setUserId($user);
        $loc->setDescription($desc);
        //guardo el objeto
        $loc->save();
        return $loc;
    }
    
    public static function retrieveById($id) {
        $c = new Criteria();
        $c->add(self::ID, $id);
        return self::doSelectOne($c);
    }

}

// LocationPeer
