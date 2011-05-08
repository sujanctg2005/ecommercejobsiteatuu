<?php

class Application_Form_EmployeeProfileForm extends Zend_Form {

    public function init() {
        $this->setName("EmployeeProfile");

        $UserID = new Zend_Form_Element_Hidden("UserID");
        $UserID->addFilter('Int');

        $Name = new Zend_Form_Element_Text('Name');
        $Name->setLabel('Name')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $DateOfBirth = new Zend_Form_Element_Text('DateOfBirth');
        $DateOfBirth->setLabel('DateOfBirth')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Gender = new Zend_Form_Element_Text('Gender');
        $Gender->setLabel('Gender')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $MaritialStatus = new Zend_Form_Element_Text('MaritialStatus');
        $MaritialStatus->setLabel('MaritialStatus')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Nationality = new Zend_Form_Element_Text('Nationality');
        $Nationality->setLabel('Nationality')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Religion = new Zend_Form_Element_Text('Religion');
        $Religion->setLabel('Religion')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $CurrentAddress = new Zend_Form_Element_Text('CurrentAddress');
        $CurrentAddress->setLabel('CurrentAddress')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $PermanentAddress = new Zend_Form_Element_Text('PermanentAddress');
        $PermanentAddress->setLabel('PermanentAddress')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $HomePhone = new Zend_Form_Element_Text('HomePhone');
        $HomePhone->setLabel('HomePhone')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $Mobile = new Zend_Form_Element_Text('Mobile');
        $Mobile->setLabel('Mobile')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $OfficePhone = new Zend_Form_Element_Text('OfficePhone');
        $OfficePhone->setLabel('OfficePhone')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $Email = new Zend_Form_Element_Text('Email');
        $Email->setLabel('Email')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $AlternativeEmail = new Zend_Form_Element_Text('AlternativeEmail');
        $AlternativeEmail->setLabel('AlternativeEmail')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $ImagePath = new Zend_Form_Element_Text('ImagePath');
        $ImagePath->setLabel('ImagePath')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Submit = new Zend_Form_Element_Submit('Submit');
        $Submit->setAttrib('UserID', 'submitbutton');
    }

}

