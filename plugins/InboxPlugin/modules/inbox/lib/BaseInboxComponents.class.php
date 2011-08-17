<?php

/**
 * Base Components for the InboxPlugin inbox module.
 * 
 * @package     InboxPlugin
 * @subpackage  base components
 * @author      Dario Sebastian Sasturain SEBARDO <dsastu@gmail.com>
 */
class BaseinboxComponents extends sfComponents {

    public function executeList(sfWebRequest $request) {

        $user = $this->getUser();
        if ($user->isAuthenticated()) {

            $i = new Criteria();
            $i->add(InboxPeer::DEST_USER_ID, $user->getGuardUser()->getId());


            $this->datos = $user->getGuardUser();
        } else {
            $this->redirect('@sf_guard_signin');
        }
        $this->inbox = new sfPropelPager('Inbox', 20);
        $this->inbox->setCriteria($i);
        $this->inbox->setPage($this->getRequestParameter('page', 1));
        $this->inbox->init();


//        $this->pager = new sfPropelPager(
//                        'JobeetJob',
//                        sfConfig::get('app_max_jobs_on_category')
//        );
//        $this->pager->setCriteria($this->category->getActiveJobsCriteria());
//        $this->pager->setPage($request->getParameter('page', 1));
//        $this->pager->init();
        
        
        
    }

    public function executeInboxRight(sfWebRequest $request) {
        $user = $this->getUser();
        if (!$user->isAuthenticated()) {
            $this->redirect('@sf_guard_signin');
        }
    }

    public function executeNewReply(sfWebRequest $request) {
        $this->form = new InboxForm();
        $this->form->setDefault('user_id', $user_sf);
        $this->form->setDefault('dest_user_id', $request->getParameter('id_dest'));
        $this->form->setDefault('reply', true);
        $this->form->setDefault('record_id', $request->getParameter('messageID'));
    }

    public function executeBoxCount(sfWebRequest $request) {
        
    }

    public function executeList_one(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            
            $this->message = InboxPeer::retrieveByPK($this->messageID);
  
            $this->first_message = InboxPeer::retrieveByPK($this->message->getRecordId());

            InboxPeer::activateMessage($this->messageID);
                    

            
            $this->user  = sfGuardUserPeer::retrieveByPk($this->message->getUserId());
        } else {
            $this->redirect('@sf_guard_signin');
        }
    }

    public function executeMessagesInactives(sfWebRequest $request) {

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $i = Doctrine_Query::create()
                    ->from('Inbox i')
                    ->where('i.dest_user_id = ?', $user->getGuardUser()->getId())
                    ->andWhere('i.is_active = ?', false)
                    ->orderBy('i.id DESC')
                    ->limit(30);
            $this->messages = $i->execute();
        }
    }

    public function executeListReplys(sfWebRequest $request) {

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            
            
            $i = new Criteria();
            $i->add(InboxPeer::RECORD_ID, $this->record_id);
            $i->addAscendingOrderByColumn(InboxPeer::CREATED_AT);
            $this->inbox =  $i = InboxPeer::doSelect($i);
            
            
//            $i = Doctrine_Query::create()
//                    ->from('Inbox i')
//                    ->where('i.record_id = ?', $this->record_id)
//                    ->orderBy('i.created_at ASC');
//            $this->inbox = $i->execute();

            $this->datos = $user->getGuardUser();
        } else {
            $this->redirect('@sf_guard_signin');
        }
    }

}
