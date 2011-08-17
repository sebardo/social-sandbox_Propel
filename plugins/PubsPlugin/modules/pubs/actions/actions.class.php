<?php

/**
 * pubs actions.
 *
 * @package    sf_sandbox
 * @subpackage pubs
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pubsActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            if (!$request->getParameter('user')) {
                $this->datos = $user->getGuardUser();
            } else {
                if (!is_numeric($request->getParameter('user'))) {
                    $i = new Criteria();
                    $i->add(sfGuardUserPeer::USERNAME, $request->getParameter('user'));
                    $this->datos = sfGuardUserPeer::doSelectOne($i);
                } else {
//                    $i = new Criteria();
//                    $i->add(sfGuardUserPeer::ID, $request->getParameter('user'));
//                    $this->datos = sfGuardUserPeer::doSelectOne($i);
                    $this->datos = sfGuardUserPeer::retrieveByPk($request->getParameter('user'));
                }
            }
        } else {
            $this->redirect('@sf_guard_signin');
        }
    }

    public function executeNewAdvices(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $i = new Criteria();
            $i->add(PubsPeer::DEST_USER_ID, $user->getGuardUser()->getId());
            $i->add(PubsPeer::USER_ID, $user->getGuardUser()->getId(),  Criteria::ALT_NOT_EQUAL);
            $i->add(PubsPeer::IS_ACTIVE, false);
            $this->news = PubsPeer::doSelect($i);
            
            $o = new Criteria();
            $o->add(FavlikePeer::DEST_USER_ID, $user->getGuardUser()->getId());
            $o->add(FavlikePeer::USER_ID, $user->getGuardUser()->getId(),  Criteria::ALT_NOT_EQUAL);
            $o->add(FavlikePeer::IS_ACTIVE, false);
            $this->newsfav = FavlikePeer::doSelect($o);
            
            $u = new Criteria();
            $u->add(CommentPeer::DEST_USER_ID, $user->getGuardUser()->getId());
            $u->add(CommentPeer::USER_ID, $user->getGuardUser()->getId(),  Criteria::ALT_NOT_EQUAL);
            $u->add(CommentPeer::IS_ACTIVE, false);
            $this->newscom = CommentPeer::doSelect($u);


            foreach ($this->news as $pubs):
                PubsPeer::activatePub($pubs->getId());
            endforeach;
            foreach ($this->newsfav as $fav):
                FavlikePeer::activate($fav->getId());
            endforeach;
            foreach ($this->newscom as $com):
                CommentPeer::activate($com->getId());
            endforeach;
            
            
            $e = new Criteria();
            $e->add(NotificationPeer::IS_ACTIVE, false);
            $notis = NotificationPeer::doSelect($e);
            
//            $notis = $this->getUser()->getGuardUser()->DestUserNotifications->getTable()->findByDQL('is_active=?', array(0));
            foreach ($notis as $noti):
                NotificationPeer::activate($noti->getId());
            endforeach;

            
            $a = new Criteria();
            $a->add(NotificationPeer::DEST_USER_ID, $this->getUser()->getGuardUser()->getId());
            $a->addDescendingOrderByColumn(NotificationPeer::CREATED_AT);
            $a->setLimit(5); 
            $this->notifications = NotificationPeer::doSelect($a);
            
//            $this->notifications = Doctrine_Core::getTable('Notification')
//                    ->createQuery('a')
//                    ->where('dest_user_id=?', $this->getUser()->getGuardUser()->getId())
//                    ->orderBy('created_at DESC')
//                    ->limit(5)
//                    ->execute();

            return $this->getTemplate('newAdvices');
        } else {
            $this->redirect('unauthorized/index');
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new PubsForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($pubs = Doctrine_Core::getTable('Pubs')->find(array($request->getParameter('id'))), sprintf('Object pubs does not exist (%s).', $request->getParameter('id')));
        $this->form = new PubsForm($pubs);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($pubs = Doctrine_Core::getTable('Pubs')->find(array($request->getParameter('id'))), sprintf('Object pubs does not exist (%s).', $request->getParameter('id')));
        $this->form = new PubsForm($pubs);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $i = new Criteria();
        $i->add(PubsPeer::ID, $request->getParameter('id'));
        $pubs = PubsPeer::doSelectOne($i);

        $pubs->delete();

        $this->redirect('pubs/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $pubs = $form->save();

            $this->redirect('pubs/edit?id=' . $pubs->getId());
        }
    }

    public function executeShowLastPub(sfWebRequest $request) {
        $this->setLayout(false);
        $i = new Criteria();
        $i->add(PubsPeer::ID, $request->getParameter('id'));
        $this->pubs = PubsPeer::doSelectOne($i);
        $this->datos = sfGuardUserPeer::retrieveByPk($this->pubs->getDestUserId());
    }

    public function executeInsertPub(sfWebRequest $request) {
        //veo que el usuario este autenticado
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            //creo el objeto y lo cargo
            $pubs = new Pubs();
            $pubs->setUserId($request->getParameter('user_id'));
            $pubs->setDestUserId($request->getParameter('dest_user_id'));
            $pubs->setRecordModel($request->getParameter('model'));
            $pubs->setRecordId($request->getParameter('record'));

            //guardo el objeto
            $pubs->save();
            $this->pub = $pubs;

            $this->redirect('pubs/showLastPub?id=' . $pubs->getId());
        } else {
            $this->redirect('@sf_guard_signin');
        }
    }

    public function executeGetUsersSearch(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        // Parametro 'q', contiene lo que fue introducido en el campo por teclado
        $string = $request->getParameter('q');

        // Consulta al modelo Estado
        $rows = sfGuardUserPeer::getUsersWith($string);
//        $rows = Doctrine::getTable('sfGuardUser')->getUsersWith($string);

        $users = array();
        foreach ($rows as $row) {
            $result = sfGuardUserPeer::retrieveByPk($row->getId());
//            $result = Doctrine::getTable('sfGuardUser')->find($row->getId());

            $image = $result->getImage();
            $users[$row->getId()] = "<a href='" . sfConfig::get('app_base_url') . "pubs?user=" . $row->getUsername() . "'><img src='" . $image . "' width='32' class='thumb' >" . $row->getUsername() . " (" . $row->getName() . ")</a>";
        }

        return $this->renderText(json_encode($users));
    }

    public function executeShare(sfWebRequest $request) {
//        $user = $this->getUser();
//        if ($user->isAuthenticated()) {
        $this->url = $request->getParameter('url');
        $this->graph = OpenGraph::fetch($this->url);
//        } else {
//            $this->redirect('unauthorized/index');
//        }
    }

    public function executeSharebyMail(sfWebRequest $request) {
        $this->form = new sharingForm();
        $user = $this->getUser();
        if ($user->isAuthenticated())
            $this->form->setDefault('sender', $this->getUser()->getGuardUser()->getEmailAddress());
        $this->form->setDefault('url', $request->getParameter('url'));
    }

    public function executeSendShare(sfWebRequest $request) {
        $this->form = new sharingForm();
        $this->processSendShare($request, $this->form);
        $this->setTemplate('sharebyMail');
    }

    protected function processSendShare(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $obj = $request->getParameter($form->getName());
            $this->processMailShare($obj['sender'], $obj['dest'], $obj['url'], $obj['description']);
            $this->getUser()->setFlash('message', 'Your message has been sent to ' . $obj['dest']);
            $this->redirect("pubs/sharebyMail");
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved
due to some errors.');
        }
    }

    protected function processMailShare($email_sender, $dest, $url, $desc) {
        $user = $this->getUser();
        if ($user->isAuthenticated())
            $this->user_sender = $this->getUser()->getGuardUser()->getUsername();
        $this->email_sender = $email_sender;
        $this->email_dest = $dest;
        $this->url = $url;
        $this->description = $desc;
        $body = $this->getPartial('processMailShare');
        $asunto = 'Share by Social SandBox ';
        $message = $this->getMailer()->compose('sandbox@nordestelabs.com', $this->email_dest, $asunto);
        $message->setBody($body, 'text/html');
        $this->getMailer()->send($message);
    }

    public function executeDeleteConfirm(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $this->record_model = $request->getParameter('record_model');
            $this->record_id = $request->getParameter('record_id');
            $this->div_id = $request->getParameter('div_id');
        } else {
            $this->redirect('unauthorized/index');
        }
    }

    public function executeDeletePub(sfWebRequest $request) {

        $user = $this->getUser();
        if ($user->isAuthenticated()) {

            $i = new Criteria();
            $model = $request->getParameter('model') . 'Peer';
            $i->add($model::ID, $request->getParameter('id'));
            $object = $model::doSelectOne($i);

//            $object = Doctrine::getTable($request->getParameter('model'))->find($request->getParameter('id'));
            $object->delete();
            return sfView::NONE;
        } else {
            $this->redirect('unauthorized/index');
        }
    }

    public function executeListAjax(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            if (!$request->getParameter('user')) {
                $this->datos = $user->getGuardUser();
            } else {
                if (!is_numeric($request->getParameter('user'))) {
                    $i = new Criteria();
                    $i->add(sfGuardUserPeer::USERNAME, $request->getParameter('user'));
                    $this->datos = sfGuardUserPeer::doSelectOne($i);
                } else {
                    $this->datos = sfGuardUserPeer::retrieveByPk($request->getParameter('user'));
                }
            }
            if ($request->getParameter('pid')) {

                PubsPeer::activatePub($request->getParameter('pid'));
                $this->pub = PubsPeer::retrieveById($request->getParameter('pid'));
            } else {
                $i = new Criteria();
                $i->add(PubsPeer::DEST_USER_ID, $this->datos->getId());
                $i->addDescendingOrderByColumn(PubsPeer::CREATED_AT);
                $this->pubss = PubsPeer::doSelect($i);

//                $query = Doctrine::getTable('Pubs')->createQuery('p')
//                        ->where('p.dest_user_id = ?', $this->datos->getId())
//                        ->orderBy('p.created_at DESC');
//                $this->pubss = $query->execute();
            }
        } else {
            $this->redirect('unauthorized/index');
        }
    }

    public function executeListAjaxMorePage(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $this->datos = Doctrine::getTable('sfGuardUser')->find($request->getParameter('user_id'));
            $query = Doctrine::getTable('Pubs')->createQuery('p')
                    ->where('p.dest_user_id = ?', $this->datos->getId())
                    ->leftJoin('p.User u')
                    ->leftJoin('p.DestUser uu')
                    ->orderBy('p.created_at DESC');

            $max_per_page = '10';

            $this->pager = new sfDoctrinePager('Pubs', $max_per_page);
            $this->pager->setQuery($query);
            $this->pager->setPage($request->getParameter('page'));
            $this->pager->init();
            $this->cpt = $max_per_page * ($page - 1);
            $this->page = $request->getParameter('page') + 1;
        } else {
            $this->redirect('unauthorized/index');
        }
    }

    public function executePublishing(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $this->pub = new Pubs();
            $this->pub->setUserId($this->getUser()->getGuardUser()->getId());
            $this->pub->setDestUserId($request->getParameter('duid'));
            $this->pub->setRecordModel($request->getParameter('model'));
            $this->pub->setRecordId($request->getParameter('record'));
            $this->pub->save();
        } else {
            $this->redirect('unauthorized/index');
        }
    }

    public function executeSharePub(sfWebRequest $request) {
        $this->forward404Unless($pid = $request->getParameter('pid'), 'No existe el parametro pid');
        $this->forward404Unless($this->pub = Doctrine::getTable('Pubs')->findOneBy('id', $pid), 'No existe publiccion con id= ' . $pid);
        $this->datos = $this->pub->getUser();
        $tags = new OGPTags($this->pub);
        $ogptags = $this->getPartial('ogptags', array('tags' => $tags->getTags()));
        slot('ogptags', $ogptags);
        slot('title', $this->pub->getTitle());
    }

    public function executeProfile(sfWebRequest $request) {
        $user = $this->getUser();

        if (!$request->getParameter('user')) {
            $this->datos = $user->getGuardUser();
        } else {
            if (!is_numeric($request->getParameter('user'))) {
                $this->datos = Doctrine::getTable('sfGuardUser')->findOneBy('username', $request->getParameter('user'), Doctrine::HYDRATE_RECORD);
            } else {
                $this->datos = Doctrine::getTable('sfGuardUser')->find($request->getParameter('user'));
            }
        }
    }

}

