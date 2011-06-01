<?php
class Application_Form_EmployeeProfileForm extends Zend_Form {

    public function init() {
        
        $this->setName("EmployeeProfile");
        $this->setAction('');
        $this->setAttrib('enctype', 'multipart/form-data');

        $Username = new Zend_Form_Element_Text('Username');
        $Username->setLabel('Username:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('alnum', true, array('messages' =>
                    array(Zend_validate_alnum::NOT_ALNUM => 'The username contains non alphanumeric character.')))
                ->addValidator('regex', true, array('/^[A-Za-z]+/',
                    'messages' => array(Zend_Validate_Regex::NOT_MATCH => 'The username should start with alphabet.')
                ))
                ->addValidator('stringLength', true, array('min' => 6, 'max' => 20,
                    'messages' => array(Zend_Validate_StringLength::TOO_LONG => 'The username cannot be more than 20 characters.',
                        Zend_Validate_StringLength::TOO_SHORT => 'The username should be atleast 6 characters long.')
                ));

        $Password = new Zend_Form_Element_Password('Password');
        $Password->setLabel('Password:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('stringLength', false, array('min' => 6));

        $Repassword = new Zend_Form_Element_Password('Repassword');
        $Repassword->setLabel('Re-password:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator(
                            new Zend_Validate_Identical(Zend_Controller_Front::getInstance()
                                    ->getRequest()->getParam('Password')));

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
                ->addValidator('Extension', false, 'jpeg,jpg,png,gif,bmp');

        $captcha = new Zend_Form_Element_Captcha(
                'captcha', 
                array('label' => 'Please Verify:',
                'captcha' => array( 
                'captcha' => 'Image',
                'wordLen' => 6,
                'timeout' => 300,
                'font' => APPLICATION_PATH.'/../public/Captcha/GILSANUB.TTF',
                'imgDir' => APPLICATION_PATH.'/../public/Captcha',
                'imgUrl' => 'http://localhost/ecom/public/captcha/',
              )));
      
        $Submit = new Zend_Form_Element_Submit('Submit');
        $Submit->setAttrib('UserID', 'submitbutton');

        $this->addElements(array($Username, $Password, $Repassword, $Name, $DOB,
            $Gender, $MaritialStatus, $Nationality, $Religion, $CurrentAddress,
            $PermanentAddress, $HomePhone, $Mobile, $OfficePhone, $Email,
            $AlternativeEmail, $ImagePath, $captcha, $Submit));

        $this->addDisplayGroup(array(
            'Username',
            'Password',
            'Repassword'
        ), 'login', array('legend' => 'User Login Info'));
        $login = $this->getDisplayGroup('login');
        $login ->setDecorators(array(
                    'FormElements',
                    'Fieldset',
                    array('HtmlTag',array('tag'=>'div','style'=>'width:50%;;float:center;padding-bottom:10px;'))
        ));

        $this->addDisplayGroup(array(
            'Name',
            'DateOfBirth',
            'Gender',
            'MaritialStatus',
            'Nationality',
            'Religion',
            'CurrentAddress',
            'PermanentAddress',
            'HomePhone',
            'Mobile',
            'OfficePhone',
            'Email',
            'AlternativeEmail',
            'ImagePath',
            'captcha',
            'Submit'
        ), 'profile', array('legend' => 'User Profile', 'class' => 'userprofile'));
        $profile = $this->getDisplayGroup('profile');
        $profile->setDecorators(array(
                    'FormElements',
                    'Fieldset',
                    array('HtmlTag',array('tag'=>'div','style'=>'width:50%;;float:center;padding-bottom:10px;'))
        ));
    }
}

