<?php

/**
 * TagsPhoto form base class.
 *
 * @method TagsPhoto getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseTagsPhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo_id' => new sfWidgetFormInputHidden(),
      'x1'       => new sfWidgetFormInputText(),
      'y1'       => new sfWidgetFormInputText(),
      'x2'       => new sfWidgetFormInputText(),
      'y2'       => new sfWidgetFormInputText(),
      'name'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'photo_id' => new sfValidatorPropelChoice(array('model' => 'Photo', 'column' => 'id', 'required' => false)),
      'x1'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'y1'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'x2'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'y2'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tags_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TagsPhoto';
  }


}
