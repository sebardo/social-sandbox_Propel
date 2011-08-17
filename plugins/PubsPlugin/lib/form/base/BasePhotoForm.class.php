<?php

/**
 * Photo form base class.
 *
 * @method Photo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'album_id'           => new sfWidgetFormInputHidden(),
      'title'              => new sfWidgetFormInputText(),
      'name'               => new sfWidgetFormInputText(),
      'ord'                => new sfWidgetFormInputText(),
      'x1'                 => new sfWidgetFormInputText(),
      'y1'                 => new sfWidgetFormInputText(),
      'x2'                 => new sfWidgetFormInputText(),
      'y2'                 => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'album_photo_list'   => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'profile_photo_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'album_id'           => new sfValidatorPropelChoice(array('model' => 'AlbumPhoto', 'column' => 'id', 'required' => false)),
      'title'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ord'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'x1'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'y1'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'x2'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'y2'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'album_photo_list'   => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'profile_photo_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['album_photo_list']))
    {
      $values = array();
      foreach ($this->object->getAlbumPhotos() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('album_photo_list', $values);
    }

    if (isset($this->widgetSchema['profile_photo_list']))
    {
      $values = array();
      foreach ($this->object->getProfilePhotos() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('profile_photo_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveAlbumPhotoList($con);
    $this->saveProfilePhotoList($con);
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
    $c->add(AlbumPhotoPeer::COVER_ID, $this->object->getPrimaryKey());
    AlbumPhotoPeer::doDelete($c, $con);

    $values = $this->getValue('album_photo_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AlbumPhoto();
        $obj->setCoverId($this->object->getPrimaryKey());
        $obj->setUserId($value);
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
    $c->add(ProfilePhotoPeer::PHOTO_ID, $this->object->getPrimaryKey());
    ProfilePhotoPeer::doDelete($c, $con);

    $values = $this->getValue('profile_photo_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ProfilePhoto();
        $obj->setPhotoId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
  }

}
