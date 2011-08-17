<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUser.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUser extends PluginsfGuardUser {

    public function getImage($h=150, $w=150, $size='thumb') {
        $link = sfConfig::get('app_base_url') . 'PubsPlugin/images/default_avatar.png';
//        if ($this->hasRelation('ProfilePhoto')) {
//            $image = $this->getProfilePhoto()->getPhoto();
//            if (!$image->isNew()) {
//                $link = $image->getThumb($h, $w, $size);
//            }
//        }
        return $link;
    }

    public function getUsersWith($string) {

        return sfGuardUserPeer::getUsersWith($string);
    }

    public function getNewFollowing() {
        $i = new Criteria();
        $i->add(FollowPeer::IS_ACTIVE, $this->record_id);
        return $i = FollowPeer::doSelect($i);
    }

    public static function getFollowing() {
        $i = new Criteria();
        $i->add(FollowPeer::USER_ID, sfContext::getInstance()->getUser()->getGuardUser()->getId());
        return $i = FollowPeer::doSelect($i);
    }

    public static function getFollower() {
        $i = new Criteria();
        $i->add(FollowPeer::FOLLOW_ID, sfContext::getInstance()->getUser()->getGuardUser()->getId());
        return $i = FollowPeer::doSelect($i);
    }

    public function getNewFollows() {

        $i = new Criteria();
        $i->add(FollowPeer::FOLLOW_ID, sfContext::getInstance()->getUser()->getGuardUser()->getId());
        $i->add(FollowPeer::USER_ID, sfContext::getInstance()->getUser()->getGuardUser()->getId(),  Criteria::ALT_NOT_EQUAL);
        $i->add(FollowPeer::IS_ACTIVE, '2');
        return count(FollowPeer::doSelect($i));

    }

    /*     * **********INBOX*************** */

    public function getNewMessages() {
        
        $i = new Criteria();
        $i->add(InboxPeer::DEST_USER_ID, sfContext::getInstance()->getUser()->getGuardUser()->getId());
        $i->add(InboxPeer::USER_ID, sfContext::getInstance()->getUser()->getGuardUser()->getId(),  Criteria::ALT_NOT_EQUAL);
        $i->add(InboxPeer::IS_ACTIVE, false);
        return count(InboxPeer::doSelect($i));
        
//        $w = Doctrine_Query::create()
//                ->from('Inbox i')
//                ->where('i.dest_user_id = ?', sfContext::getInstance()->getUser()->getGuardUser()->getId())
//                ->andWhere('i.user_id != ?', sfContext::getInstance()->getUser()->getGuardUser()->getId())
//                ->andWhere('i.is_active = ?', false);
//        return count($w->execute());
    }

    public function getType() {
        return 'profile';
    }

    public function getDescription() {
        $return = 'Visita el perfil de ' . ($this->getName() != '' ? $this->getName() : $this->getUsername()) .
                ' en ' . sfConfig::get('app_site_name') . '. Comparte fotos, audio, eventos y mucho mas..';
        return $return;
    }

    public function getTitle() {
        return 'Perfil de ' . ($this->getName() != '' ? $this->getName() : $this->getUsername()) . " - Social Sandbox";
    }

}
