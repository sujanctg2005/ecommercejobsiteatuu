<?php

class Application_Form_EmployeeProfileForm extends Zend_Form {

    public function init() {
        $this->setName("EmployeeProfile");

        $UserID = new Zend_Form_Element_Hidden("UserID");
        $UserID->addFilter('Int');

        $Name = new Zend_Form_Element_Text('Name');
        $Name->setLabel('Name:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $DOB = new Zend_Form_Element_Text('DateOfBirth');
        $DOB->setLabel('Date Of Birth:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Gender = new Zend_Form_Element_Text('Gender');
        $Gender->setLabel('Gender:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $MaritialStatus = new Zend_Form_Element_Text('MaritialStatus');
        $MaritialStatus->setLabel('Maritial Status:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Nationality = new Zend_Form_Element_Text('Nationality');
        $Nationality->setLabel('Nationality:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Religion = new Zend_Form_Element_Text('Religion');
        $Religion->setLabel('Religion:')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $CurrentAddress = new Zend_Form_Element_Text('CurrentAddress');
        $CurrentAddress->setLabel('Current Address:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $PermanentAddress = new Zend_Form_Element_Text('PermanentAddress');
        $PermanentAddress->setLabel('Permanent Address:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $HomePhone = new Zend_Form_Element_Text('HomePhone');
        $HomePhone->setLabel('Home Phone:')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $Mobile = new Zend_Form_Element_Text('Mobile');
        $Mobile->setLabel('Mobile:')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $OfficePhone = new Zend_Form_Element_Text('OfficePhone');
        $OfficePhone->setLabel('Office Phone:')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $Email = new Zend_Form_Element_Text('Email');
        $Email->setLabel('Email:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $AlternativeEmail = new Zend_Form_Element_Text('AlternativeEmail');
        $AlternativeEmail->setLabel('Alternative Email:')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');

        $ImagePath = new Zend_Form_Element_Text('ImagePath');
        $ImagePath->setLabel('Photo:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $Submit = new Zend_Form_Element_Submit('Submit');
        $Submit->setAttrib('UserID', 'submitbutton');

        $this->addElements(array($Name, $DOB, $Gender, $MaritialStatus, $Nationality, $Religion, $CurrentAddress, $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email, $AlternativeEmail, $ImagePath, $Submit));
    }

}

