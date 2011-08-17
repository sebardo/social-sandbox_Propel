<?php

/**
 * Text form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class TextForm extends BaseTextForm {

    public function setup() {
        $this->setWidgets(array(
            'user_id' => new sfWidgetFormInputHidden(),
            'description' => new sfWidgetFormTextarea(),
        ));
        $this->widgetSchema->setNameFormat('text[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setValidators(array(
            'user_id' => new sfValidatorNumber(array('required' => true), array('required' => true, 'invalid' => '')),
            'description' => new sfValidatorString(array('required' => false), array('required' => true, 'invalid' => '')),
        ));
    }

}
