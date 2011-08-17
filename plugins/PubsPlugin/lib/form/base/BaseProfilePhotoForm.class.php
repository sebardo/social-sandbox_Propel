<?php

/**
 * ProfilePhoto form base class.
 *
 * @method ProfilePhoto getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseProfilePhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo_id' => new sfWidgetFormInputHidden(),
      'user_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'photo_id' => new sfValidatorPropelChoice(array('model' => 'Photo', 'column' => 'id', 'required' => false)),
      'user_id'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilePhoto';
  }


}
