<?php

/**
 * AudioHasPlaylist form base class.
 *
 * @method AudioHasPlaylist getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseAudioHasPlaylistForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'audio_id' => new sfWidgetFormPropelChoice(array('model' => 'Audio', 'add_empty' => true)),
      'pl_id'    => new sfWidgetFormPropelChoice(array('model' => 'Playlist', 'add_empty' => true)),
      'orden'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'audio_id' => new sfValidatorPropelChoice(array('model' => 'Audio', 'column' => 'id', 'required' => false)),
      'pl_id'    => new sfValidatorPropelChoice(array('model' => 'Playlist', 'column' => 'id', 'required' => false)),
      'orden'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('audio_has_playlist[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AudioHasPlaylist';
  }


}
