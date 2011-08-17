<?php

/**
 * AudioHasPlaylist filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseAudioHasPlaylistFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'audio_id' => new sfWidgetFormPropelChoice(array('model' => 'Audio', 'add_empty' => true)),
      'pl_id'    => new sfWidgetFormPropelChoice(array('model' => 'Playlist', 'add_empty' => true)),
      'orden'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'audio_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Audio', 'column' => 'id')),
      'pl_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Playlist', 'column' => 'id')),
      'orden'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('audio_has_playlist_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AudioHasPlaylist';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'audio_id' => 'ForeignKey',
      'pl_id'    => 'ForeignKey',
      'orden'    => 'Number',
    );
  }
}
