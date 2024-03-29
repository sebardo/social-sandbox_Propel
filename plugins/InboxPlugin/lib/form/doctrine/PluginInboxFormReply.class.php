<?php

/**
 * PluginInbox form.
 *
 * 
 * @package     InboxPlugin
 * @subpackage  form
 * @author      Dario Sebastian Sasturain SEBARDO <dsastu@gmail.com>
 */
class PluginInboxFormReply extends BaseInboxForm
{
    public function setup()
  {
    unset($this['created_at'],$this['updated_at']);
   $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormInputHidden(),
   
      'dest_user_id' => new sfWidgetFormInputHidden(),
      'title'        => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'is_active'    => new sfWidgetFormInputCheckbox(),
      'reply'        => new sfWidgetFormInputHidden(),
      'record_id'    => new sfWidgetFormInputHidden(),
      'featured'     => new sfWidgetFormInputCheckbox(),
     
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorInteger(),
      'user_id'      => new sfValidatorInteger(),
      'dest_user_id' => new sfValidatorInteger(),
      'title'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'  => new sfValidatorString(),
      'is_active'    => new sfValidatorBoolean(array('required' => false)),
      'featured'     => new sfValidatorBoolean(array('required' => false)),
      'reply'        => new sfValidatorBoolean(array('required' => false)),
      'record_id'    => new sfValidatorInteger(array('required' => false)),
     
    ));
     $this->widgetSchema->setNameFormat('inbox[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);   
   }
}
