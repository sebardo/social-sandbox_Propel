<?php

/**
 * TagsPhoto filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseTagsPhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'x1'       => new sfWidgetFormFilterInput(),
      'y1'       => new sfWidgetFormFilterInput(),
      'x2'       => new sfWidgetFormFilterInput(),
      'y2'       => new sfWidgetFormFilterInput(),
      'name'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'x1'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y1'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'x2'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y2'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tags_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TagsPhoto';
  }

  public function getFields()
  {
    return array(
      'photo_id' => 'ForeignKey',
      'x1'       => 'Number',
      'y1'       => 'Number',
      'x2'       => 'Number',
      'y2'       => 'Number',
      'name'     => 'Text',
    );
  }
}
