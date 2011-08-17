<?php

/**
 * BaseFollowAdmin helper.
 *
 * @package    PubsPlugin
 * @subpackage helper
 * @author     Dario Sebastian Sasturain <dsastu@gmail.com>
 */
class followAdminGeneratorHelper extends BaseFollowAdminGeneratorHelper
{
  public function linkToIsDelete($object, $params)
  {
    return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), 'wallAdmin/isDelete?id='.$object->getId()).'</li>';
  }

  public function linkToRestore($object, $params)
  {
    return '<li class="sf_admin_action_restore">'.link_to(__($params['label'], array(), 'sf_admin'), 'wallAdmin/restore?id='.$object->getId()).'</li>';
  }

  public function linkToFavlikes($object, $params)
  {
    $fav = FavlikePeer::countFavlikes($object->getId(),'follow');
    return '<li class="sf_admin_action_reply">'.link_to(__($params['label'], array(), 'sf_admin'), 'favlikeAdmin/filter?favlike_filters[record_id][text]='.$object->getId().'&favlike_filters[record_model][text]=follow','post=true').' ('.$fav.')</li>';
  }
  
  public function linkToComments($object, $params)
  {
    $com = CommentPeer::countComments($object->getId(),'follow');
    return '<li class="sf_admin_action_reply">'.link_to(__($params['label'], array(), 'sf_admin'), 'commentAdmin/filter?comment_filters[record_id][text]='.$object->getId().'&comment_filters[record_model][text]=follow','post=true').' ('.$com.')</li>';
  }

  public function linkToSaveAndDelete($object, $params)
  {
    return '<li class="sf_admin_action_save_and_delete"><input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="save_and_delete" /></li>';
  }

  public function linkToSaveAndRestore($object, $params)
  {
    return '<li class="sf_admin_action_save_and_restore"><input type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="save_and_restore" /></li>';
  }
}
