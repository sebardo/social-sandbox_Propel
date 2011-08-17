<?php

/**
 * PluginInbox form.
 *
 * 
 * @package     InboxPlugin
 * @subpackage  form
 * @author      Dario Sebastian Sasturain SEBARDO <dsastu@gmail.com>
 */
class commentForm extends sfForm
{
   public function setup()
  {  
       
   $this->setWidgets(array(
      'user_id'      => new sfWidgetFormInputHidden(),
      'dest_user_id' => new sfWidgetFormInputHidden(),
      'record_model' => new sfWidgetFormInputHidden(),
      'record_id' => new sfWidgetFormInputHidden(),
      'description'  => new sfWidgetFormTextarea(),

    ));

  }
}
