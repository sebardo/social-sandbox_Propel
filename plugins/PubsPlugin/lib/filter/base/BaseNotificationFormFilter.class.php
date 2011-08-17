<?php

/**
 * Notification filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseNotificationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'record_model'  => new sfWidgetFormFilterInput(),
      'record_id'     => new sfWidgetFormFilterInput(),
      'related_model' => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterInput(),
      'is_active'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'record_model'  => new sfValidatorPass(array('required' => false)),
      'record_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'related_model' => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorPass(array('required' => false)),
      'is_active'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('notification_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notification';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'user_id'       => 'ForeignKey',
      'dest_user_id'  => 'ForeignKey',
      'record_model'  => 'Text',
      'record_id'     => 'Number',
      'related_model' => 'Text',
      'created_at'    => 'Text',
      'is_active'     => 'Boolean',
    );
  }
}
