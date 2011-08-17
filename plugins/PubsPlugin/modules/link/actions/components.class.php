<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class linkComponents extends sfComponents {

    public function executeLink(sfWebRequest $request) {
        if (isset($this->url))
            $this->graph = OpenGraph::fetch($this->url);
        if (isset($this->id)) {
            $i = new Criteria();
            $i->add(LinkPeer::ID, $this->id);
            $this->link = LinkPeer::doSelectOne($i);
        }
//        $this->link = Doctrine_Core::getTable('Link')->find(array($this->id));
    }

}

?>