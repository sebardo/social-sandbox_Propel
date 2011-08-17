<?php

/**
 * Audio form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class AudioForm extends BaseAudioForm
{
   public function setup()
  {
      $this->setWidgets(array(
      'dest_user_id' => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormInputHidden(),
      'description'  => new sfWidgetFormInput(),

    ));
      
        $this->setWidget('filename', new sfWidgetFormInputFileEditable(array(
        'file_src'    => '/users/'.sfContext::getInstance()->getUser()->getGuardUser()->getUsername().'/audios/'.$this->getObject()->getFilename(),
        'edit_mode' => !$this->isNew(),
        'is_image' => false,
        'with_delete' => true,
        'edit_mode' => strlen($this->getObject()->getFilename()) > 0,
        'delete_label' => 'Filename',
        'template' => '%input%<br />%delete%&nbsp;%delete_label%<br />%file%',
    )));

       $this->widgetSchema->setNameFormat('audio[%s]');

       $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

       $this->setValidators(array(
           'dest_user_id' => new sfValidatorNumber(array('required' => true), array('required' => true, 'invalid' => '')),
           'user_id' => new sfValidatorNumber(array('required' => true), array('required' => true, 'invalid' => '')),
           'description' => new sfValidatorString(array('required' => false), array('required' => true, 'invalid' => '')),
           
        ));
       

	 $this->setValidator('filename', new sfValidatorFile(array(
          'path' => sfConfig::get('sf_web_dir').'/users/'.sfContext::getInstance()->getUser()->getGuardUser()->getUsername().'/audios',
          'required' => false,
          'max_size'   => '20971520000',
          )));
  }
}
