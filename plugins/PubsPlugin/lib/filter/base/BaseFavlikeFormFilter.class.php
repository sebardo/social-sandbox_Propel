<?php

/**
 * Favlike filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseFavlikeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'record_model' => new sfWidgetFormFilterInput(),
      'record_id'    => new sfWidgetFormFilterInput(),
      'is_active'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'record_model' => new sfValidatorPass(array('required' => false)),
      'record_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_active'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('favlike_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Favlike';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'record_model' => 'Text',
      'record_id'    => 'Number',
      'user_id'      => 'ForeignKey',
      'dest_user_id' => 'ForeignKey',
      'is_active'    => 'Boolean',
      'created_at'   => 'Date',
    );
  }
}
