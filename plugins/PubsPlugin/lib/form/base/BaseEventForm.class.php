<?php

/**
 * Event form base class.
 *
 * @method Event getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseEventForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'setting_id'  => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'date'        => new sfWidgetFormDate(),
      'hour'        => new sfWidgetFormTime(),
      'end_date'    => new sfWidgetFormDate(),
      'end_hour'    => new sfWidgetFormTime(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'address'     => new sfWidgetFormInputText(),
      'latitude'    => new sfWidgetFormInputText(),
      'longitude'   => new sfWidgetFormInputText(),
      'image'       => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'setting_id'  => new sfValidatorPropelChoice(array('model' => 'Setting', 'column' => 'id', 'required' => false)),
      'user_id'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 25556, 'required' => false)),
      'date'        => new sfValidatorDate(array('required' => false)),
      'hour'        => new sfValidatorTime(array('required' => false)),
      'end_date'    => new sfValidatorDate(array('required' => false)),
      'end_hour'    => new sfValidatorTime(array('required' => false)),
      'is_active'   => new sfValidatorBoolean(),
      'address'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latitude'    => new sfValidatorNumber(array('required' => false)),
      'longitude'   => new sfValidatorNumber(array('required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
  }


}
