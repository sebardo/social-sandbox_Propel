<?php

/**
 * sfGuardUser filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfGuardUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'                    => new sfWidgetFormFilterInput(),
      'last_name'                     => new sfWidgetFormFilterInput(),
      'email_address'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'algorithm'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'salt'                          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sex'                           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'birthday'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'aboutme'                       => new sfWidgetFormFilterInput(),
      'profession'                    => new sfWidgetFormFilterInput(),
      'music'                         => new sfWidgetFormFilterInput(),
      'books'                         => new sfWidgetFormFilterInput(),
      'films'                         => new sfWidgetFormFilterInput(),
      'television'                    => new sfWidgetFormFilterInput(),
      'games'                         => new sfWidgetFormFilterInput(),
      'marital_status'                => new sfWidgetFormFilterInput(),
      'meeting_sex'                   => new sfWidgetFormFilterInput(),
      'hometown'                      => new sfWidgetFormFilterInput(),
      'borntown'                      => new sfWidgetFormFilterInput(),
      'smoker'                        => new sfWidgetFormFilterInput(),
      'drinker'                       => new sfWidgetFormFilterInput(),
      'education'                     => new sfWidgetFormFilterInput(),
      'language'                      => new sfWidgetFormFilterInput(),
      'religion'                      => new sfWidgetFormFilterInput(),
      'politic'                       => new sfWidgetFormFilterInput(),
      'country'                       => new sfWidgetFormFilterInput(),
      'city'                          => new sfWidgetFormFilterInput(),
      'cp'                            => new sfWidgetFormFilterInput(),
      'description'                   => new sfWidgetFormFilterInput(),
      'contact'                       => new sfWidgetFormFilterInput(),
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'last_login'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_active'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_super_admin'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sf_guard_user_permission_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardPermission', 'add_empty' => true)),
      'sf_guard_user_group_list'      => new sfWidgetFormPropelChoice(array('model' => 'sfGuardGroup', 'add_empty' => true)),
      'album_photo_list'              => new sfWidgetFormPropelChoice(array('model' => 'Photo', 'add_empty' => true)),
      'event_list'                    => new sfWidgetFormPropelChoice(array('model' => 'Setting', 'add_empty' => true)),
      'profile_photo_list'            => new sfWidgetFormPropelChoice(array('model' => 'Photo', 'add_empty' => true)),
      'setting_has_user_list'         => new sfWidgetFormPropelChoice(array('model' => 'Setting', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'first_name'                    => new sfValidatorPass(array('required' => false)),
      'last_name'                     => new sfValidatorPass(array('required' => false)),
      'email_address'                 => new sfValidatorPass(array('required' => false)),
      'username'                      => new sfValidatorPass(array('required' => false)),
      'algorithm'                     => new sfValidatorPass(array('required' => false)),
      'salt'                          => new sfValidatorPass(array('required' => false)),
      'password'                      => new sfValidatorPass(array('required' => false)),
      'sex'                           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'birthday'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'aboutme'                       => new sfValidatorPass(array('required' => false)),
      'profession'                    => new sfValidatorPass(array('required' => false)),
      'music'                         => new sfValidatorPass(array('required' => false)),
      'books'                         => new sfValidatorPass(array('required' => false)),
      'films'                         => new sfValidatorPass(array('required' => false)),
      'television'                    => new sfValidatorPass(array('required' => false)),
      'games'                         => new sfValidatorPass(array('required' => false)),
      'marital_status'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'meeting_sex'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hometown'                      => new sfValidatorPass(array('required' => false)),
      'borntown'                      => new sfValidatorPass(array('required' => false)),
      'smoker'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'drinker'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'education'                     => new sfValidatorPass(array('required' => false)),
      'language'                      => new sfValidatorPass(array('required' => false)),
      'religion'                      => new sfValidatorPass(array('required' => false)),
      'politic'                       => new sfValidatorPass(array('required' => false)),
      'country'                       => new sfValidatorPass(array('required' => false)),
      'city'                          => new sfValidatorPass(array('required' => false)),
      'cp'                            => new sfValidatorPass(array('required' => false)),
      'description'                   => new sfValidatorPass(array('required' => false)),
      'contact'                       => new sfValidatorPass(array('required' => false)),
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'last_login'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_active'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_super_admin'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sf_guard_user_permission_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardPermission', 'required' => false)),
      'sf_guard_user_group_list'      => new sfValidatorPropelChoice(array('model' => 'sfGuardGroup', 'required' => false)),
      'album_photo_list'              => new sfValidatorPropelChoice(array('model' => 'Photo', 'required' => false)),
      'event_list'                    => new sfValidatorPropelChoice(array('model' => 'Setting', 'required' => false)),
      'profile_photo_list'            => new sfValidatorPropelChoice(array('model' => 'Photo', 'required' => false)),
      'setting_has_user_list'         => new sfValidatorPropelChoice(array('model' => 'Setting', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addsfGuardUserPermissionListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(sfGuardUserPermissionPeer::USER_ID, sfGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(sfGuardUserPermissionPeer::PERMISSION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(sfGuardUserPermissionPeer::PERMISSION_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addsfGuardUserGroupListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(sfGuardUserGroupPeer::USER_ID, sfGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(sfGuardUserGroupPeer::GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(sfGuardUserGroupPeer::GROUP_ID, $value));
    }

    $criteria->add($criterion);
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

    $criteria->addJoin(AlbumPhotoPeer::USER_ID, sfGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AlbumPhotoPeer::COVER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AlbumPhotoPeer::COVER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addEventListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(EventPeer::USER_ID, sfGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EventPeer::SETTING_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EventPeer::SETTING_ID, $value));
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

    $criteria->addJoin(ProfilePhotoPeer::USER_ID, sfGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ProfilePhotoPeer::PHOTO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ProfilePhotoPeer::PHOTO_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addSettingHasUserListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(SettingHasUserPeer::USER_ID, sfGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SettingHasUserPeer::SETTING_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SettingHasUserPeer::SETTING_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'sfGuardUser';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'first_name'                    => 'Text',
      'last_name'                     => 'Text',
      'email_address'                 => 'Text',
      'username'                      => 'Text',
      'algorithm'                     => 'Text',
      'salt'                          => 'Text',
      'password'                      => 'Text',
      'sex'                           => 'Boolean',
      'birthday'                      => 'Date',
      'aboutme'                       => 'Text',
      'profession'                    => 'Text',
      'music'                         => 'Text',
      'books'                         => 'Text',
      'films'                         => 'Text',
      'television'                    => 'Text',
      'games'                         => 'Text',
      'marital_status'                => 'Number',
      'meeting_sex'                   => 'Number',
      'hometown'                      => 'Text',
      'borntown'                      => 'Text',
      'smoker'                        => 'Number',
      'drinker'                       => 'Number',
      'education'                     => 'Text',
      'language'                      => 'Text',
      'religion'                      => 'Text',
      'politic'                       => 'Text',
      'country'                       => 'Text',
      'city'                          => 'Text',
      'cp'                            => 'Text',
      'description'                   => 'Text',
      'contact'                       => 'Text',
      'created_at'                    => 'Date',
      'last_login'                    => 'Date',
      'is_active'                     => 'Boolean',
      'is_super_admin'                => 'Boolean',
      'sf_guard_user_permission_list' => 'ManyKey',
      'sf_guard_user_group_list'      => 'ManyKey',
      'album_photo_list'              => 'ManyKey',
      'event_list'                    => 'ManyKey',
      'profile_photo_list'            => 'ManyKey',
      'setting_has_user_list'         => 'ManyKey',
    );
  }
}
