<?php
/**
 * audioAdmin module helper.
 *
 * @package    PubsPlugin
 * @subpackage audioAdmin
 * @author     Dario Sebastian Sasturain <dsastu@gmail.com>
 */
class audioAdminGeneratorHelper extends BaseAudioAdminGeneratorHelper
{
  public function linkToIsDelete($object, $params)
  {
    return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), 'audioAdmin/isDelete?id='.$object->getId()).'</li>';
  }

  public function linkToRestore($object, $params)
  {
    return '<li class="sf_admin_action_restore">'.link_to(__($params['label'], array(), 'sf_admin'), 'audioAdmin/restore?id='.$object->getId()).'</li>';
  }

 public function linkToComments($object, $params)
  {
  
    return '<li class="sf_admin_action_reply">'.link_to(__($params['label'], array(), 'sf_admin'), 'commentAdmin/filter?comment_filters[record_id][text]='.$object->getId().'&comment_filters[record_model][text]=audio','post=true').' ('.CommentPeer::countComments($object->getId(),'audio').')</li>';
  }
  
  public function linkToFavlikes($object, $params)
  {
    $comments = FavlikePeer::countFavlikes($object->getId(),'audio');
    return '<li class="sf_admin_action_reply">'.link_to(__($params['label'], array(), 'sf_admin'), 'favlikeAdmin/filter?favlike_filters[record_id][text]='.$object->getId().'&favlike_filters[record_model][text]=audio','post=true').' ('.$comments.')</li>';
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
