<?php

/**
 * sfGuardUser form base class.
 *
 * @method sfGuardUser getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfGuardUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'first_name'                    => new sfWidgetFormInputText(),
      'last_name'                     => new sfWidgetFormInputText(),
      'email_address'                 => new sfWidgetFormInputText(),
      'username'                      => new sfWidgetFormInputText(),
      'algorithm'                     => new sfWidgetFormInputText(),
      'salt'                          => new sfWidgetFormInputText(),
      'password'                      => new sfWidgetFormInputText(),
      'sex'                           => new sfWidgetFormInputCheckbox(),
      'birthday'                      => new sfWidgetFormDate(),
      'aboutme'                       => new sfWidgetFormInputText(),
      'profession'                    => new sfWidgetFormInputText(),
      'music'                         => new sfWidgetFormInputText(),
      'books'                         => new sfWidgetFormInputText(),
      'films'                         => new sfWidgetFormInputText(),
      'television'                    => new sfWidgetFormInputText(),
      'games'                         => new sfWidgetFormInputText(),
      'marital_status'                => new sfWidgetFormInputText(),
      'meeting_sex'                   => new sfWidgetFormInputText(),
      'hometown'                      => new sfWidgetFormInputText(),
      'borntown'                      => new sfWidgetFormInputText(),
      'smoker'                        => new sfWidgetFormInputText(),
      'drinker'                       => new sfWidgetFormInputText(),
      'education'                     => new sfWidgetFormInputText(),
      'language'                      => new sfWidgetFormInputText(),
      'religion'                      => new sfWidgetFormInputText(),
      'politic'                       => new sfWidgetFormInputText(),
      'country'                       => new sfWidgetFormInputText(),
      'city'                          => new sfWidgetFormInputText(),
      'cp'                            => new sfWidgetFormInputText(),
      'description'                   => new sfWidgetFormInputText(),
      'contact'                       => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'last_login'                    => new sfWidgetFormDateTime(),
      'is_active'                     => new sfWidgetFormInputCheckbox(),
      'is_super_admin'                => new sfWidgetFormInputCheckbox(),
      'sf_guard_user_permission_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
      'sf_guard_user_group_list'      => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardGroup')),
      'album_photo_list'              => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Photo')),
      'event_list'                    => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Setting')),
      'profile_photo_list'            => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Photo')),
      'setting_has_user_list'         => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Setting')),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'first_name'                    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'last_name'                     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'email_address'                 => new sfValidatorString(array('max_length' => 128)),
      'username'                      => new sfValidatorString(array('max_length' => 128)),
      'algorithm'                     => new sfValidatorString(array('max_length' => 128)),
      'salt'                          => new sfValidatorString(array('max_length' => 128)),
      'password'                      => new sfValidatorString(array('max_length' => 128)),
      'sex'                           => new sfValidatorBoolean(array('required' => false)),
      'birthday'                      => new sfValidatorDate(array('required' => false)),
      'aboutme'                       => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'profession'                    => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'music'                         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'books'                         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'films'                         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'television'                    => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'games'                         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'marital_status'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'meeting_sex'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'hometown'                      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'borntown'                      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'smoker'                        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'drinker'                       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'education'                     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'language'                      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'religion'                      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'politic'                       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'country'                       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'city'                          => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'cp'                            => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'description'                   => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'contact'                       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
      'last_login'                    => new sfValidatorDateTime(array('required' => false)),
      'is_active'                     => new sfValidatorBoolean(),
      'is_super_admin'                => new sfValidatorBoolean(),
      'sf_guard_user_permission_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
      'sf_guard_user_group_list'      => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardGroup', 'required' => false)),
      'album_photo_list'              => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Photo', 'required' => false)),
      'event_list'                    => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Setting', 'required' => false)),
      'profile_photo_list'            => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Photo', 'required' => false)),
      'setting_has_user_list'         => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Setting', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'sfGuardUser', 'column' => array('email_address'))),
        new sfValidatorPropelUnique(array('model' => 'sfGuardUser', 'column' => array('username'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_guard_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUser';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sf_guard_user_permission_list']))
    {
      $values = array();
      foreach ($this->object->getsfGuardUserPermissions() as $obj)
      {
        $values[] = $obj->getPermissionId();
      }

      $this->setDefault('sf_guard_user_permission_list', $values);
    }

    if (isset($this->widgetSchema['sf_guard_user_group_list']))
    {
      $values = array();
      foreach ($this->object->getsfGuardUserGroups() as $obj)
      {
        $values[] = $obj->getGroupId();
      }

      $this->setDefault('sf_guard_user_group_list', $values);
    }

    if (isset($this->widgetSchema['album_photo_list']))
    {
      $values = array();
      foreach ($this->object->getAlbumPhotos() as $obj)
      {
        $values[] = $obj->getCoverId();
      }

      $this->setDefault('album_photo_list', $values);
    }

    if (isset($this->widgetSchema['event_list']))
    {
      $values = array();
      foreach ($this->object->getEvents() as $obj)
      {
        $values[] = $obj->getSettingId();
      }

      $this->setDefault('event_list', $values);
    }

    if (isset($this->widgetSchema['profile_photo_list']))
    {
      $values = array();
      foreach ($this->object->getProfilePhotos() as $obj)
      {
        $values[] = $obj->getPhotoId();
      }

      $this->setDefault('profile_photo_list', $values);
    }

    if (isset($this->widgetSchema['setting_has_user_list']))
    {
      $values = array();
      foreach ($this->object->getSettingHasUsers() as $obj)
      {
        $values[] = $obj->getSettingId();
      }

      $this->setDefault('setting_has_user_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savesfGuardUserPermissionList($con);
    $this->savesfGuardUserGroupList($con);
    $this->saveAlbumPhotoList($con);
    $this->saveEventList($con);
    $this->saveProfilePhotoList($con);
    $this->saveSettingHasUserList($con);
  }

  public function savesfGuardUserPermissionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_guard_user_permission_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(sfGuardUserPermissionPeer::USER_ID, $this->object->getPrimaryKey());
    sfGuardUserPermissionPeer::doDelete($c, $con);

    $values = $this->getValue('sf_guard_user_permission_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new sfGuardUserPermission();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setPermissionId($value);
        $obj->save();
      }
    }
  }

  public function savesfGuardUserGroupList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_guard_user_group_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(sfGuardUserGroupPeer::USER_ID, $this->object->getPrimaryKey());
    sfGuardUserGroupPeer::doDelete($c, $con);

    $values = $this->getValue('sf_guard_user_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new sfGuardUserGroup();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setGroupId($value);
        $obj->save();
      }
    }
  }

  public function saveAlbumPhotoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['album_photo_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(AlbumPhotoPeer::USER_ID, $this->object->getPrimaryKey());
    AlbumPhotoPeer::doDelete($c, $con);

    $values = $this->getValue('album_photo_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AlbumPhoto();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setCoverId($value);
        $obj->save();
      }
    }
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
    $c->add(EventPeer::USER_ID, $this->object->getPrimaryKey());
    EventPeer::doDelete($c, $con);

    $values = $this->getValue('event_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Event();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setSettingId($value);
        $obj->save();
      }
    }
  }

  public function saveProfilePhotoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['profile_photo_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(ProfilePhotoPeer::USER_ID, $this->object->getPrimaryKey());
    ProfilePhotoPeer::doDelete($c, $con);

    $values = $this->getValue('profile_photo_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ProfilePhoto();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setPhotoId($value);
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
    $c->add(SettingHasUserPeer::USER_ID, $this->object->getPrimaryKey());
    SettingHasUserPeer::doDelete($c, $con);

    $values = $this->getValue('setting_has_user_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SettingHasUser();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setSettingId($value);
        $obj->save();
      }
    }
  }

}
