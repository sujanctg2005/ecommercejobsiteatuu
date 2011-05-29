<?php

class Application_Form_UpdateEmployeeProfile extends Zend_Form
{

    public function init()
    {
        $this->setName("UpdateEmployeeProfile");
        $this->setAction("");
        $this->setAttrib('enctype', 'multipart/form-data');
     
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


        $Gender = new Zend_Form_Element_Select('Gender');
        $Gender->setLabel('Gender:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMultiOptions(array('Male', 'Female'));


        $MaritialStatus = new Zend_Form_Element_Select('MaritialStatus');
        $MaritialStatus->setLabel('Maritial Status:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setMultiOptions(array('Single', 'Married'));

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
                ->addValidator('EmailAddress', true, array());

        $AlternativeEmail = new Zend_Form_Element_Text('AlternativeEmail');
        $AlternativeEmail->setLabel('Alternative Email:')
                ->setRequired(false)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('EmailAddress', true, array());;

        $ImagePath = new Zend_Form_Element_File('ImagePath');
        $ImagePath->setLabel('Image:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setMaxFileSize(1024000)
                ->addValidator('Count', false, 1)
                ->addValidator('Size', false, 1024000)
                ->addValidator('Extension', false, 'jpeg,jpg,png,gif');

        $Submit = new Zend_Form_Element_Submit('Submit');
        $Submit->setAttrib('UserID', 'submitbutton');

        $this->addElements(array($Name, $DOB, $Gender, $MaritialStatus,
                          $Nationality, $Religion,$CurrentAddress,
                          $PermanentAddress, $HomePhone, $Mobile,
                          $OfficePhone, $Email, $AlternativeEmail, $ImagePath, $Submit));
    }
}

