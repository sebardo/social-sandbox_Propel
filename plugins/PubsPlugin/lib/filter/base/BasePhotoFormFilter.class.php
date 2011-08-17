<?php

/**
 * Photo filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'              => new sfWidgetFormFilterInput(),
      'name'               => new sfWidgetFormFilterInput(),
      'ord'                => new sfWidgetFormFilterInput(),
      'x1'                 => new sfWidgetFormFilterInput(),
      'y1'                 => new sfWidgetFormFilterInput(),
      'x2'                 => new sfWidgetFormFilterInput(),
      'y2'                 => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'album_photo_list'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'profile_photo_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'title'              => new sfValidatorPass(array('required' => false)),
      'name'               => new sfValidatorPass(array('required' => false)),
      'ord'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'x1'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y1'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'x2'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y2'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'album_photo_list'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'profile_photo_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addAlbumPhotoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(AlbumPhotoPeer::COVER_ID, PhotoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AlbumPhotoPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AlbumPhotoPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addProfilePhotoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(ProfilePhotoPeer::PHOTO_ID, PhotoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ProfilePhotoPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ProfilePhotoPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Photo';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'album_id'           => 'ForeignKey',
      'title'              => 'Text',
      'name'               => 'Text',
      'ord'                => 'Number',
      'x1'                 => 'Number',
      'y1'                 => 'Number',
      'x2'                 => 'Number',
      'y2'                 => 'Number',
      'created_at'         => 'Date',
      'album_photo_list'   => 'ManyKey',
      'profile_photo_list' => 'ManyKey',
    );
  }
}
