<?php

class pubsComponents extends sfComponents {

    public function executeLogged_menubar_container() {
        $this->form = new searchUserForm();

        $user = $this->getUser();
        $i = new Criteria();
        $i->add(PubsPeer::DEST_USER_ID, $user->getGuardUser()->getId());
        $i->add(PubsPeer::USER_ID, $user->getGuardUser()->getId(), Criteria::ALT_NOT_EQUAL);
        $i->add(PubsPeer::IS_ACTIVE, false);
        $this->news = PubsPeer::doSelect($i);

        $o = new Criteria();
        $o->add(FavlikePeer::DEST_USER_ID, $user->getGuardUser()->getId());
        $o->add(FavlikePeer::USER_ID, $user->getGuardUser()->getId(), Criteria::ALT_NOT_EQUAL);
        $o->add(FavlikePeer::IS_ACTIVE, false);
        $this->newsfav = FavlikePeer::doSelect($o);

        $u = new Criteria();
        $u->add(CommentPeer::DEST_USER_ID, $user->getGuardUser()->getId());
        $u->add(CommentPeer::USER_ID, $user->getGuardUser()->getId(), Criteria::ALT_NOT_EQUAL);
        $u->add(CommentPeer::IS_ACTIVE, false);
        $this->newscom = CommentPeer::doSelect($u);

        foreach ($this->news as $pubs):
            if ($pubs->getRecordModel() == 'text' || $pubs->getRecordModel() == 'link')
                NotificationPeer::insertNotification($pubs->getUserId(), $pubs->getDestUserId(), $pubs->getRecordModel(), $pubs->getId(), 'pubs', $pubs->getCreatedAt());
            else
                NotificationPeer::insertNotification($pubs->getUserId(), $pubs->getDestUserId(), $pubs->getRecordModel(), $pubs->getRecordId(), $pubs->getRecordModel(), $pubs->getCreatedAt());
        endforeach;
        foreach ($this->newsfav as $fav):
            NotificationPeer::insertNotification($fav->getUserId(), $fav->getDestUserId(), 'favlike', $fav->getRecordId(), $fav->getRecordModel(), $fav->getCreatedAt());

        endforeach;
        foreach ($this->newscom as $com):
            NotificationPeer::insertNotification($com->getUserId(), $com->getDestUserId(), 'comment', $com->getRecordId(), $com->getRecordModel(), $com->getCreatedAt());
        endforeach;
    }

    public function executeLogout_menubar_container() {
        $this->form = new sfGuardFormSignin();
    }

    public function executeBoxCount() {
        
    }

    public function executeComponent_data_profile() {
        
    }

    public function executeComponent_data_profile_mail() {
        
    }

}

?>