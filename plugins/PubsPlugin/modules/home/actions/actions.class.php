<?php

/**
 * home actions.
 *
 * @package    PubsPlugin
 * @subpackage home
 * @author     Dario Sebastian Sasturain <dsastu@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            if (!$request->getParameter('sf_culture')) {
                if ($this->getUser()->isFirstRequest()) {
                    $culture = $request->getPreferredCulture(array('en', 'es', 'fr', 'it', 'de', 'ca'));
                    $this->getUser()->setCulture($culture);
                    $this->getUser()->isFirstRequest(false);
                } else {
                    $culture = $this->getUser()->getCulture();
                }

                $this->redirect('localized_homepage');
            }

            if (!$request->getParameter('user')) {
                $this->datos = $user->getGuardUser();
            } else {
                if (!is_numeric($request->getParameter('user'))) {
                    $i = new Criteria();
                    $i->add(InboxPeer::USERNAME, $request->getParameter('user'));
                    $this->datos = InboxPeer::doSelectOne($i);
                } else {
                    $this->datos = sfGuardUserPeer::retrieveByPk($request->getParameter('user'));
                }
            }
        } else {
            if (!$request->getParameter('user')) {
                $this->redirect('@sf_guard_signin');
            } else {
                if (!is_numeric($request->getParameter('user'))) {
                    $i = new Criteria();
                    $i->add(InboxPeer::USERNAME, $request->getParameter('user'));
                    $this->datos = InboxPeer::doSelectOne($i);
                } else {
                    $this->datos = sfGuardUserPeer::retrieveByPk($request->getParameter('user'));
                }
            }
            $tags = new OGPTags($this->datos);
            $this->ogptags = $this->getPartial('pubs/ogptags', array('tags' => $tags->getTags()));
            $this->setTemplate('profile');
        }
    }

    public function executeListAjaxHome(sfWebRequest $request) {

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $this->datos = $user->getGuardUser();

            $i = new Criteria();
            $i->add(FollowPeer::USER_ID, $this->datos->getId());
            $i->add(FollowPeer::IS_ACTIVE, true);
            $this->followings = FollowPeer::doSelect($i);

            if (count($this->followings) > 0) {
                $i = new Criteria();
                $x = 0;
                foreach ($this->followings as $following):
                    if ($x == 0) {
                        $x++;
                        $i->add(PubsPeer::USER_ID, $following->getFollowId());
                    } else {
                        $i->addOr(PubsPeer::USER_ID, $following->getFollowId());
                    }
                endforeach;
                $i->addDescendingOrderByColumn(PubsPeer::CREATED_AT);
                $this->pubss = PubsPeer::doSelect($i);
            }
        } else {
            $this->redirect('unauthorized/index');
        }
    }

}
