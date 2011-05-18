<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FeedbackForm
 *
 * @author Admin
 */
class Application_Form_FeedbackForm  extends Zend_Form{


    public function init()
    {
        $email = $this->getTextElement('email','Email Address', true);
        $email->addValidator(new Zend_Validate_EmailAddress());

        $description = new Zend_Form_Element_Textarea('description');

        $description->setRequired(true);

        $submit = new Zend_Form_Element_Submit('Submit');

        $this->addElements(array(
                $email,
                $description,
                $submit
                ));

        $this->setMethod("post");
    }


    private function getTextElement($name, $label, $required)
    {
        $element = new Zend_Form_Element_Text($name);
        $element->setLabel($label);
        $element->setRequired($required)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        return $element;
    }
}
?>
