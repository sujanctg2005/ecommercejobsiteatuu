<?php

class Application_Form_EmployeeChangePassword extends Zend_Form
{

    public function init()
    {
        $this->setName("EmployeeChangePassword");
        $this->setAction("");

        $Username = new Zend_Form_Element_Text('Username');
        $Username->setLabel('Username:')
                ->setAttrib('disabled', true);

        $OldPassword = new Zend_Form_Element_Password('OldPassword');
        $OldPassword->setLabel('Old-Password:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('');

        $NewPassword = new Zend_Form_Element_Password('NewPassword');
        $NewPassword->setLabel('New-Password:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('stringLength', false, array('min' => 6));

        $RePassword = new Zend_Form_Element_Password('Repassword');
        $RePassword->setLabel('Re-password:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator(
                            new Zend_Validate_Identical(Zend_Controller_Front::getInstance()
                                    ->getRequest()->getParam('NewPassword')));

        $Submit = new Zend_Form_Element_Submit('Submit');
        $Submit->setAttrib('UserID', 'submitbutton');

        $this->addElements(array($Username, $OldPassword, $NewPassword, $RePassword, $Submit));

    }

    public function setUserName($username)
    {
        $this->getElement('Username')->setValue($username);
    }


}

