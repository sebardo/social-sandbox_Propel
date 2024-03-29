<?php

/**
 * Skeleton subclass for performing query and update operations on the 'Comment' table.
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
class CommentPeer extends BaseCommentPeer {

    public static function retrieveById($id) {
        $c = new Criteria();
        $c->add(self::ID, $id);
        return self::doSelectOne($c);
    }

    public static function getComments($user) {
        if (!is_numeric($user)) {
            $i = new Criteria();
            $i->add(sfGuardUserPeer::USERNAME, $user);
            $datos = sfGuardUserPeer::doSelectOne($i);
        } else {
            $datos = sfGuardUserPeer::retrieveByPk($user);
        }

        $i = new Criteria();
        $i->add(CommentPeer::USER_ID, $datos->getId());
        return count(CommentPeer::doSelect($i));
    }

    public static function activate($id=null) {
        $con = Propel::getConnection();

        // select from...
        $c1 = new Criteria();
        $c1->add(self::ID, $id);
        // update set
        $c2 = new Criteria();
        $c2->add(self::IS_ACTIVE, true);

        BasePeer::doUpdate($c1, $c2, $con);

    }
    
    public static function countComments($id=null,$model=null)
    { 
        
         $i = new Criteria();
            $i->add(CommentPeer::RECORD_ID, $id);
            $i->add(CommentPeer::RECORD_MODEL, $model);
        return count(CommentPeer::doSelect($i));

    }

}

// CommentPeer
