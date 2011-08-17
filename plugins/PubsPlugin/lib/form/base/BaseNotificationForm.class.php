<?php

/**
 * Notification form base class.
 *
 * @method Notification getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseNotificationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormInputHidden(),
      'dest_user_id'  => new sfWidgetFormInputHidden(),
      'record_model'  => new sfWidgetFormInputText(),
      'record_id'     => new sfWidgetFormInputText(),
      'related_model' => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormInputText(),
      'is_active'     => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'       => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'dest_user_id'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'record_model'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'record_id'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'related_model' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_active'     => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('notification[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notification';
  }


}
