<?php

/**
 * Setting form base class.
 *
 * @method Setting getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSettingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'name'                  => new sfWidgetFormInputText(),
      'description'           => new sfWidgetFormInputText(),
      'is_active'             => new sfWidgetFormInputCheckbox(),
      'created_at'            => new sfWidgetFormDateTime(),
      'event_list'            => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'setting_has_user_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'           => new sfValidatorString(array('max_length' => 1024, 'required' => false)),
      'is_active'             => new sfValidatorBoolean(),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
      'event_list'            => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'setting_has_user_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('setting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Setting';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['event_list']))
    {
      $values = array();
      foreach ($this->object->getEvents() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('event_list', $values);
    }

    if (isset($this->widgetSchema['setting_has_user_list']))
    {
      $values = array();
      foreach ($this->object->getSettingHasUsers() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('setting_has_user_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveEventList($con);
    $this->saveSettingHasUserList($con);
  }

  public function saveEventList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['event_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(EventPeer::SETTING_ID, $this->object->getPrimaryKey());
    EventPeer::doDelete($c, $con);

    $values = $this->getValue('event_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Event();
        $obj->setSettingId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
  }

  public function saveSettingHasUserList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['setting_has_user_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SettingHasUserPeer::SETTING_ID, $this->object->getPrimaryKey());
    SettingHasUserPeer::doDelete($c, $con);

    $values = $this->getValue('setting_has_user_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SettingHasUser();
        $obj->setSettingId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
  }

}
