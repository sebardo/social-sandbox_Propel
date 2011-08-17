<?php

/**
 * inbox form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class inboxForm extends BaseinboxForm
{
   public function setup() {
        unset($this['created_at'], $this['updated_at']);
        $this->setWidgets(array(
            'id' => new sfWidgetFormInputHidden(),
            'user_id' => new sfWidgetFormInputHidden(),
            'dest_user_id' => new sfWidgetFormChoice(array(
                'choices' => array(),
                'renderer_class' => 'sfWidgetFormJQueryAutocompleter',
                'renderer_options' => array('url' => sfConfig::get('app_base_url') . '/inbox/getUsers'),
            )),
            'title' => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormTextarea(),
            'is_active' => new sfWidgetFormInputCheckbox(),
            'reply' => new sfWidgetFormInputText(),
            'record_id' => new sfWidgetFormInputText(),
            'featured' => new sfWidgetFormInputCheckbox(),
        ));

        $this->setValidators(array(
            'id' => new sfValidatorInteger(array('required' => false)),
            'user_id' => new sfValidatorInteger(array('required' => false)),
            'dest_user_id' => new sfValidatorInteger(array('required' => false)),
            'title' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
            'description' => new sfValidatorString(),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
            'featured' => new sfValidatorBoolean(array('required' => false)),
            'reply' => new sfValidatorBoolean(array('required' => false)),
            'record_id' => new sfValidatorInteger(array('required' => false)),
        ));
        $this->widgetSchema->setNameFormat('inbox[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }
}
